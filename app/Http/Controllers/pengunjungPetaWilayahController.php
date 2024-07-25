<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pengunjungPetaWilayahController extends Controller
{
    public function index ()
    {
        return view('pengunjung.petaWilayah');
    }
}
