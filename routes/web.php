<?php

use App\Http\Controllers\pengunjungBerandaController;
use App\Http\Controllers\pengunjunghubungiKamiController;
use App\Http\Controllers\pengunjungPetaWilayahController;
use App\Http\Controllers\pengunjungPetaWisataController;
use App\Http\Controllers\pengunjungProfilWisataController;
use App\Http\Controllers\pengunjungRuteTerdekatController;
use App\Http\Controllers\pengunjungWisataController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [pengunjungBerandaController::class, 'index'])->name('beranda.index');
Route::get('/wisata', [pengunjungWisataController::class, 'index'])->name('wisata.index');
Route::get('/petaWilayah', [pengunjungPetaWilayahController::class, 'index'])->name('petaWilayah.index');
Route::get('/hubungiKami', [pengunjunghubungiKamiController::class, 'index'])->name('hubungiKami.index');
Route::get('/wisata/profil', [pengunjungProfilWisataController::class, 'index'])->name('profilWisata.index');
Route::get('/wisata/profil/ruteTerdekat', [pengunjungRuteTerdekatController::class, 'index'])->name('ruteTerdekat.index');
Route::get('/wisata/petaWisata', [pengunjungPetaWisataController::class, 'index'])->name('petaWisata.index');

Route::get('/dashboard', function () {
    return view('admin.adminBeranda');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
