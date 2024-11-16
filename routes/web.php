<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\DashboardControlller;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LaporanKerusakanController;
use App\Http\Controllers\LaporanPembelianController;
use App\Http\Controllers\LaporanPeminjamanController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\SukuCadangController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\WagnerController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::fallback(function () {
        return redirect('/home');
    });
});

Route::controller(WagnerController::class)->group(function () {
    Route::get('/wagner', 'index')->middleware('auth');
});

Route::controller(DashboardControlller::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth');
    Route::get('/login', 'indexLogin')->middleware('guest')->name('login');
    Route::post('/login', 'loginAccount')->middleware('guest');
    Route::get('/register', 'indexRegister')->middleware('guest');
    Route::post('/register', 'registerAccount')->middleware('guest');
    Route::post('/logout', 'logout');
});

Route::controller(JenisController::class)->group(function () {
    Route::get('/jenis', 'index')->middleware('auth');
    Route::get('/jenis/tambah', 'create')->middleware('auth');
    Route::post('/jenis/tambah', 'store')->middleware('auth');
    Route::get('/jenis/{jenis}/edit', 'edit')->middleware('auth');
    Route::patch('/jenis/{jenis}', 'update')->middleware('auth');
    Route::delete('/jenis/{jenis}', 'destroy')->middleware('auth');
});

Route::controller(SukuCadangController::class)->group(function () {
    Route::get('/sukucadang', 'index')->middleware('auth');
    Route::get('/sukucadang/tambah', 'create')->middleware('auth');
    Route::post('/sukucadang/tambah', 'store')->middleware('auth');
    Route::get('/sukucadang/{sukuCadang}/edit', 'edit')->middleware('auth');
    Route::patch('/sukucadang/{sukuCadang}', 'update')->middleware('auth');
    Route::delete('/sukucadang/{sukuCadang}', 'destroy')->middleware('auth');
});

Route::controller(AlatController::class)->group(function () {
    Route::get('/alat', 'index')->middleware('auth');
    Route::get('/alat/tambah', 'create')->middleware('auth');
    Route::post('/alat/tambah', 'store')->middleware('auth');
    Route::get('/alat/{alat}/edit', 'edit')->middleware('auth');
    Route::patch('/alat/{alat}', 'update')->middleware('auth');
    Route::delete('/alat/{alat}', 'destroy')->middleware('auth');
});

Route::controller(TeknisiController::class)->group(function () {
    Route::get('/teknisi', 'index')->middleware('auth');
    Route::get('/teknisi/tambah', 'create')->middleware('auth');
    Route::post('/teknisi/tambah', 'store')->middleware('auth');
    Route::get('/teknisi/{teknisi}/edit', 'edit')->middleware('auth');
    Route::patch('/teknisi/{teknisi}', 'update')->middleware('auth');
    Route::delete('/teknisi/{teknisi}', 'destroy')->middleware('auth');
});

Route::controller(LaporanKerusakanController::class)->group(function () {
    Route::get('/laporankerusakan', 'index')->middleware('auth');
    Route::get('/laporankerusakan/tambah', 'create')->middleware('auth');
    Route::post('/laporankerusakan/tambah', 'store')->middleware('auth');
    Route::get('/laporankerusakan/{laporanKerusakan}/edit', 'edit')->middleware('auth');
    Route::patch('/laporankerusakan/{laporanKerusakan}', 'update')->middleware('auth');
    Route::delete('/laporankerusakan/{laporanKerusakan}', 'destroy')->middleware('auth');
});

Route::controller(LaporanPeminjamanController::class)->group(function () {
    Route::get('/laporanpeminjaman', 'index')->middleware('auth');
    Route::get('/laporanpeminjaman/tambah', 'create')->middleware('auth');
    Route::post('/laporanpeminjaman/tambah', 'store')->middleware('auth');
    Route::get('/laporanpeminjaman/{laporanPeminjaman}/edit', 'edit')->middleware('auth');
    Route::patch('/laporanpeminjaman/{laporanPeminjaman}', 'update')->middleware('auth');
    Route::delete('/laporanpeminjaman/{laporanPeminjaman}', 'destroy')->middleware('auth');
});

Route::controller(LaporanPembelianController::class)->group(function () {
    Route::get('/laporanpembelian', 'index')->middleware('auth');
    Route::get('/laporanpembelian/tambah', 'create')->middleware('auth');
    Route::post('/laporanpembelian/tambah', 'store')->middleware('auth');
    Route::get('/laporanpembelian/{laporanPembelian}/edit', 'edit')->middleware('auth');
    Route::patch('/laporanpembelian/{laporanPembelian}', 'update')->middleware('auth');
    Route::delete('/laporanpembelian/{laporanPembelian}', 'destroy')->middleware('auth');
});

Route::controller(LaporanPenjualanController::class)->group(function () {
    Route::get('/laporanpenjualan', 'index')->middleware('auth');
    Route::get('/laporanpenjualan/tambah', 'create')->middleware('auth');
    Route::post('/laporanpenjualan/tambah', 'store')->middleware('auth');
    Route::get('/laporanpenjualan/{laporanPenjualan}/edit', 'edit')->middleware('auth');
    Route::patch('/laporanpenjualan/{laporanPenjualan}', 'update')->middleware('auth');
    Route::delete('/laporanpenjualan/{laporanPenjualan}', 'destroy')->middleware('auth');
});
