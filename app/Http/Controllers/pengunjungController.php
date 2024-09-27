<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pengunjungController extends Controller
{
    public function beranda()
    {
        return view('pengunjung.beranda');
    }

    public function wisata()
    {
        return view('pengunjung.wisata');
    }
    
    public function petaWilayah ()
    {
        return view('pengunjung.petaWilayah');
    }

    public function hubungiKami ()
    {
        return view('pengunjung.hubungiKami');
    }

    public function detailWisata ()
    {
        return view('pengunjung.detailWisata');
    }

    public function rute ()
    {
        return view('pengunjung.ruteTerdekat');
    }

}
