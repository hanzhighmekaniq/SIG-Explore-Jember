<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UjiCoba extends Controller
{
    public function ujicoba()
    {
        return view('pengunjung.ujicoba');
    }
}
