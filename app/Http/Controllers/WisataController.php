<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator; // Memperbaiki import Validator
use App\Models\DataWisata;
use App\Models\DataKategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WisataController extends Controller
{
    public function index()
    {
        $showDataWisata = DataWisata::all();
        $showDataKategori = DataKategori::all();
        return view('admin.adminDataWisata', ['DataWisata' => $showDataWisata], ['DataKategori' => $showDataKategori]);
    }

    public function create()
    {
        $showDataKategori = DataKategori::all();
        return view('admin.tambahWisata', ['dataKategori' => $showDataKategori]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'nama_wisata' => 'required',
            'deskripsi_wisata' => 'required',
            'fasilitas' => 'required',
            'lokasi' => 'required',
            'img' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'img_detail.*' => 'file|mimes:jpeg,png,jpg|max:2048',
            'latitude' => 'required',
            'longitude' => 'nullable',
            'htm_wisata' => 'nullable',
            'htm_parkir' => 'nullable',
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
                'id_kategori' => $request->id_kategori,
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
            return redirect()->route('wisata.index')->with(['error' => 'Data gagal disimpan: ' . $e->getMessage()]);
        }
    }




    public function edit($id)
    {
        $wisata = DataWisata::findOrFail($id);
        $dataKategori = DataKategori::all();
        return view('admin.editWisata', compact('wisata', 'dataKategori'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_wisata' => 'required',
                'img' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
                'img_detail.*' => 'file|mimes:jpeg,png,jpg|max:2048',
                'id_kategori' => 'required',
                'deskripsi_wisata' => 'required',
                'fasilitas' => 'required',
                'lokasi' => 'required',
                'latitude' => 'required',
                'longitude' => 'nullable',
                'htm_wisata' => 'nullable',
                'htm_parkir' => 'nullable',
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $wisata = DataWisata::findOrFail($id);

            // Update the main image if provided
            if ($request->hasFile('img')) {
                $imgPath = $request->file('img')->store('img_wisata', 'public');
                $wisata->img = $imgPath;
            }

            // Save detail images if provided
            $imgKontenPaths = $wisata->img_konten ? json_decode($wisata->img_konten) : [];
            if ($request->hasFile('img_detail')) {
                foreach ($request->file('img_detail') as $file) {
                    $imgKontenPaths[] = $file->store('detail', 'public');
                }
            }

            // Update data
            $wisata->update([
                'nama_wisata' => $request->nama_wisata,
                'deskripsi_wisata' => $request->deskripsi_wisata,
                'fasilitas' => $request->fasilitas,
                'lokasi' => $request->lokasi,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'img_konten' => json_encode($imgKontenPaths),
                'id_kategori' => $request->id_kategori,
            ]);

            return redirect('/admin/data-wisata')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $wisata = DataWisata::findOrFail($id);
        $wisata->delete();

        return redirect()->route('dataWisata')->with('success', 'Data berhasil dihapus');
    }

    public function show($id)
    {
        $wisata = DataWisata::findOrFail($id);
        return view('admin.showWisata', compact('wisata'));
    }
}
