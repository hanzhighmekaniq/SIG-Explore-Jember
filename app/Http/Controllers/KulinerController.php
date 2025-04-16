<?php

namespace App\Http\Controllers;

use App\Models\DataWisata;
use App\Models\DataKuliner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataKategoriDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KulinerController extends Controller
{
    public function index(Request $request)
    {
        // Debug untuk melihat data yang dikirim dari form pencarian
        // dd($request->all());

        // Ambil daftar kategori detail untuk dropdown
        $kategoriDetails = DataKategoriDetail::all();

        // Query utama DataKuliner
        $query = DataKuliner::query();

        // Filter berdasarkan kategori (jika ada input id_kategori_detail)
        if ($request->id_kategori_detail) {
            $query->whereHas('wisata.kategori_detail', function ($q) use ($request) {
                $q->where('id', $request->id_kategori_detail);
            });
        }

        // Filter berdasarkan nama kuliner (jika ada input nama_kuliner)
        if ($request->nama_kuliner) {
            $query->where('nama_kuliner', 'like', '%' . $request->nama_kuliner . '%');
        }

        // Ambil data kuliner dengan relasi wisata dan kategori
        $DataKuliner = $query->with(['wisata.kategori_detail.kategori'])->latest()->paginate(10);

        return view('admin.adminDataKuliner', compact('DataKuliner', 'kategoriDetails'));
    }


    public function create()
    {
        $DataWisata = DataWisata::all();
        return view('admin.tambahKuliner', ['DataWisata' => $DataWisata]);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'id_wisata' => 'required',
            'nama_kuliner.*' => 'required|string|max:255',
            'deskripsi_kuliner.*' => 'required|string',
            'no_hp.*' => ['required', 'regex:/^(\+62|0)[0-9]{8,13}$/'],

            'jam_operasional.*.hari' => 'nullable|string',
            'jam_operasional.*.buka' => 'nullable|date_format:H:i',
            'jam_operasional.*.tutup' => 'nullable|date_format:H:i',
            'gambar_kuliner.*' => 'nullable|image',
            'gambar_menu.*.*' => 'nullable|image',
        ]);

        // Proses simpan data kuliner dan gambar
        foreach ($request->nama_kuliner as $index => $nama_kuliner) {
            $kuliner = new DataKuliner();
            $kuliner->id_wisata = $request->id_wisata;
            $kuliner->nama_kuliner = $nama_kuliner;
            $kuliner->deskripsi_kuliner = $request->deskripsi_kuliner[$index] ?? null;
            $kuliner->no_hp = $request->no_hp[$index] ?? null;

            // Simpan jam operasional untuk masing-masing kuliner
            $kuliner->jam_operasional = isset($request->jam_operasional[$index])
                ? json_encode($request->jam_operasional[$index])
                : null;

            // Menyimpan gambar kuliner
            if (
                is_array($request->file('gambar_kuliner')) &&
                isset($request->file('gambar_kuliner')[$index])
            ) {
                $file = $request->file('gambar_kuliner')[$index];
                $path = $file->store('images/kuliner/img', 'public');
                $kuliner->gambar_kuliner = $path;
            }

            // Menyimpan gambar menu
            if (isset($request->gambar_menu[$index]) && is_array($request->gambar_menu[$index])) {
                $menu_images = [];
                foreach ($request->gambar_menu[$index] as $menu_image) {
                    $path = $menu_image->store('images/kuliner/detail', 'public');
                    $menu_images[] = $path;
                }
                $kuliner->gambar_menu = json_encode($menu_images);
            }
            $kuliner->save();
        }

        return redirect()->route('kuliner.index')->with('success', 'Kuliner berhasil ditambahkan.');
    }





    public function edit($id)
    {
        // Ambil data kuliner berdasarkan ID
        $kuliner = DataKuliner::find($id);

        // Cek apakah data ditemukan
        if (!$kuliner) {
            return redirect()->route('kuliner.index')->with(['error' => 'Kuliner tidak ditemukan']);
        }

        // Decode JSON ke array jika masih string
        if (is_string($kuliner->jam_operasional)) {
            $kuliner->jam_operasional = json_decode($kuliner->jam_operasional, true);
        }

        // Ambil data wisata untuk dropdown
        $wisata = DataWisata::all();

        // Kirim data ke view edit
        return view('admin.editKuliner', [
            'kuliner' => $kuliner,
            'wisata' => $wisata
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_wisata' => 'required',
            'nama_kuliner' => 'required|string|max:255',
            'deskripsi_kuliner' => 'nullable|string|max:800',
            'gambar_kuliner' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gambar_menu.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'no_hp' => 'nullable|string',
            'jam_operasional' => 'nullable|array',
        ]);

        $kuliner = DataKuliner::find($id);

        if (!$kuliner) {
            return redirect()->route('kuliner.index')->with(['error' => 'Data kuliner tidak ditemukan']);
        }

        try {
            $kuliner->id_wisata = $request->id_wisata;
            $kuliner->nama_kuliner = $request->nama_kuliner;
            $kuliner->deskripsi_kuliner = $request->deskripsi_kuliner;
            $kuliner->no_hp = $request->no_hp;


            // ✅ Simpan seluruh jam_operasional
            if ($request->has('jam_operasional')) {
                $kuliner->jam_operasional = json_encode($request->jam_operasional);
            }

            // ✅ Gambar utama
            if ($request->hasFile('gambar_kuliner')) {
                if ($kuliner->gambar_kuliner) {
                    Storage::delete('public/' . $kuliner->gambar_kuliner);
                }
                $path = $request->file('gambar_kuliner')->store('images/kuliner/img', 'public');
                $kuliner->gambar_kuliner = $path;
            }

            // ✅ Gambar Menu
            if ($request->hasFile('gambar_menu')) {
                if ($kuliner->gambar_menu) {
                    foreach (json_decode($kuliner->gambar_menu, true) as $oldImage) {
                        Storage::delete('public/' . $oldImage);
                    }
                }

                $menuImages = [];
                foreach ($request->file('gambar_menu') as $file) {
                    $menuImages[] = $file->store('images/kuliner/detail', 'public');
                }
                $kuliner->gambar_menu = json_encode($menuImages);
            }

            $kuliner->save();

            return redirect()->route('kuliner.index')->with(['success' => 'Data kuliner berhasil diupdate']);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }




    public function destroy($id)
    {
        // Temukan kategori berdasarkan ID
        $kuliner = DataKuliner::findOrFail($id);

        // Hapus kategori
        $kuliner->delete();
        return redirect()->route('kuliner.index')->with('success', 'Kuliner berhasil dihapus.');
    }

    public function show($id) {}
}
