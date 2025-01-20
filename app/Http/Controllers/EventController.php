<?php

namespace App\Http\Controllers;

use App\Models\DataEvent;
use App\Models\DataWisata;
use Illuminate\Http\Request;
use App\Models\DataKategoriDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $wisata = DataKategoriDetail::with('wisatas')->get();
        $query = DataEvent::query();

        // Filter berdasarkan kategori (jika ada input id_kategori)
        if ($request->id_kategori_detail) {
            $query->whereHas('wisata.kategori_detail', function ($q) use ($request) {
                $q->where('id', $request->id_kategori_detail);
            });
        }

        // Filter berdasarkan nama wisata (jika ada input nama_wisata)
        if ($request->nama_kuliner) {
            $query->where('nama_kuliner', 'like', '%' . $request->nama_kuliner . '%');
        }

        $DataEvent = $query->with(['wisata.kategori_detail'])->paginate(10);


        return view('admin.adminDataEvent', compact('wisata', 'DataEvent'));
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
            'img' => 'required',
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


    public function edit($id)
    {
        // Ambil data kuliner berdasarkan ID
        $event = DataEvent::find($id);

        // Cek apakah data ditemukan
        if (!$event) {
            return redirect()->route('event.index')->with(['error' => 'Data tidak ditemukan']);
        }

        // Ambil data wisata untuk dropdown
        $wisata = DataWisata::all();

        // Kirim data ke view edit
        return view('admin.editEvent', [
            'event' => $event,
            'wisata' => $wisata
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_wisata' => 'required', // Pastikan ID wisata ada
            'nama_event' => 'required|string|max:255',
            'deskripsi_event' => 'nullable|string',
            'event_mulai' => 'required',
            'event_berakhir' => 'required', // Validasi multiple files
            'htm_event' => 'nullable', // Validasi multiple files
            'img' => 'nullable', // Validasi multiple files
        ]);

        // Ambil data kuliner berdasarkan ID
        $event = DataEvent::find($id);

        // Cek apakah data ditemukan
        if (!$event) {
            return redirect()->route('kuliner.edit')->with(['error' => 'Data tidak ditemukan']);
        }
        try {
            // Update data kuliner
            $event->id_wisata = $request->id_wisata;
            $event->nama_event = $request->nama_event;
            $event->deskripsi_event = $request->deskripsi_event;
            $event->event_mulai = $request->event_mulai;
            $event->event_berakhir = $request->event_berakhir;

            // Cek jika ada gambar baru yang di-upload untuk gambar kuliner
            if ($request->hasFile('img')) {
                // Hapus gambar lama jika ada
                if ($event->img) {
                    Storage::delete('public/' . $event->img);
                }


                // Simpan gambar baru
                $path = $request->file('img')->store('images/event/img', 'public');
                $event->img = $path;
            }


            // Simpan perubahan
            $event->save();

            // Redirect ke halaman index kuliner dengan pesan sukses
            return redirect()->route('event.index')->with(['success' => 'Data Event berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()->route('event.edit')->with(['error' => 'Data Event gagal diupdate']);
        }
    }

    public function destroy($id)
    {
        // Temukan kategori berdasarkan ID
        $event = DataEvent::findOrFail($id);

        // Hapus kategori
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus.');
    }

    public function show($id) {}
}
