<?php

namespace App\Http\Controllers;

use App\Models\SukuCadang;
use App\Http\Requests\StoreSukuCadangRequest;
use App\Http\Requests\UpdateSukuCadangRequest;
use App\Models\jenis;

class SukuCadangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sukuCadangs = SukuCadang::paginate(15);
        return view("sukucadangfile.index",[
            "title" => "SPM || Daftar Suku Cadang",
            "pages" => "Suku Cadang",
            "sukuCadangs" => $sukuCadangs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jeniss = jenis::all();
        return view("sukucadangfile.tambah",[
            "title" => "SPM || Tambah Suku Cadang",
            "pages" => "Tambah Suku Cadang",
            "sebelum" => "Suku Cadang",
            "linkPages" => "/sukucadang",
            "jeniss" => $jeniss,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSukuCadangRequest $request)
    {
        $harga = (int) $request->input('harga');
        $validatedData = $request->validate([
            'nomor' => ['required','unique:suku_cadangs'],
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'stock' => 'required',
        ]);
        $validatedData['harga'] = $harga;
        
        SukuCadang::create($validatedData);
        return redirect('/sukucadang')->with('success','Data Ditambahkan');
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
        $jeniss = jenis::all();
        return view("sukucadangfile.edit",[
            "title" => "SPM || Edit Suku Cadang",
            "pages" => "Edit Suku Cadang",
            "sebelum" => "Suku Cadang",
            "linkPages" => "/sukucadang",
            "jeniss" => $jeniss,
            "sukuCadang" => $sukuCadang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSukuCadangRequest $request, SukuCadang $sukuCadang)
    {
        $harga = (int) $request->input('harga');
        $rules = [
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'stock' => 'required',
        ];
        if ($request->nomor != $sukuCadang->nomor) {
            $rules['nomor'] = 'required|unique:suku_cadangs';
        }
        $validatedData = $request->validate($rules);   
        $validatedData['harga'] = $harga;
        SukuCadang::where('id',$sukuCadang->id)
                    ->update($validatedData);
        return redirect('/sukucadang')->with('success','Data Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SukuCadang $sukuCadang)
    {
        SukuCadang::destroy($sukuCadang->id);
        return redirect('/sukucadang')->with('danger','Data Dihapus');
    }
}
