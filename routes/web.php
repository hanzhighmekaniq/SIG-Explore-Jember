<?php

use Illuminate\Http\Request;
use App\Models\DataKategoriDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aqController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\subKategori;
use App\Http\Controllers\UjiCoba;

//aq
Route::get('/aq', [aqController::class, 'aq'])->name('aq.index');

// Rute untuk pengunjung
Route::get('/', [PengunjungController::class, 'beranda'])->name('beranda.index');



// Route untuk AJAX request
Route::get('/get-detail-kategori', [PengunjungController::class, 'getDetailKategori'])->name('get.detail.kategori');

Route::get('/wisata', [PengunjungController::class, 'wisata'])->name('wisata.pengunjung');

Route::get('/get-kategori-details/{kategori_id}', [PengunjungController::class, 'getKategoriDetails']);



Route::get('/petaWilayah', [PengunjungController::class, 'petaWilayah'])->name('petaWilayah.index');
Route::get('/hubungiKami', [PengunjungController::class, 'hubungiKami'])->name('hubungiKami.index');
Route::get('/wisata/profil/{nama_wisata}', [PengunjungController::class, 'detailWisata'])->name('profilWisata.index');
Route::get('/wisata/profil/ruteTerdekat/{nama_wisata}', [PengunjungController::class, 'rute'])->name('ruteTerdekat.index');

// Rute untuk session login
Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/session/login', [SessionController::class, 'loginProses'])->name('session.login');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
Route::get('/ujicoba', [UjiCoba::class, 'ujicoba'])->name('ujicoba');

// Rute untuk admin


Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'adminBeranda'])->name('dashboard');

        // Resource routes
        // Route::POST('/kategori-detail', [KategoriController::class, 'storeSubKategori'])->name('subKategori.store');
        Route::resource('subKategori', subKategori::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('wisata', WisataController::class);
        Route::resource('event', EventController::class);
        Route::resource('kuliner', KulinerController::class);

        // Optional Profile Routes
        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
