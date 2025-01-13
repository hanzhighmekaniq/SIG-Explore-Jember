<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKategoriDetail;
use App\Http\Controllers\Controller;

class subKategori extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
