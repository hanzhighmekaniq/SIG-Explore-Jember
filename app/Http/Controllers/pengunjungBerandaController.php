<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pengunjungBerandaController extends Controller
{
    public function index ()
    {
        return view('pengunjung.beranda');
    }
}
