<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKategoriDetail;
use App\Http\Controllers\Controller;

class subKategori extends Controller
{

    public function store(Request $request)
    {
        //public function storeSubKategori(Request $request)
        $request->validate([
            'id_kategori' => 'required',
            'nama_kategori_detail' => 'required',
        ]);

        try {
            DataKategoriDetail::create([
                'id_kategori' => $request->id_kategori,
                'nama_kategori_detail' => $request->nama_kategori_detail,
            ]);

            return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Ditambahkan']);
        } catch (\Exception $e) {
            // $e->getMessage()])
            return redirect()->route('kategori.index')->with(['error' => 'Data Sudah Ada']);
        }
    }


    public function edit(string $id) {}

    public function update(Request $request, $id)
    {
        $request->validate([

            'id_kategori' => 'required',
            'nama_kategori_detail' => 'required|string|max:255',
        ]);


        try {
            // Temukan kategori berdasarkan ID
            $SubKategori = DataKategoriDetail::findOrFail($id);
            $SubKategori->id_kategori = $request->id_kategori;
            $SubKategori->nama_kategori_detail = $request->nama_kategori_detail;

            // Simpan perubahan
            $SubKategori->save();
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('kategori.index')->with(['error' => 'Data Sudah Ada']);
        }
    }

    public function destroy($id)
    {
        // Temukan kategori berdasarkan ID
        $kategori = DataKategoriDetail::findOrFail($id);

        // Hapus kategori
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
