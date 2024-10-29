<?php

namespace App\Http\Controllers;

use App\Models\SukuCadang;
use App\Http\Requests\StoreSukuCadangRequest;
use App\Http\Requests\UpdateSukuCadangRequest;

class SukuCadangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("sukucadangfile.index",[
            "title" => "SPM || Daftar Suku Cadang",
            "pages" => "Suku Cadang",
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
    public function store(StoreSukuCadangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SukuCadang $sukuCadang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SukuCadang $sukuCadang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSukuCadangRequest $request, SukuCadang $sukuCadang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SukuCadang $sukuCadang)
    {
        //
    }
}
