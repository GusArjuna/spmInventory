<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use App\Http\Requests\StoreTeknisiRequest;
use App\Http\Requests\UpdateTeknisiRequest;

class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("teknisifile.index",[
            "title" => "SPM || Daftar Teknisi",
            "pages" => "Teknisi",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("teknisifile.tambah",[
            "title" => "SPM || Tambah Teknisi",
            "pages" => "Tambah Teknisi",
            "sebelum" => "Teknisi",
            "linkPages" => "/teknisi",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeknisiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teknisi $teknisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teknisi $teknisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeknisiRequest $request, Teknisi $teknisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teknisi $teknisi)
    {
        //
    }
}
