<?php

namespace App\Http\Controllers;

use App\Models\jenis;
use App\Http\Requests\StorejenisRequest;
use App\Http\Requests\UpdatejenisRequest;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("jenisfile.index",[
            "title" => "SPM || Jenis Barang",
            "pages" => "Jenis",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jenisfile.tambah",[
            "title" => "SPM || Tambah Jenis",
            "pages" => "Tambah Jenis",
            "sebelum" => "Jenis",
            "linkPages" => "/jenis",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorejenisRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatejenisRequest $request, jenis $jenis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jenis $jenis)
    {
        //
    }
}
