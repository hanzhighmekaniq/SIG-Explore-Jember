<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminBerandaController extends Controller
{
    public function index ()
    {
        return view('admin.adminBeranda');
    }
}
