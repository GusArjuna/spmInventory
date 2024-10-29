<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\DashboardControlller;
use App\Http\Controllers\LaporanKerusakanController;
use App\Http\Controllers\LaporanPeminjamanController;
use App\Http\Controllers\SukuCadangController;
use App\Http\Controllers\TeknisiController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardControlller::class)->group(function () {
    Route::get('/home', 'index');
});

Route::controller(SukuCadangController::class)->group(function () {
    Route::get('/sukucadang', 'index');
});

Route::controller(AlatController::class)->group(function () {
    Route::get('/alat', 'index');
});

Route::controller(TeknisiController::class)->group(function () {
    Route::get('/teknisi', 'index');
});

Route::controller(LaporanKerusakanController::class)->group(function () {
    Route::get('/laporankerusakan', 'index');
});

Route::controller(LaporanPeminjamanController::class)->group(function () {
    Route::get('/laporanpeminjaman', 'index');
});
