<?php

namespace App\Http\Controllers;

use App\Models\LaporanKerusakan;
use App\Http\Requests\StoreLaporanKerusakanRequest;
use App\Http\Requests\UpdateLaporanKerusakanRequest;

class LaporanKerusakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("laporankerusakanfile.index",[
            "title" => "SPM || Laporan Kerusakan",
            "pages" => "Laporan Kerusakan",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaporanKerusakanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanKerusakan $laporanKerusakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanKerusakan $laporanKerusakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporanKerusakanRequest $request, LaporanKerusakan $laporanKerusakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanKerusakan $laporanKerusakan)
    {
        //
    }
}
