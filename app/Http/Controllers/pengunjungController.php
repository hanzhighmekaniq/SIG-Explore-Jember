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
        // Ambil event dengan filter temporer
        $event = DataEvent::where(function ($query) {
            $query->where('is_temporer', 0) // semua event permanen
                ->orWhere(function ($query) {
                    $query->where('is_temporer', 1)
                        ->where('event_berakhir', '>=', now()); // temporer yang belum berakhir
                });
        })->get();

        // Ubah format tanggal dll
        $event->transform(function ($e) {
            $e->event_mulai_tanggal = Carbon::parse($e->event_mulai)->translatedFormat('d F Y');
            $e->event_berakhir_tanggal = Carbon::parse($e->event_berakhir)->translatedFormat('d F Y');
            $e->event_mulai_waktu = Carbon::parse($e->event_mulai)->format('H:i');
            $e->event_berakhir_waktu = Carbon::parse($e->event_berakhir)->format('H:i');
            $e->htm_event = number_format($e->htm_event, 0, ',', '');

            return $e;
        });

        // Wisata
        $wisata = DataWisata::all();

        $filterWisata = DataWisata::with('kategori_detail.kategori')
            ->inRandomOrder()
            ->limit(4)
            ->get();

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
        $wisata = DataWisata::where('nama_wisata', $nama_wisata)
            ->with(['kategori_detail.kategori', 'events', 'kuliners'])
            ->firstOrFail();

        $imgDetails = json_decode($wisata->img_detail, true) ?? [];
        shuffle($imgDetails);
        $imgDetails = array_slice($imgDetails, 0, 8);

        $lainnya = DataWisata::where('id', '!=', $wisata->id)
            ->inRandomOrder()
            ->limit(4)
            ->with('kategori_detail.kategori')
            ->get();

        return view('pengunjung.profilWisata', compact(
            'wisata',
            'imgDetails',
            'lainnya',
        ));
    }
}
