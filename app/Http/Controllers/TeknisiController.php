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
        $teknisis = Teknisi::paginate(15);
        return view("teknisifile.index",[
            "title" => "SPM || Daftar Teknisi",
            "pages" => "Teknisi",
            "teknisis" => $teknisis,
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
        $validatedData = $request->validate([
            'nomor' => ['required','unique:teknisis'],
            'nama' => 'required',
            'jabatan' => 'required',
            'dipekerjakan' => 'required',
        ]);
        $validatedData['status'] = 1;

        Teknisi::create($validatedData);
        return redirect('/teknisi')->with('success','Data Ditambahkan');
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
        return view("teknisifile.edit",[
            "title" => "SPM || Edit Teknisi",
            "pages" => "Edit Teknisi",
            "sebelum" => "Teknisi",
            "linkPages" => "/teknisi",
            "teknisi" => $teknisi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeknisiRequest $request, Teknisi $teknisi)
    {
        $status = (int) $request->input('status');
        $rules = [
            'nama' => 'required',
            'jabatan' => 'required',
            'dipekerjakan' => 'required',
        ];
        if ($request->nomor != $teknisi->nomor) {
            $rules['nomor'] = 'required|unique:teknisis';
        }
        $validatedData = $request->validate($rules);   
        $validatedData['status'] = $status;
        Teknisi::where('id',$teknisi->id)
                    ->update($validatedData);
        return redirect('/teknisi')->with('success','Data Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teknisi $teknisi)
    {
        Teknisi::destroy($teknisi->id);
        return redirect('/teknisi')->with('danger','Data Dihapus');
    }
}
