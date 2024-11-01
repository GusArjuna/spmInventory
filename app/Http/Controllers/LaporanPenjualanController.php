<?php

namespace App\Http\Controllers;

use App\Models\LaporanPenjualan;
use App\Http\Requests\StoreLaporanPenjualanRequest;
use App\Http\Requests\UpdateLaporanPenjualanRequest;

class LaporanPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("laporanpenjualanfile.index",[
            "title" => "SPM || Laporan Penjualan",
            "pages" => "Laporan Penjualan",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("laporanpenjualanfile.tambah",[
            "title" => "SPM || Tambah Laporan",
            "pages" => "Tambah Laporan",
            "sebelum" => "Laporan Penjualan",
            "linkPages" => "/laporanpenjualan",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaporanPenjualanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanPenjualan $laporanPenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanPenjualan $laporanPenjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporanPenjualanRequest $request, LaporanPenjualan $laporanPenjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanPenjualan $laporanPenjualan)
    {
        //
    }
}
