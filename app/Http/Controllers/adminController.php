<?php

namespace App\Http\Controllers;

use App\Models\DataWisata;
use App\Models\DataWisataEvent;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminBeranda()
    {
        return view('admin.adminBeranda');
    }

    public function adminDataWisata()
    {
        $showDataWisata = DataWisata::all();
        return view('admin.adminDataWisata', ['dataWisata' => $showDataWisata]);
    }

    public function tambahWisata()
    {
        return view('admin.tambahWisata');
    }
    public function tambahEvent()
    {
        return view('admin.tambahEvent');
    }
    public function tambahKuliner()
    {
        return view('admin.tambahKuliner');
    }





    // CRUD
    public function destroy($id)
    {
        $wisata = DataWisata::findOrFail($id);
        $wisata->delete();

        return redirect()->route('dataWisata')->with('success', 'Data berhasil dihapus');
    }
}
