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
            'latitude' => 'required|numeric',
            'longitude' => 'nullable|numeric',
            'htm_wisata' => 'nullable',
            'htm_parkir' => 'nullable',
        ], [
            'latitude.max' => 'Kolom latitude tidak boleh lebih dari 90.',
            'latitude.min' => 'Kolom latitude tidak boleh kurang dari -90.',
            'longitude.max' => 'Kolom longitude tidak boleh lebih dari 180.',
            'longitude.min' => 'Kolom longitude tidak boleh kurang dari -180.',
            'required' => ':attribute harus diisi.', // Pesan umum untuk required
            'mimes' => ':attribute harus berformat: :values.',
            'max' => ':attribute tidak boleh lebih dari :max.',
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

            // Simpan data wisata ke tabel `data_wisata` melalui model `DataWisata`
            DataWisata::create([
                'id_kategori_detail' => $request->id_kategori_detail,
                'nama_wisata' => $request->nama_wisata,
                'deskripsi_wisata' => $request->deskripsi_wisata,
                'fasilitas' => $request->fasilitas,
                'lokasi' => $request->lokasi,
                'img' => $imgPath, // Pastikan ini menyimpan path relatif
                'img_detail' => json_encode($imgDetailPaths), // Menyimpan array sebagai JSON
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'htm_wisata' => $request->htm_wisata,
                'htm_parkir' => $request->htm_parkir,
            ]);

            // Redirect setelah berhasil
            return redirect()->route('wisata.index')->with(['success' => 'Data Berhasil Ditambahkan']);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return redirect()->route('wisata.create')->with(['error' => 'Data gagal disimpan: ' . $e->getMessage()]);
        }
    }




    public function edit($id)
    {
        $wisata = DataWisata::findOrFail($id);
        $dataKategori = DataKategoriDetail::with('kategori')->get(); // Perbaikan: tambahkan get()
        return view('admin.editWisata', compact('wisata', 'dataKategori'));
    }


    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_wisata' => 'required',
                'img' => 'nullable',
                'img_detail.*' => 'nullable',
                'id_kategori_detail' => 'required',
                'deskripsi_wisata' => 'required',
                'fasilitas' => 'required',
                'lokasi' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'htm_wisata' => 'nullable',
                'htm_parkir' => 'nullable',
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $wisata = DataWisata::findOrFail($id);

            // Hapus gambar lama jika ada
            if ($request->hasFile('img')) {
                // Periksa apakah gambar utama sebelumnya ada dan dihapus
                if ($wisata->img && Storage::exists('public/' . $wisata->img)) {
                    Storage::delete('public/' . $wisata->img);  // Menghapus gambar lama dari storage
                }

                // Simpan gambar baru
                $imgPath = $request->file('img')->store('images/wisata/img', 'public');
                $wisata->img = $imgPath;  // Set gambar baru
            }

            // Handle detail images
            $imgKontenPaths = $wisata->img_konten ? json_decode($wisata->img_konten) : [];
            if ($request->hasFile('img_detail')) {
                // Hapus gambar lama detail (jika ada) sebelum menambahkan yang baru
                foreach ($imgKontenPaths as $oldImage) {
                    if (Storage::exists('public/' . $oldImage)) {
                        Storage::delete('public/' . $oldImage);  // Menghapus gambar lama dari storage
                    }
                }

                // Menambahkan gambar detail yang baru
                foreach ($request->file('img_detail') as $file) {
                    $imgKontenPaths[] = $file->store('images/wisata/detail', 'public');
                }
                $wisata->img_detail = json_encode($imgKontenPaths);
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
