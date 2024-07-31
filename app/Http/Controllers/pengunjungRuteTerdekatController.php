<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pengunjungRuteTerdekatController extends Controller
{
    public function index()
    {
        return view('pengunjung.ruteTerdekat');
    }
}
