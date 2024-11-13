<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class aqController extends Controller
{
    public function aq() {
        return view('admin.aq.aq');
    }
}
