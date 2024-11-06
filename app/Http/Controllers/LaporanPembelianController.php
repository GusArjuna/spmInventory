<?php

namespace App\Http\Controllers;

use App\Models\LaporanPembelian;
use App\Http\Requests\StoreLaporanPembelianRequest;
use App\Http\Requests\UpdateLaporanPembelianRequest;
use App\Models\SukuCadang;

class LaporanPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporanPembelians = LaporanPembelian::paginate(15);
        return view("laporanpembelianfile.index",[
            "title" => "SPM || Laporan Pembelian",
            "pages" => "Laporan Pembelian",
            "laporanPembelian" => $laporanPembelians,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sukuCadangs = SukuCadang::all();
        return view("laporanpembelianfile.tambah",[
            "title" => "SPM || Tambah Laporan",
            "pages" => "Tambah Laporan",
            "sebelum" => "Laporan Pembelian",
            "linkPages" => "/laporanpembelian",
            "sukuCadangs" => $sukuCadangs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaporanPembelianRequest $request)
    {
        $jumlah = (int) $request->jumlah;
        $validatedData = $request->validate([
            'nomor' => ['required','unique:laporan_pembelians'],
            'nama' => 'required',
            'jumlah' => 'required',
        ]);
        $validatedData['jumlah']=$jumlah;
        $stock = SukuCadang::where('nomor',$request->nama)->get()->first()->stock + $jumlah;
        
        SukuCadang::where('nomor',$request->nama)
                    ->update(['stock' => $stock]);
        
        LaporanPembelian::create($validatedData);
        return redirect('/laporanpembelian')->with('success','Data Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanPembelian $laporanPembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanPembelian $laporanPembelian)
    {
        $sukuCadangs = SukuCadang::all();
        return view("laporanpembelianfile.edit",[
            "title" => "SPM || Tambah Laporan",
            "pages" => "Tambah Laporan",
            "sebelum" => "Laporan Pembelian",
            "linkPages" => "/laporanpembelian",
            "sukuCadangs" => $sukuCadangs,
            "laporanPembelian" => $laporanPembelian,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporanPembelianRequest $request, LaporanPembelian $laporanPembelian)
    {
        $checkPerubahan = false;
        $rules = [
            'nama' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ];
        if ($request->nomor != $laporanPembelian->nomor) {
            $rules['nomor'] = 'required|unique:laporan_kerusakans';
        }
        // 0 sedang dikerjakan 1 sudah diperbaiki
        $validatedData = $request->validate($rules);
        $validatedData['jumlah'] = (int) $request->input('jumlah');
        $stockAkhir=0;

        if ($request->jumlah != $laporanPembelian->jumlah) {
            // jumlah nya tidak sama
            $checkPerubahan = true;
            $stocks = (int)$laporanPembelian->jumlah-(int) $request->jumlah;
            $stockAwal = SukuCadang::where('nomor',$request->nama)->get()->first()->stock;
            $stockAkhir = $stockAwal-$stocks;
            // dd("Jumlah Beda, Status masih sedang diperbaiki",$laporanPembelian->jumlah,$request->jumlah,$stocks,$stockAwal,$stockAkhir,$checkPerubahan);
        } elseif($request->jumlah == $laporanPembelian->jumlah){
            // jumlah sama 
            // dd("Jumlah Sama, Status masih sedang diperbaiki",$laporanPembelian->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
        }
        
        if ($checkPerubahan) {
            if ($stockAkhir<0) {
                return redirect('/laporankerusakan'.$laporanPembelian->id.'/edit')->with('danger','Stock Kurang')->withInput();
            }
            SukuCadang::where('nomor',$request->nama)
                        ->update(['stock' => $stockAkhir]);
        }

        
        LaporanPembelian::where('id',$laporanPembelian->id)
                        ->update($validatedData);
        return redirect('/laporanpembelian')->with('success','Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanPembelian $laporanPembelian)
    {
        $stocks = $laporanPembelian->jumlah;
        $stockAkhir = SukuCadang::where('nomor',$laporanPembelian->nama)->get()->first()->stock - $stocks;
        if ($stockAkhir<0) {
            return redirect('/laporankerusakan')->with('danger','Stock Kurang')->withInput();
        }
        SukuCadang::where('nomor',$laporanPembelian->nama)
                    ->update(['stock' => $stockAkhir]);
        
        laporanPembelian::destroy($laporanPembelian->id);
        return redirect('/laporanpembelian')->with('danger','Data Dihapus');
    }
}
