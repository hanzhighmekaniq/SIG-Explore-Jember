<?php

use App\Http\Controllers\adminBerandaController;
use App\Http\Controllers\pengunjungBerandaController;
use App\Http\Controllers\pengunjunghubungiKamiController;
use App\Http\Controllers\pengunjungPetaWilayahController;
use App\Http\Controllers\pengunjungPetaWisataController;
use App\Http\Controllers\pengunjungProfilWisataController;
use App\Http\Controllers\pengunjungRuteTerdekatController;
use App\Http\Controllers\pengunjungWisataController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pengunjung.wisata');
});

Route::get('/dashboard', function () {
    return view('admin.adminBeranda');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [pengunjungBerandaController::class,'index'])->name('beranda.index');
Route::get('/wisata', [pengunjungWisataController::class,'index'])->name('wisata.index');
Route::get('/petaWilayah', [pengunjungPetaWilayahController::class,'index'])->name('beranda.index');
Route::get('/hubungiKami', [pengunjunghubungiKamiController::class,'index'])->name('beranda.index');
Route::get('/wisata/profil', [pengunjungProfilWisataController::class,'index'])->name('beranda.index');
Route::get('/wisata/petaWisata', [pengunjungPetaWisataController::class,'index'])->name('petaWisata.index');
Route::get('/wisata/petaWisata/ruteTerdekat', [pengunjungRuteTerdekatController::class,'index'])->name('ruteTerdekat.index');


require __DIR__.'/auth.php';
