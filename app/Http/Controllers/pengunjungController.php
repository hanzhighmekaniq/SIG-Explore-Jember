<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataEvent;
use App\Models\DataWisata;
use App\Models\DataKuliner;
use App\Models\DataKategori;
use App\Models\DataKategoriDetail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class PengunjungController extends Controller
{
    public function beranda()
    {
        // Mengambil data event yang akan datang (event_mulai >= hari ini)
        $event = DataEvent::where('event_mulai', '>=', now())->get();

        // Mengubah format tanggal, waktu, dan harga menggunakan transformasi
        $event->transform(function ($e) {
            $e->event_mulai_tanggal = Carbon::parse($e->event_mulai)->translatedFormat('d F Y'); // Format: '17 Agustus 2012'
            $e->event_berakhir_tanggal = Carbon::parse($e->event_berakhir)->translatedFormat('d F Y');
            $e->event_mulai_waktu = Carbon::parse($e->event_mulai)->format('H:i'); // Format: '12:00'
            $e->event_berakhir_waktu = Carbon::parse($e->event_berakhir)->format('H:i');
            $e->htm_event = number_format($e->htm_event, 0, ',', ''); // Format harga tanpa desimal
            return $e;
        });

        // Mengambil data wisata dengan relasi kategori
        $wisata = DataWisata::all();
        // Mengambil maksimal 3 data wisata dengan kategori yang berelasi
        // Mengambil maksimal 3 data wisata secara acak berdasarkan kategori dan kategori detail
        $filterWisata = DataWisata::with('kategori_detail.kategori') // Memastikan relasi ke kategori dan kategori detail
            ->inRandomOrder() // Ambil data secara acak
            ->limit(4) // Ambil maksimal 3 data
            ->get();




        // Mengirim data ke view beranda
        return view('pengunjung.beranda', compact('event', 'wisata', 'filterWisata'));
    }

    public function getKategoriDetails($kategori_id)
    {
        $kategoriDetails = DataKategoriDetail::where('id_kategori', $kategori_id)->get();
        return response()->json($kategoriDetails);
    }


    public function wisata(Request $request)
    {
        // Ambil semua kategori
        $kategoris = DataKategori::all();

        // Query utama untuk wisata
        $query = DataWisata::query();

        // Filter berdasarkan nama wisata
        if ($request->filled('nama_wisata')) {
            $query->where('nama_wisata', 'like', '%' . $request->nama_wisata . '%');
        }

        // Filter berdasarkan kategori jika dipilih
        if ($request->filled('id_kategori')) {
            $query->whereHas('kategori_detail', function ($q) use ($request) {
                $q->where('id_kategori', $request->id_kategori);
            });
        }

        // Paginate hasilnya
        $wisata = $query->paginate(20);

        // Return view dengan data
        return view('pengunjung.wisata', compact('kategoris', 'wisata'));
    }


    public function rute($nama_wisata)
    {
        $rute = DataWisata::where('nama_wisata', $nama_wisata)->firstOrFail();
        return view('pengunjung.ruteTerdekat', compact('rute'));
    }



    public function petaWilayah()
    {
        $peta = DataWisata::with('kategori_detail.kategori')->get();
        $rute = DataWisata::with('kategori_detail.kategori')->paginate(10); // Jika tidak butuh paginasi
        return view('pengunjung.petaWilayah', compact('peta', 'rute'));
    }

    // PengunjungController.php


    public function detailWisata($nama_wisata)
    {
        // Ambil data wisata berdasarkan nama, dengan relasi kategori, event, dan kuliner
        $wisata = DataWisata::where('nama_wisata', $nama_wisata)
            ->with(['kategori_detail.kategori', 'events', 'kuliners'])
            ->firstOrFail();

        // Decode gambar detail dan ambil maksimal 8 secara acak
        $imgDetails = json_decode($wisata->img_detail, true) ?? [];
        shuffle($imgDetails);
        $imgDetails = array_slice($imgDetails, 0, 8);

        // Ambil wisata lain secara acak, kecuali wisata yang sedang dibuka
        $lainnya = DataWisata::where('id', '!=', $wisata->id)
            ->inRandomOrder()
            ->limit(4)
            ->with('kategori_detail.kategori')
            ->get();

        return view('pengunjung.profilWisata', compact('wisata', 'imgDetails', 'lainnya'));
    }
}
