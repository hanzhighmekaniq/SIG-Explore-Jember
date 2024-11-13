<?php
namespace App\Http\Controllers;

use App\Models\DataWisata;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function adminBeranda()
    {
        // Menghitung wisata yang memiliki kategori 'Alam'
        $countAlam = DataWisata::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'Alam');
        })->count();

        // Menghitung wisata yang memiliki kategori 'Buatan'
        $countBuatan = DataWisata::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'Buatan');
        })->count();

        // Mengambil seluruh data lokasi
        $dataLokasi = DataWisata::all();

        // Mengirim data ke view adminBeranda
        return view('admin.adminBeranda', compact('countAlam', 'countBuatan', 'dataLokasi'));
    }
}

