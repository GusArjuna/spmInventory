<?php

namespace App\Http\Controllers;

use App\Models\LaporanPeminjaman;
use App\Http\Requests\StoreLaporanPeminjamanRequest;
use App\Http\Requests\UpdateLaporanPeminjamanRequest;

class LaporanPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("laporanpeminjamanfile.index",[
            "title" => "SPM || Laporan Peminjaman",
            "pages" => "Laporan Peminjaman",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("laporanpeminjamanfile.tambah",[
            "title" => "SPM || Tambah Laporan",
            "pages" => "Tambah Laporan",
            "sebelum" => "Laporan Peminjaman",
            "linkPages" => "/laporanpeminjaman",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaporanPeminjamanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanPeminjaman $laporanPeminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanPeminjaman $laporanPeminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporanPeminjamanRequest $request, LaporanPeminjaman $laporanPeminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanPeminjaman $laporanPeminjaman)
    {
        //
    }
}
