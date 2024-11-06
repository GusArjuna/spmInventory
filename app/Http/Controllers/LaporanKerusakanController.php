<?php

namespace App\Http\Controllers;

use App\Models\LaporanKerusakan;
use App\Http\Requests\StoreLaporanKerusakanRequest;
use App\Http\Requests\UpdateLaporanKerusakanRequest;
use App\Models\Alat;
use App\Models\Teknisi;

class LaporanKerusakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporanKerusakans = LaporanKerusakan::paginate(15);
        return view("laporankerusakanfile.index",[
            "title" => "SPM || Laporan Kerusakan",
            "pages" => "Laporan Kerusakan",
            "laporanKerusakans" => $laporanKerusakans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alats = Alat::all();
        $teknisis = Teknisi::all();
        return view("laporankerusakanfile.tambah",[
            "title" => "SPM || Tambah Laporan",
            "pages" => "Tambah Laporan",
            "sebelum" => "Laporan Kerusakan",
            "linkPages" => "/laporankerusakan",
            "alats" => $alats,
            "teknisis" => $teknisis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaporanKerusakanRequest $request)
    {
        $validatedData = $request->validate([
            'nomor' => ['required','unique:laporan_kerusakans'],
            'teknisi' => 'required',
            'jumlah' => 'required',
            'nama' => 'required',
        ]);

        $validatedData['status']=0;
        $stocks = (int) $request->jumlah;
        $stockAwal = Alat::where('nomor',$request->nama)->get()->first()->stock;
        $stockAkhir = $stockAwal-$stocks;
        if ($stockAkhir<0) {
            return redirect('/laporankerusakan/tambah')->with('danger','Stock Kurang')->withInput();
        }
        Alat::where('nomor',$request->nama)
                    ->update(['stock' => $stockAkhir]);
        
        LaporanKerusakan::create($validatedData);
        return redirect('/laporankerusakan')->with('success','Data Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanKerusakan $laporanKerusakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanKerusakan $laporanKerusakan)
    {
        $alats = Alat::all();
        $teknisis = Teknisi::all();
        return view("laporankerusakanfile.edit",[
            "title" => "SPM || Edit Laporan",
            "pages" => "Edit Laporan",
            "sebelum" => "Laporan Kerusakan",
            "linkPages" => "/laporankerusakan",
            "alats" => $alats,
            "teknisis" => $teknisis,
            "laporanKerusakan" => $laporanKerusakan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporanKerusakanRequest $request, LaporanKerusakan $laporanKerusakan)
    {
        $checkPerubahan = false;
        $rules = [
            'teknisi' => 'required',
            'jumlah' => 'required',
            'tanggalLapor' => 'required',
            'status' => 'required',
            'nama' => 'required',
        ];
        if ($request->nomor != $laporanKerusakan->nomor) {
            $rules['nomor'] = 'required|unique:laporan_kerusakans';
        }
        // 0 sedang dikerjakan 1 sudah diperbaiki
        $validatedData = $request->validate($rules);
        $validatedData['status'] = (int) $request->input('status');
        $stockAkhir=0;

        if ($laporanKerusakan->status==1) {
            // Ketika status Awal adalah Sudah Diperbaiki
            if ($request->status==1) {
                // Status masih menjadi Sudah Diperbaiki
                if ($request->jumlah != $laporanKerusakan->jumlah) {
                    // jumlah nya tidak sama
                    // dd("Jumlah Beda, Status Sama sudah diperbaiki",$laporanKerusakan->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                } elseif($request->jumlah == $laporanKerusakan->jumlah){
                    // jumlah sama 
                    // dd("Jumlah Sama, Status Sama Sudah Diperbaiki",$laporanKerusakan->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                }
            } elseif($request->status==0) {
                // Status diubah Sedang Diperbaiki
                if ($request->jumlah != $laporanKerusakan->jumlah) {
                    // jumlah nya tidak sama
                    $stockAkhir= Alat::where('nomor',$request->nama)->get()->first()->stock - (int)$request->jumlah;
                    $checkPerubahan = true;
                    // dd("Jumlah Beda, Status diubah menjadi sedang diperbaiki",$laporanKerusakan->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                } elseif($request->jumlah == $laporanKerusakan->jumlah){
                    $stockAkhir= Alat::where('nomor',$request->nama)->get()->first()->stock - (int)$request->jumlah;
                    $checkPerubahan = true;
                    // jumlah sama 
                    // dd("Jumlah Sama, Status diubah menjadi sedang diperbaiki",$laporanKerusakan->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                }
            }
        } elseif($laporanKerusakan->status==0) {
            // Ketika Status Awal Adalah Sedang Diperbaiki
            if ($request->status==1) {
                // Status diubah menjadi Sudah Diperbaiki
                if ($request->jumlah != $laporanKerusakan->jumlah) {
                    // jumlah nya tidak sama
                    $checkPerubahan = true;
                    $stockAkhir= Alat::where('nomor',$request->nama)->get()->first()->stock + (int)$laporanKerusakan->jumlah;
                    // dd("Jumlah Beda, Status diubah menjadi sudah diperbaiki",$laporanKerusakan->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                } elseif($request->jumlah == $laporanKerusakan->jumlah){
                    $checkPerubahan = true;
                    $stockAkhir= Alat::where('nomor',$request->nama)->get()->first()->stock + (int)$laporanKerusakan->jumlah;
                    // jumlah sama 
                    // dd("Jumlah Sama, Status diubah menjadi sudah diperbaiki",$laporanKerusakan->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                }
            } elseif($request->status==0) {
                // Status masih Sedang Diperbaiki
                if ($request->jumlah != $laporanKerusakan->jumlah) {
                    // jumlah nya tidak sama
                    $checkPerubahan = true;
                    $stocks = (int)$laporanKerusakan->jumlah-(int) $request->jumlah;
                    $stockAwal = Alat::where('nomor',$request->nama)->get()->first()->stock;
                    $stockAkhir = $stockAwal+$stocks;
                    // dd("Jumlah Beda, Status masih sedang diperbaiki",$laporanKerusakan->jumlah,$request->jumlah,$stocks,$stockAwal,$stockAkhir,$checkPerubahan);
                } elseif($request->jumlah == $laporanKerusakan->jumlah){
                    // jumlah sama 
                    // dd("Jumlah Sama, Status masih sedang diperbaiki",$laporanKerusakan->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                }
            }
        }else{
            dd("EROR COY");
        }
        
        if ($checkPerubahan) {
            if ($stockAkhir<0) {
                return redirect('/laporankerusakan'.$laporanKerusakan->id.'/edit')->with('danger','Stock Kurang')->withInput();
            }
            Alat::where('nomor',$request->nama)
                        ->update(['stock' => $stockAkhir]);
        }

        
        LaporanKerusakan::where('id',$laporanKerusakan->id)
                        ->update($validatedData);
        return redirect('/laporankerusakan')->with('success','Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanKerusakan $laporanKerusakan)
    {
        // 0 sedang dikerjakan 1 sudah diperbaiki

        if ($laporanKerusakan->status==1) {
            //status sudah diperbaiki
            // dd("Status sudah diperbaiki");
        } elseif($laporanKerusakan->status==0) {
            //status sedang diperbaiki
            // dd("Status sedang diperbaiki");
            $stocks = $laporanKerusakan->jumlah;
            $stockAkhir = Alat::where('nomor',$laporanKerusakan->nama)->get()->first()->stock + $stocks;
            Alat::where('nomor',$laporanKerusakan->nama)
                        ->update(['stock' => $stockAkhir]);
        }
        
        LaporanKerusakan::destroy($laporanKerusakan->id);
        return redirect('/laporankerusakan')->with('danger','Data Dihapus');
    }
}
