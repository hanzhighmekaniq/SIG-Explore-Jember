<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataKuliner;
use Illuminate\Http\Request;

class KulinerController extends Controller
{
    public function index()
    {
        $showDataKuliner = DataKuliner::all();
        return view('admin.adminDataKuliner', ['DataKuliner' => $showDataKuliner]);
    }

    public function create()
    {
        return view('admin.tambahKuliner');
    }

    public function store(Request $request)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }

    public function show($id)
    {
        
    }
}
