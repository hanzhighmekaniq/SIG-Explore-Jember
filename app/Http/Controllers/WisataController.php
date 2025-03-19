<?php

namespace App\Http\Controllers;

use App\Models\DataWisata;
use App\Models\DataKategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataKategoriDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator; // Memperbaiki import Validator

class WisataController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori dengan relasi kategori_details
        $category = DataKategori::with('kategori_details')->get();

        // Mulai query DataWisata
        $query = DataWisata::query();

        // Filter berdasarkan kategori (jika ada input id_kategori)
        if ($request->id_kategori) {
            $query->whereHas('kategori_detail.kategori', function ($q) use ($request) {
                $q->where('id', $request->id_kategori);
            });
        }

        // Filter berdasarkan nama wisata (jika ada input nama_wisata)
        if ($request->nama_wisata) {
            $query->where('nama_wisata', 'like', '%' . $request->nama_wisata . '%');
        }

        // Ambil data wisata dengan relasi kategori_detail dan kategori
        $DataWisata = $query->with(['kategori_detail.kategori'])->paginate(10);

        return view('admin.adminDataWisata', compact('category', 'DataWisata'));
    }





    public function create()
    {
        $showDataKategori = DataKategoriDetail::with('kategori')->get();
        return view('admin.tambahWisata', ['dataKategori' => $showDataKategori]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_kategori_detail' => 'required',
            'nama_wisata' => 'required|string|max:255',
            'deskripsi_wisata' => 'required|string',
            'fasilitas' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'img' => 'required',
            'img_detail.*' => 'nullable',
            'latitude' => 'required|numeric|',
            'longitude' => 'nullable|numeric|',
            'htm_wisata' => 'nullable',
            'htm_parkir' => 'nullable',
            'jam_operasional' => 'required|array',
            'jam_operasional.*.hari' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'jam_operasional.*.buka' => 'required|string',
            'jam_operasional.*.tutup' => 'required|string',
        ], [
            'required' => ':attribute harus diisi.',
            'mimes' => ':attribute harus berformat: :values.',
            'image' => ':attribute harus berupa gambar.',
            'in' => 'Hari yang diinput tidak valid.',
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Proses penyimpanan gambar utama
            $imgPath = $request->file('img')->store('images/wisata/img', 'public');

            // Proses penyimpanan gambar detail (jika ada)
            $imgDetailPaths = [];
            if ($request->hasFile('img_detail')) {
                foreach ($request->file('img_detail') as $detail) {
                    $imgDetailPaths[] = $detail->store('images/wisata/detail', 'public');
                }
            }

            // Format jam operasional ke JSON
            $jamOperasionalData = [];
            foreach ($request->jam_operasional as $jo) {
                $jamOperasionalData[$jo['hari']] = [
                    'buka' => $jo['buka'],
                    'tutup' => $jo['tutup']
                ];
            }

            // Simpan data wisata ke tabel `data_wisata`
            DataWisata::create([
                'id_kategori_detail' => $request->id_kategori_detail,
                'nama_wisata' => $request->nama_wisata,
                'deskripsi_wisata' => $request->deskripsi_wisata,
                'fasilitas' => $request->fasilitas,
                'lokasi' => $request->lokasi,
                'img' => $imgPath,
                'img_detail' => json_encode($imgDetailPaths),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'htm_wisata' => $request->htm_wisata,
                'htm_parkir' => $request->htm_parkir,
                'jam_operasional' => json_encode($jamOperasionalData), // Simpan JSON jam buka & tutup
            ]);

            return redirect()->route('wisata.index')->with(['success' => 'Data Berhasil Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->route('wisata.create')->with(['error' => 'Data gagal disimpan: ' . $e->getMessage()]);
        }
    }






    public function edit($id)
    {
        $wisata = DataWisata::findOrFail($id);
        $dataKategori = DataKategoriDetail::with('kategori')->get();

        // Ambil data jam operasional dan ubah ke array agar bisa digunakan di form
        $jamOperasional = json_decode($wisata->jam_operasional, true) ?? [];

        return view('admin.editWisata', compact('wisata', 'dataKategori', 'jamOperasional'));
    }



    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_wisata' => 'required',
                'img' => 'nullable|image',
                'img_detail.*' => 'nullable|image',
                'id_kategori_detail' => 'required',
                'deskripsi_wisata' => 'required',
                'fasilitas' => 'required',
                'lokasi' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'htm_wisata' => 'nullable',
                'htm_parkir' => 'nullable',
                'jam_operasional' => 'nullable|array',
                'jam_operasional.*.buka' => 'nullable|date_format:H:i',
                'jam_operasional.*.tutup' => 'nullable|date_format:H:i',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $wisata = DataWisata::findOrFail($id);

            // Hapus gambar lama jika ada
            if ($request->hasFile('img')) {
                if ($wisata->img && Storage::exists('public/' . $wisata->img)) {
                    Storage::delete('public/' . $wisata->img);
                }
                $imgPath = $request->file('img')->store('images/wisata/img', 'public');
                $wisata->img = $imgPath;
            }

            // Handle multiple images
            $imgKontenPaths = $wisata->img_detail ? json_decode($wisata->img_detail) : [];
            if ($request->hasFile('img_detail')) {
                foreach ($imgKontenPaths as $oldImage) {
                    if (Storage::exists('public/' . $oldImage)) {
                        Storage::delete('public/' . $oldImage);
                    }
                }

                $imgKontenPaths = [];
                foreach ($request->file('img_detail') as $file) {
                    $imgKontenPaths[] = $file->store('images/wisata/detail', 'public');
                }
                $wisata->img_detail = json_encode($imgKontenPaths);
            }

            // **Menangani jam operasional**
            $jamOperasional = [];
            foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $hari) {
                if (!empty($request->jam_operasional[$hari]['buka']) || !empty($request->jam_operasional[$hari]['tutup'])) {
                    $jamOperasional[$hari] = [
                        'buka' => $request->jam_operasional[$hari]['buka'] ?? null,
                        'tutup' => $request->jam_operasional[$hari]['tutup'] ?? null,
                    ];
                }
            }

            // Update data wisata
            $wisata->update([
                'id_kategori_detail' => $request->id_kategori_detail,
                'nama_wisata' => $request->nama_wisata,
                'deskripsi_wisata' => $request->deskripsi_wisata,
                'fasilitas' => $request->fasilitas,
                'lokasi' => $request->lokasi,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'htm_wisata' => $request->htm_wisata,
                'htm_parkir' => $request->htm_parkir,
                'jam_operasional' => json_encode($jamOperasional),
            ]);

            return redirect()->route('wisata.index')->with(['success' => 'Data wisata berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->route('wisata.edit', ['id' => $id])
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }



    public function destroy($id)
    {
        // Temukan kategori berdasarkan ID
        $wisata = DataWisata::findOrFail($id);

        // Hapus kategori
        $wisata->delete();
        return redirect()->route('wisata.index')->with('success', 'Wisata berhasil dihapus.');
    }

    public function show($id)
    {
        $wisata = DataWisata::findOrFail($id);
        return view('admin.showWisata', compact('wisata'));
    }
}
