<?php

namespace App\Http\Controllers;

use App\Models\DataWisata;
use App\Models\DataKategori;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function adminBeranda()
    {
        // Mengambil seluruh DataKategori beserta jumlah wisata
        $categories = DataKategori::with(['kategori_details.wisatas'])
            ->get()
            ->map(function ($category) {
                $category->total_wisatas = $category->kategori_details->sum(function ($detail) {
                    return $detail->wisatas->count();
                });
                return $category;
            });
        $dataLokasi = DataWisata::with('kategori_detail.kategori')->get();

        // Mengirim data ke view
        return view('admin.adminBeranda', compact('categories', 'dataLokasi'));
    }



    public function dashboard()
    {
        $countWisata = DataWisata::count();
        view()->share('countWisata', $countWisata); // Bagikan variabel ke seluruh view
        return view('partials.sidebar');
    }
   
}
