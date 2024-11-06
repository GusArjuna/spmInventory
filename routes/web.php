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
use Illuminate\Support\Facades\Route;

Route::controller(DashboardControlller::class)->group(function () {
    // Route::get('/home', 'index')->middleware('auth');
    Route::get('/home', 'index');
    Route::get('/login', 'indexLogin')->middleware('guest')->name('login');
    Route::post('/login', 'loginAccount')->middleware('guest');
    Route::get('/register', 'indexRegister')->middleware('guest');
    Route::post('/register', 'registerAccount')->middleware('guest');
    Route::post('/logout', 'logout');
});

Route::controller(JenisController::class)->group(function () {
    Route::get('/jenis', 'index');
    Route::get('/jenis/tambah', 'create');
    Route::post('/jenis/tambah', 'store');
    Route::get('/jenis/{jenis}/edit', 'edit');
    Route::patch('/jenis/{jenis}', 'update');
    Route::delete('/jenis/{jenis}', 'destroy');
});

Route::controller(SukuCadangController::class)->group(function () {
    Route::get('/sukucadang', 'index');
    Route::get('/sukucadang/tambah', 'create');
    Route::post('/sukucadang/tambah', 'store');
    Route::get('/sukucadang/{sukuCadang}/edit', 'edit');
    Route::patch('/sukucadang/{sukuCadang}', 'update');
    Route::delete('/sukucadang/{sukuCadang}', 'destroy');
});

Route::controller(AlatController::class)->group(function () {
    Route::get('/alat', 'index');
    Route::get('/alat/tambah', 'create');
    Route::post('/alat/tambah', 'store');
    Route::get('/alat/{alat}/edit', 'edit');
    Route::patch('/alat/{alat}', 'update');
    Route::delete('/alat/{alat}', 'destroy');
});

Route::controller(TeknisiController::class)->group(function () {
    Route::get('/teknisi', 'index');
    Route::get('/teknisi/tambah', 'create');
    Route::post('/teknisi/tambah', 'store');
    Route::get('/teknisi/{teknisi}/edit', 'edit');
    Route::patch('/teknisi/{teknisi}', 'update');
    Route::delete('/teknisi/{teknisi}', 'destroy');
});

Route::controller(LaporanKerusakanController::class)->group(function () {
    Route::get('/laporankerusakan', 'index');
    Route::get('/laporankerusakan/tambah', 'create');
    Route::post('/laporankerusakan/tambah', 'store');
    Route::get('/laporankerusakan/{laporanKerusakan}/edit', 'edit');
    Route::patch('/laporankerusakan/{laporanKerusakan}', 'update');
    Route::delete('/laporankerusakan/{laporanKerusakan}', 'destroy');
});

Route::controller(LaporanPeminjamanController::class)->group(function () {
    Route::get('/laporanpeminjaman', 'index');
    Route::get('/laporanpeminjaman/tambah', 'create');
    Route::post('/laporanpeminjaman/tambah', 'store');
    Route::get('/laporanpeminjaman/{laporanPeminjaman}/edit', 'edit');
    Route::patch('/laporanpeminjaman/{laporanPeminjaman}', 'update');
    Route::delete('/laporanpeminjaman/{laporanPeminjaman}', 'destroy');
});

Route::controller(LaporanPembelianController::class)->group(function () {
    Route::get('/laporanpembelian', 'index');
    Route::get('/laporanpembelian/tambah', 'create');
    Route::post('/laporanpembelian/tambah', 'store');
    Route::get('/laporanpembelian/{laporanPembelian}/edit', 'edit');
    Route::patch('/laporanpembelian/{laporanPembelian}', 'update');
    Route::delete('/laporanpembelian/{laporanPembelian}', 'destroy');
});

Route::controller(LaporanPenjualanController::class)->group(function () {
    Route::get('/laporanpenjualan', 'index');
    Route::get('/laporanpenjualan/tambah', 'create');
    Route::post('/laporanpenjualan/tambah', 'store');
    Route::get('/laporanpenjualan/{laporanPenjualan}/edit', 'edit');
    Route::patch('/laporanpenjualan/{laporanPenjualan}', 'update');
    Route::delete('/laporanpenjualan/{laporanPenjualan}', 'destroy');
});
