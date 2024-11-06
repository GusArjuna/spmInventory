<?php

namespace App\Http\Controllers;

use App\Models\Wagner;
use App\Http\Requests\StoreWagnerRequest;
use App\Http\Requests\UpdateWagnerRequest;

class WagnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wagners = Wagner::paginate(15);
        return view("wagnerfile.index",[
            "title" => "SPM || Algoritma Wagner Whitin",
            "pages" => "Algoritma Wagner Whitin",
            "wagners" => $wagners,
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
    public function store(StoreWagnerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Wagner $wagner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wagner $wagner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWagnerRequest $request, Wagner $wagner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wagner $wagner)
    {
        //
    }
}
