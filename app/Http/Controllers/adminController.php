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

    public function tambahEvent()
    {
        return view('admin.tambahEvent');
    }
    public function tambahKuliner()
    {
        return view('admin.tambahKuliner');
    }






}
