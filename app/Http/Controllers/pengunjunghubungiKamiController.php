<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pengunjunghubungiKamiController extends Controller
{
    public function index ()
    {
        return view('pengunjung.hubungiKami');
    }
}
