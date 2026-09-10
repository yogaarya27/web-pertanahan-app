<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\DokumenDesaController;
use App\Http\Controllers\PotensiDesaController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\DataPertanahanController;
use App\Models\Penduduk;
use App\Http\Controllers\GalleryController;
/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

/* =========================
HOME
========================= */

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/* =========================
PROFIL DESA
========================= */

Route::get('/profildesa', [PotensiDesaController::class, 'index'])
    ->name('profildesa');

Route::get(
    '/potensi-desa/{potensiDesa:slug}',
    [PotensiDesaController::class, 'show']
)->name('potensi.show');
Route::get('/potensi-latest', [PotensiDesaController::class, 'latest'])
    ->name('potensi.latest');
/* =========================
STRUKTUR ORGANISASI
========================= */

Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])
    ->name('struktur-organisasi');
    
Route::get('/data-penduduk', [DataPendudukController::class, 'index']);

Route::get('/data-pertanahan', [DataPertanahanController::class, 'index'])
    ->name('data-pertanahan');
/* =========================
BERITA
========================= */

Route::get('/berita', [NewsController::class, 'index'])
    ->name('berita');

Route::get('/berita/load-more', [NewsController::class, 'loadMore']);

Route::get('/berita/{slug}', [NewsController::class, 'show'])
    ->name('news.show');
/* =========================
LAYANAN
========================= */

Route::get('/layanan', [DokumenDesaController::class, 'index'])
    ->name('pages.layanan.layanan');

/* =========================
PENGADUAN
========================= */

Route::get('/pengaduan', [PengaduanController::class, 'create'])
    ->name('pengaduan.create');

Route::post('/pengaduan', [PengaduanController::class, 'store'])
    ->name('pengaduan.store');

Route::get('/check-status', [PengaduanController::class, 'checkStatus'])
    ->name('pengaduan.check-status');
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri');
/* =========================
KONTAK
========================= */

Route::view('/kontak', 'pages.kontak')
    ->name('kontak');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');