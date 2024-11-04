<?php

namespace App\Http\Controllers;

use App\Models\DataEvent;
use App\Models\DataWisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {

        $showDataEvent = DataEvent::all();
        return view('admin.adminDataEvent', ['DataEvent' => $showDataEvent]);
    }

    public function create()
    {
        $showDataWisata = DataWisata::all();
        return view('admin.tambahEvent', ['DataWisata' => $showDataWisata]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_wisata' => 'required',
            'nama_event' => 'required',
            'deskripsi_event' => 'required',
            'event_mulai' => 'required',
            'event_berakhir' => 'required',
            'htm_event' => 'required',
            'img' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            dd($validator->errors()->all()); // Debug: lihat pesan error dari validasi
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $imgPath = $request->file('img')->store('images/event/img', 'public');

            DataEvent::create([
                'id_wisata' => $request->id_wisata,
                'nama_event' => $request->nama_event,
                'deskripsi_event' => $request->deskripsi_event,
                'event_mulai' => $request->event_mulai,
                'event_berakhir' => $request->event_berakhir,
                'htm_event' => $request->htm_event,
                'img' => $imgPath,
            ]);

            return redirect()->route('event.index')->with(['success' => 'Data Berhasil Ditambahkan']);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Debug: tampilkan pesan error jika terjadi exception
            return redirect()->route('event.index')->with(['error' => 'Data gagal disimpan: ' . $e->getMessage()]);
        }
    }


    public function edit($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id) {}

    public function show($id) {}
}
