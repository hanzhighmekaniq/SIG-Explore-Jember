<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataEvent;
use App\Models\DataWisata;

class PengunjungController extends Controller
{
    public function beranda()
    {
        // Mengambil seluruh data event
        $event = DataEvent::all();

        // Mengubah format tanggal dan waktu menggunakan Carbon
        $event->transform(function ($e) {
            // Format tanggal menjadi '17 Agustus 2012'
            $e->event_mulai_tanggal = Carbon::parse($e->event_mulai)->format('d F Y');
            $e->event_berakhir_tanggal = Carbon::parse($e->event_berakhir)->format('d F Y');

            // Format waktu menjadi '12:00'
            $e->event_mulai_waktu = Carbon::parse($e->event_mulai)->format('H:i');
            $e->event_berakhir_waktu = Carbon::parse($e->event_berakhir)->format('H:i');

            return $e;
        });
        $event->transform(function ($e) {
            // Format harga tanpa bagian desimal
            $e->htm_event = number_format($e->htm_event, 0, ',', '');

            return $e;
        });

        // Mengirim data ke view beranda
        return view('pengunjung.beranda', compact('event'));
    }
    public function wisata()
    {
        $wisata = DataWisata::all();
        return view('pengunjung.wisata', compact('wisata'));
    }
    public function petaWilayah()
    {
        $wisata = DataWisata::all();
        return view('pengunjung.petaWilayah', compact('wisata'));
    }
}
