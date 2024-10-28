<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\SessionController;
// Rute untuk pengunjung
Route::get('/', [PengunjungController::class, 'beranda'])->name('beranda.index');
Route::get('/wisata', [PengunjungController::class, 'wisata'])->name('wisata.index');
Route::get('/petaWilayah', [PengunjungController::class, 'petaWilayah'])->name('petaWilayah.index');
Route::get('/hubungiKami', [PengunjungController::class, 'hubungiKami'])->name('hubungiKami.index');
Route::get('/wisata/profil', [PengunjungController::class, 'detailWisata'])->name('profilWisata.index');
Route::get('/wisata/profil/ruteTerdekat', [PengunjungController::class, 'rute'])->name('ruteTerdekat.index');

// Rute untuk session login
Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/session/login', [SessionController::class, 'loginProses'])->name('session.login');
Route::post('logout', [SessionController::class, 'logout'])->name('logout');

// Rute untuk admin


Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'adminBeranda'])->name('dashboard');
        Route::get('/data-wisata', [AdminController::class, 'adminDataWisata'])->name('dataWisata');
        Route::get('/kategori', [AdminController::class, 'adminKategori'])->name('kategori');
        Route::get('/tambah-wisata', [AdminController::class, 'tambahWisata'])->name('tambahWisata');
        Route::get('/tambah-event', [AdminController::class, 'tambahEvent'])->name('tambahEvent');
        Route::get('/tambah-kuliner', [AdminController::class, 'tambahKuliner'])->name('tambahKuliner');

        // CRUD

        Route::delete('data-wisata/{id}', [AdminController::class, 'destroy'])->name('data-wisata.destroy');


        // Rute untuk profil (jika diperlukan)
        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


