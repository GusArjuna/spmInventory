<?php

namespace App\Http\Controllers;

use App\Models\SukuCadang;
use App\Http\Requests\StoreSukuCadangRequest;
use App\Http\Requests\UpdateSukuCadangRequest;
use App\Models\Alat;
use App\Models\jenis;
use App\Models\Wagner;

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
        $alats = Alat::all();
        return view("sukucadangfile.tambah",[
            "title" => "SPM || Tambah Suku Cadang",
            "pages" => "Tambah Suku Cadang",
            "sebelum" => "Suku Cadang",
            "linkPages" => "/sukucadang",
            "alats" => $alats,
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
            'holdingCost' => 'required',
            'biayaPemesanan' => 'required',
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
        $alats = Alat::all();
        return view("sukucadangfile.edit",[
            "title" => "SPM || Edit Suku Cadang",
            "pages" => "Edit Suku Cadang",
            "sebelum" => "Suku Cadang",
            "linkPages" => "/sukucadang",
            "alats" => $alats,
            "sukuCadang" => $sukuCadang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSukuCadangRequest $request, SukuCadang $sukuCadang)
    {
        $harga = (int) $request->input('harga');
        $holdingCosts = (int) $request->input('holdingCosts');
        $biayaPemesanan = (int) $request->input('biayaPemesanan');
        $rules = [
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'holdingCost' => 'required',
            'biayaPemesanan' => 'required',
        ];
        if ($request->nomor != $sukuCadang->nomor) {
            $rules['nomor'] = 'required|unique:suku_cadangs';
        }
        $validatedData = $request->validate($rules);   
        $validatedData['harga'] = $harga;
        $validatedData['holdingCosts'] = $holdingCosts;
        $validatedData['biayaPemesanan'] = $biayaPemesanan;
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
