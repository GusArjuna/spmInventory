<?php

namespace App\Http\Controllers;

use App\Models\LaporanPembelian;
use App\Http\Requests\StoreLaporanPembelianRequest;
use App\Http\Requests\UpdateLaporanPembelianRequest;

class LaporanPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("laporanpembelianfile.index",[
            "title" => "SPM || Laporan Pembelian",
            "pages" => "Laporan Pembelian",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("laporanpembelianfile.tambah",[
            "title" => "SPM || Tambah Laporan",
            "pages" => "Tambah Laporan",
            "sebelum" => "Laporan Pembelian",
            "linkPages" => "/laporanpembelian",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaporanPembelianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanPembelian $laporanPembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanPembelian $laporanPembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporanPembelianRequest $request, LaporanPembelian $laporanPembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanPembelian $laporanPembelian)
    {
        //
    }
}
