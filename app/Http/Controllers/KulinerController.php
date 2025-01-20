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
        $wisata = DataKategoriDetail::with('wisatas')->get();

        $query = DataKuliner::query();

        // Filter berdasarkan kategori (jika ada input id_kategori)
        if ($request->id_kategori_detail) {
            $query->whereHas('wisata.kategori_detail.kategori', function ($q) use ($request) {
                $q->where('id', $request->id_kategori_detail);
            });
        }

        // Filter berdasarkan nama wisata (jika ada input nama_wisata)
        if ($request->nama_kuliner) {
            $query->where('nama_kuliner', 'like', '%' . $request->nama_kuliner . '%');
        }

        // Ambil data wisata dengan relasi kategori_detail dan kategori
        $DataKuliner = $query->with(['wisata.kategori_detail'])->paginate(10);
        return view('admin.adminDataKuliner', compact('DataKuliner', 'wisata'));
    }

    public function create()
    {
        $DataWisata = DataWisata::all();
        return view('admin.tambahKuliner', ['DataWisata' => $DataWisata]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_wisata' => 'required',
            'nama_kuliner' => 'required|string|max:255',
            'deskripsi_kuliner' => 'required|string',
            'gambar_kuliner' => 'required',
            'gambar_menu.*' => 'nullable',
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Proses penyimpanan gambar utama
            $imgPath = $request->file('gambar_kuliner')->store('images/kuliner/img', 'public');

            // Proses penyimpanan gambar detail (jika ada)
            $imgDetail = [];
            if ($request->hasFile('gambar_menu')) {
                foreach ($request->file('gambar_menu') as $detail) {
                    $imgDetail[] = $detail->store('images/kuliner/detail', 'public');
                }
            }

            // Simpan data kuliner ke tabel `data_kuliner` melalui model `DataKuliner`
            DataKuliner::create([
                'id_wisata' => $request->id_wisata,
                'nama_kuliner' => $request->nama_kuliner,
                'deskripsi_kuliner' => $request->deskripsi_kuliner,
                'gambar_kuliner' => $imgPath, // Menyimpan path relatif
                'gambar_menu' => json_encode($imgDetail), // Menyimpan array sebagai JSON
            ]);

            // Redirect setelah berhasil
            return redirect()->route('kuliner.index')->with(['success' => 'Data Berhasil Ditambahkan']);
        } catch (\Exception $e) {
            // Menampilkan pesan error untuk debugging
            dd($e->getMessage());
        }
    }

    public function edit($id)
    {
        // Ambil data kuliner berdasarkan ID
        $kuliner = DataKuliner::find($id);

        // Cek apakah data ditemukan
        if (!$kuliner) {
            return redirect()->route('kuliner.index')->with(['error' => 'Data tidak ditemukan']);
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
        // Validasi input
        $request->validate([
            'id_wisata' => 'required', // Pastikan ID wisata ada
            'nama_kuliner' => 'required|string|max:255',
            'deskripsi_kuliner' => 'nullable|string',
            'gambar_kuliner' => 'nullable', // Validasi gambar
            'gambar_menu.*' => 'nullable', // Validasi multiple files
        ]);

        // Ambil data kuliner berdasarkan ID
        $kuliner = DataKuliner::find($id);

        // Cek apakah data ditemukan
        if (!$kuliner) {
            return redirect()->route('kuliner.edit')->with(['error' => 'Data tidak ditemukan']);
        }
        try {
            // Update data kuliner
            $kuliner->id_wisata = $request->id_wisata;
            $kuliner->nama_kuliner = $request->nama_kuliner;
            $kuliner->deskripsi_kuliner = $request->deskripsi_kuliner;

            // Cek jika ada gambar baru yang di-upload untuk gambar kuliner
            if ($request->hasFile('gambar_kuliner')) {
                // Hapus gambar lama jika ada
                if ($kuliner->gambar_kuliner) {
                    Storage::delete('public/' . $kuliner->gambar_kuliner);
                }


                // Simpan gambar baru
                $path = $request->file('gambar_kuliner')->store('images/kuliner/img', 'public');
                $kuliner->gambar_kuliner = $path;
            }

            // Cek jika ada multiple files yang di-upload untuk gambar menu tambahan
            if ($request->hasFile('gambar_menu')) {
                // Hapus gambar menu lama jika ada
                if ($kuliner->gambar_menu) {
                    // Decode JSON untuk mendapatkan array path dari gambar lama
                    $oldImages = json_decode($kuliner->gambar_menu, true);
                    foreach ($oldImages as $oldImage) {
                        // Hapus setiap file lama dari penyimpanan
                        Storage::delete('public/' . $oldImage);
                    }
                }

                // Proses setiap file yang di-upload untuk gambar menu baru
                $menuImages = [];
                foreach ($request->file('gambar_menu') as $file) {
                    // Simpan file di folder 'images/kuliner/detail' dalam disk 'public'
                    $path = $file->store('images/kuliner/detail', 'public');
                    // Menambahkan path ke array baru
                    $menuImages[] = $path;
                }

                // Simpan array path gambar menu baru ke database
                $kuliner->gambar_menu = json_encode($menuImages);
            }


            // Simpan perubahan
            $kuliner->save();

            // Redirect ke halaman index kuliner dengan pesan sukses
            return redirect()->route('kuliner.index')->with(['success' => 'Data kuliner berhasil diupdate']);
        } catch (\Exception $e) {
            dd($e->getMessage());
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
