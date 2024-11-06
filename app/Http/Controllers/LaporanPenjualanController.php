<?php

namespace App\Http\Controllers;

use App\Models\LaporanPenjualan;
use App\Http\Requests\StoreLaporanPenjualanRequest;
use App\Http\Requests\UpdateLaporanPenjualanRequest;
use App\Models\SukuCadang;

class LaporanPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporanPenjualans = LaporanPenjualan::paginate(15);
        return view("laporanpenjualanfile.index",[
            "title" => "SPM || Laporan Penjualan",
            "pages" => "Laporan Penjualan",
            "laporanPenjualans" => $laporanPenjualans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sukuCadangs = SukuCadang::all();
        return view("laporanpenjualanfile.tambah",[
            "title" => "SPM || Tambah Laporan",
            "pages" => "Tambah Laporan",
            "sebelum" => "Laporan Penjualan",
            "linkPages" => "/laporanpenjualan",
            "sukuCadangs" => $sukuCadangs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaporanPenjualanRequest $request)
    {
        $jumlah = (int) $request->jumlah;
        $harga = (int) $request->harga;
        $validatedData = $request->validate([
            'nomor' => ['required','unique:laporan_pembelians'],
            'nama' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);
        $validatedData['jumlah']=$jumlah;
        $validatedData['harga']=$harga;
        $stock = SukuCadang::where('nomor',$request->nama)->get()->first()->stock - $jumlah;
        
        if ($stock<0) {
            return redirect('/laporankerusakan/tambah')->with('danger','Stock Kurang')->withInput();
        }

        SukuCadang::where('nomor',$request->nama)
                    ->update(['stock' => $stock]);
        
        LaporanPenjualan::create($validatedData);
        return redirect('/laporanpenjualan')->with('success','Data Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanPenjualan $laporanPenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanPenjualan $laporanPenjualan)
    {
        $sukuCadangs = SukuCadang::all();
        return view("laporanpenjualanfile.edit",[
            "title" => "SPM || Tambah Laporan",
            "pages" => "Tambah Laporan",
            "sebelum" => "Laporan Penjualan",
            "linkPages" => "/laporanpenjualan",
            "sukuCadangs" => $sukuCadangs,
            "laporanPenjualan" => $laporanPenjualan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporanPenjualanRequest $request, LaporanPenjualan $laporanPenjualan)
    {
        $checkPerubahan = false;
        $rules = [
            'nama' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'tanggal' => 'required',
        ];
        if ($request->nomor != $laporanPenjualan->nomor) {
            $rules['nomor'] = 'required|unique:laporan_kerusakans';
        }
        // 0 sedang dikerjakan 1 sudah diperbaiki
        $validatedData = $request->validate($rules);
        $validatedData['jumlah'] = (int) $request->input('jumlah');
        $validatedData['harga'] = (int) $request->input('harga');
        $stockAkhir=0;

        if ($request->jumlah != $laporanPenjualan->jumlah) {
            // jumlah nya tidak sama
            $checkPerubahan = true;
            $stocks = (int)$laporanPenjualan->jumlah-(int) $request->jumlah;
            $stockAwal = SukuCadang::where('nomor',$request->nama)->get()->first()->stock;
            $stockAkhir = $stockAwal+$stocks;
            // dd("Jumlah Beda, Status masih sedang diperbaiki",$laporanPenjualan->jumlah,$request->jumlah,$stocks,$stockAwal,$stockAkhir,$checkPerubahan);
        } elseif($request->jumlah == $laporanPenjualan->jumlah){
            // jumlah sama 
            // dd("Jumlah Sama, Status masih sedang diperbaiki",$laporanPenjualan->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
        }
        // dd("Lolos",$laporanPenjualan->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
        
        if ($checkPerubahan) {
            if ($stockAkhir<0) {
                return redirect('/laporankerusakan'.$laporanPenjualan->id.'/edit')->with('danger','Stock Kurang')->withInput();
            }
            SukuCadang::where('nomor',$request->nama)
                        ->update(['stock' => $stockAkhir]);
        }

        
        LaporanPenjualan::where('id',$laporanPenjualan->id)
                        ->update($validatedData);
        return redirect('/laporanpenjualan')->with('success','Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanPenjualan $laporanPenjualan)
    {
        $stocks = $laporanPenjualan->jumlah;
        $stockAkhir = SukuCadang::where('nomor',$laporanPenjualan->nama)->get()->first()->stock + $stocks;
        SukuCadang::where('nomor',$laporanPenjualan->nama)
                    ->update(['stock' => $stockAkhir]);
        
        LaporanPenjualan::destroy($laporanPenjualan->id);
        return redirect('/laporanpenjualan')->with('danger','Data Dihapus');
    }
}
