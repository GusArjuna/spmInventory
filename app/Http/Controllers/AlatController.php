<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Http\Requests\StoreAlatRequest;
use App\Http\Requests\UpdateAlatRequest;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("alatfile.index",[
            "title" => "SPM || Daftar Alat",
            "pages" => "Alat",
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
    public function store(StoreAlatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alat $alat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alat $alat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlatRequest $request, Alat $alat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alat $alat)
    {
        //
    }
}
