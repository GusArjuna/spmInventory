<?php

namespace App\Http\Controllers;

use App\Models\jenis;
use App\Http\Requests\StorejenisRequest;
use App\Http\Requests\UpdatejenisRequest;
use App\Models\Alat;
use App\Models\SukuCadang;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jeniss = jenis::paginate(15);
        return view("jenisfile.index",[
            "title" => "SPM || Jenis Barang",
            "pages" => "Jenis",
            "jeniss" => $jeniss,
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
        $validatedData = $request->validate([
            'nomor' => ['required','unique:jenis'],
            'jenis' => 'required',
        ]);

        
        jenis::create($validatedData);
        return redirect('/jenis')->with('success','Data Ditambahkan');
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
        return view("jenisfile.edit",[
            "title" => "SPM || Edit Jenis",
            "pages" => "Edit Jenis",
            "sebelum" => "Jenis",
            "linkPages" => "/jenis",
            "jenis" => $jenis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatejenisRequest $request, jenis $jenis)
    {
        $temp = jenis::where('nomor', '!=', $jenis->nomor)->get()->first()->nomor;
        $rules = [
            'jenis' => 'required',
        ];
        if ($request->nomor != $jenis->nomor) {
            $rules['nomor'] = 'required|unique:jenis';
        }     
        $validatedData = $request->validate($rules);
        if (SukuCadang::where('jenis', $jenis->nomor)
        ->update(['jenis' => $temp])==1) {
            SukuCadang::where('jenis', $jenis->nomor)
                    ->update(['jenis' => $temp]);
            jenis::where('id',$jenis->id)
                    ->update($validatedData);
            SukuCadang::where('jenis', $temp)
                    ->update(['jenis' => $request->nomor]);
        }
        if (Alat::where('jenis', $jenis->nomor)
        ->update(['jenis' => $temp])==1) {
            Alat::where('jenis', $jenis->nomor)
                    ->update(['jenis' => $temp]);
            jenis::where('id',$jenis->id)
                    ->update($validatedData);
            Alat::where('jenis', $temp)
                    ->update(['jenis' => $request->nomor]);
        }
        return redirect('/jenis')->with('success','Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jenis $jenis)
    {
        jenis::destroy($jenis->id);
        return redirect('/jenis')->with('danger','Data Dihapus');
    }
}
