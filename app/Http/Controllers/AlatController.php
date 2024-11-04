<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Http\Requests\StoreAlatRequest;
use App\Http\Requests\UpdateAlatRequest;
use App\Models\jenis;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alats = Alat::paginate(15);
        return view("alatfile.index",[
            "title" => "SPM || Daftar Alat",
            "pages" => "Alat",
            "alats" => $alats,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jeniss = jenis::all();
        return view("alatfile.tambah",[
            "title" => "SPM || Tambah Alat",
            "pages" => "Tambah Alat",
            "sebelum" => "Alat",
            "linkPages" => "/alat",
            "jeniss" => $jeniss,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlatRequest $request)
    {
        $harga = (int) $request->input('harga');
        $validatedData = $request->validate([
            'nomor' => ['required','unique:alats'],
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'stock' => 'required',
        ]);
        $validatedData['harga'] = $harga;
        
        
        Alat::create($validatedData);
        return redirect('/alat')->with('success','Data Ditambahkan');
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
        $jeniss = jenis::all();
        return view("alatfile.edit",[
            "title" => "SPM || Edit Alat",
            "pages" => "Edit Alat",
            "sebelum" => "Alat",
            "linkPages" => "/alat",
            "jeniss" => $jeniss,
            "alat" => $alat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlatRequest $request, Alat $alat)
    {
        $harga = (int) $request->input('harga');
        $rules = [
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'stock' => 'required',
        ];
        if ($request->nomor != $alat->nomor) {
            $rules['nomor'] = 'required|unique:alats';
        }
        $validatedData = $request->validate($rules);   
        $validatedData['harga'] = $harga;
        Alat::where('id',$alat->id)
                    ->update($validatedData);
        return redirect('/alat')->with('success','Data Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alat $alat)
    {
        Alat::destroy($alat->id);
        return redirect('/alat')->with('danger','Data Dihapus');
    }
}
