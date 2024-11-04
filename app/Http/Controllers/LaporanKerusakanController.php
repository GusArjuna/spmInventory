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
        if ($request->jumlah != $laporanKerusakan->jumlah) {
            if ($laporanKerusakan->status==1) {
                if ($request->status==0) {
                    $stockAkhir= Alat::where('nomor',$request->nama)->get()->first()->stock - (int)$request->jumlah;
                    // dd("JUMLAH Beda Dikembalikan dipinjam lagi",$stockAkhir);
                }
            }else{
                $stocks = (int)$laporanKerusakan->jumlah-(int) $request->jumlah;
                $stockAwal = Alat::where('nomor',$request->nama)->get()->first()->stock;
                $stockAkhir = $stockAwal+$stocks;
                if ($request->status==1) {
                    $stockAkhir= Alat::where('nomor',$request->nama)->get()->first()->stock + (int)$laporanKerusakan->jumlah;
                    // dd("JUMLAH BEDA tapi Dikembalikan",$stocks,$stockAwal,$stockAkhir);//done
                }
                // dd("JUMLAH BEDA ",$stocks,$stockAwal,$stockAkhir);//done
            }
        }
        if ($laporanKerusakan->status==1) {
            if ($request->status==0) {
                $stockAkhir= Alat::where('nomor',$request->nama)->get()->first()->stock - (int)$request->jumlah;
                // dd("JUMLAH Sama Dikembalikan dipinjam lagi",$stockAkhir);
            }
        }       
        if ($laporanKerusakan->status==0) {
            $stockAkhir= Alat::where('nomor',$request->nama)->get()->first()->stock + (int)$request->jumlah;
            // dd("JUMLAH Sama tapi Dikembalikan",$stockAkhir);//done
        }       
        if ($stockAkhir<0) {
            return redirect('/laporankerusakan'.$laporanKerusakan->id.'/edit')->with('danger','Stock Kurang')->withInput();
        }
        // dd($stockAkhir);
        Alat::where('nomor',$request->nama)
                    ->update(['stock' => $stockAkhir]);
        
        LaporanKerusakan::where('id',$laporanKerusakan->id)
                        ->update($validatedData);
        return redirect('/laporankerusakan')->with('success','Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanKerusakan $laporanKerusakan)
    {
        $stocks = $laporanKerusakan->jumlah;
        $stockAkhir = Alat::where('nomor',$laporanKerusakan->nama)->get()->first()->stock + $stocks;
        Alat::where('nomor',$laporanKerusakan->nama)
                    ->update(['stock' => $stockAkhir]);
        LaporanKerusakan::destroy($laporanKerusakan->id);
        return redirect('/laporankerusakan')->with('danger','Data Dihapus');
    }
}
