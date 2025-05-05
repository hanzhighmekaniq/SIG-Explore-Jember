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
        $event = DataEvent::where(function ($query) {
            $query->where('is_temporer', 0)
                ->orWhere(function ($query) {
                    $query->where('is_temporer', 1)
                        ->where('event_berakhir', '>=', now());
                });
        })->get();

        $event->transform(function ($e) {
            $e->event_mulai_tanggal = Carbon::parse($e->event_mulai)->translatedFormat('d F Y');
            $e->event_berakhir_tanggal = Carbon::parse($e->event_berakhir)->translatedFormat('d F Y');
            $e->event_mulai_waktu = Carbon::parse($e->event_mulai)->format('H:i');
            $e->event_berakhir_waktu = Carbon::parse($e->event_berakhir)->format('H:i');
            $e->htm_event = number_format($e->htm_event, 0, ',', '');

            return $e;
        });

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
        $kategoris = DataKategori::all();

        $query = DataWisata::query();

        if ($request->filled('nama_wisata')) {
            $query->where('nama_wisata', 'like', '%' . $request->nama_wisata . '%');
        }

        if ($request->filled('id_kategori')) {
            $query->whereHas('kategori_detail', function ($q) use ($request) {
                $q->where('id_kategori', $request->id_kategori);
            });
        }

        $wisata = $query->paginate(20);

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
        $rute = DataWisata::with('kategori_detail.kategori')->paginate(10);
        return view('pengunjung.petaWilayah', compact('peta', 'rute'));
    }

    public function detailWisata($nama_wisata)
    {
        $data = DataWisata::where('nama_wisata', $nama_wisata)
            ->with(['kategori_detail.kategori', 'events', 'kuliners'])
            ->firstOrFail();

        $imgDetails = json_decode($data->img_detail, true) ?? [];
        shuffle($imgDetails);
        $imgDetails = array_slice($imgDetails, 0, 8);

        $lainnya = DataWisata::where('id', '!=', $data->id)
            ->inRandomOrder()
            ->limit(4)
            ->with('kategori_detail.kategori')
            ->get();

        $reviews = $data->reviews()->latest()->get();

        // ambil komentar
        $komentar = \App\Models\Komentar::where('wisata_id', $data->id)->latest()->get();

        return view('pengunjung.profilWisata', compact(
            'data',
            'imgDetails',
            'lainnya',
            'reviews',
            'komentar'
        ));
    }

    public function storeReview(Request $request, $wisata_id)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'komentar' => 'required|max:1000',
        ]);

        \App\Models\Review::create([
            'wisata_id' => $wisata_id,
            'nama' => $request->nama,
            'komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }
}
