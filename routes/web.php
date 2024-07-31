<?php

use App\Http\Controllers\pengunjungBerandaController;
use App\Http\Controllers\pengunjunghubungiKamiController;
use App\Http\Controllers\pengunjungPetaWilayahController;
use App\Http\Controllers\pengunjungProfilWisataController;
use App\Http\Controllers\pengunjungRuteTerdekatController;
use App\Http\Controllers\pengunjungWisataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [pengunjungBerandaController::class, 'index'])->name('beranda');
Route::get('/wisata', [pengunjungWisataController::class, 'index'])->name('wisata');
Route::get('/petaWilayah', [pengunjungPetaWilayahController::class, 'index'])->name('petaWilayah');
Route::get('/hubungiKami', [pengunjunghubungiKamiController::class, 'index'])->name('hubungiKami');
Route::get('/wisata/profil', [pengunjungProfilWisataController::class, 'index'])->name('profilWisata');
Route::get('/ruteTerdekat', [pengunjungRuteTerdekatController::class, 'index'])->name('ruteTerdekat');
// routes/web.php

Route::get('/test-view', function () {
    return view('pengunjung.ruteTerdekat');
});

