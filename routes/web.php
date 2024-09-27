<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengunjungController; // Make sure this is the correct class name

Route::get('/beranda', [PengunjungController::class, 'beranda'])->name('beranda.index');
Route::get('/wisata', [PengunjungController::class, 'wisata'])->name('wisata.index');
Route::get('/petaWilayah', [PengunjungController::class, 'petaWilayah'])->name('petaWilayah.index');
Route::get('/hubungiKami', [PengunjungController::class, 'hubungiKami'])->name('hubungiKami.index');
Route::get('/wisata/profil', [PengunjungController::class, 'detailWisata'])->name('profilWisata.index');
Route::get('/wisata/profil/ruteTerdekat', [PengunjungController::class, 'rute'])->name('ruteTerdekat.index');

Route::get('/dashboard', function () {
    return view('admin.adminBeranda');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
