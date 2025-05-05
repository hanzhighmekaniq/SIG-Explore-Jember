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
        $wisata = DataKategoriDetail::with('wisata')->get();
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
        $query->orderBy('created_at', 'desc');
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
        $rules = [
            'id_wisata' => 'required|exists:data_wisata,id',
            'nama_event' => 'required|string|max:255',
            'deskripsi_event' => 'nullable|string',
            'is_temporer' => 'required|boolean',
            'htm_event' => 'required',
            'img' => 'nullable|image|max:2048',
        ];

        if ($request->is_temporer) {
            $rules['event_mulai'] = 'required|date';
            $rules['event_berakhir'] = 'required|date|after_or_equal:event_mulai';
        } else {
            $rules['jadwal'] = 'required|array';
        }

        $validated = $request->validate($rules);

        try {
            $imgPath = null;
            if ($request->hasFile('img')) {
                $imgPath = $request->file('img')->store('images/event/img', 'public');
            }

            $data = [
                'id_wisata' => $request->id_wisata,
                'nama_event' => $request->nama_event,
                'deskripsi_event' => $request->deskripsi_event,
                'is_temporer' => $request->is_temporer,
                'htm_event' => $request->htm_event,
                'img' => $imgPath,
            ];

            if ($request->is_temporer) {
                $data['event_mulai'] = $request->event_mulai;
                $data['event_berakhir'] = $request->event_berakhir;
            } else {
                $data['jadwal_mingguan'] = json_encode($request->jadwal);
            }

            DataEvent::create($data);

            return redirect()->route('event.index')->with('success', 'Event berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan event: ' . $e->getMessage());
        }
    }




    public function edit($id)
    {
        // Ambil data kuliner berdasarkan ID
        $event = DataEvent::find($id);

        // Cek apakah data ditemukan
        if (!$event) {
            return redirect()->route('event.index')->with(['error' => 'Event tidak ditemukan']);
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

        $request->validate([
            'id_wisata' => 'required',
            'nama_event' => 'required',
            'deskripsi_event' => 'nullable',
            'is_temporer' => 'required',
            'htm_event' => 'required',
            'img' => 'nullable|image',
        ]);

        if ($request->is_temporer) {
            $request->validate([
                'event_mulai' => 'nullable|date',
                'event_berakhir' => 'nullable',
                'jadwal_mingguan' => 'nullable|in:',
            ]);
        } else {
            $request->validate([
                'jadwal' => 'nullable',
                'event_mulai' => 'nullable',
                'event_berakhir' => 'nullable',
            ]);
        }

        // Ambil data kuliner berdasarkan ID
        $event = DataEvent::find($id);
        // Cek apakah data ditemukan
        if (!$event) {
            return redirect()->route('event.edit')->with(['error' => 'Event tidak ditemukan']);
        }
        try {
            // Update data kuliner
            $event->id_wisata = $request->id_wisata;
            $event->nama_event = $request->nama_event;
            $event->deskripsi_event = $request->deskripsi_event;
            $event->is_temporer = $request->is_temporer;
            $event->htm_event = $request->htm_event;

            if ((int)$request->is_temporer === 1) {
                $event->event_mulai = $request->event_mulai;
                $event->event_berakhir = $request->event_berakhir;
                $event->jadwal_mingguan = null;
            } else {
                $event->event_mulai = null;
                $event->event_berakhir = null;
                $event->jadwal_mingguan = json_encode($request->jadwal);
            }

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
