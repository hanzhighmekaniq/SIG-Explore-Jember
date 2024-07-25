<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pengunjungProfilWisataController extends Controller
{
    public function index ()
    {
        return view('pengunjung.profilWisata');
    }
}
