<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pengunjungWisataController extends Controller
{
    public function index()
    {
        return view('pengunjung.wisata');
    }
}
