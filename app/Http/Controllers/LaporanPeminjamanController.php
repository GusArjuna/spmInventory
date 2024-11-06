<?php

namespace App\Http\Controllers;

use App\Models\LaporanPeminjaman;
use App\Http\Requests\StoreLaporanPeminjamanRequest;
use App\Http\Requests\UpdateLaporanPeminjamanRequest;
use App\Models\Alat;

class LaporanPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporanPeminjamans = LaporanPeminjaman::paginate(15);
        return view("laporanpeminjamanfile.index",[
            "title" => "SPM || Laporan Peminjaman",
            "pages" => "Laporan Peminjaman",
            "laporanPeminjamans" => $laporanPeminjamans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alats = Alat::all();
        return view("laporanpeminjamanfile.tambah",[
            "title" => "SPM || Tambah Laporan",
            "pages" => "Tambah Laporan",
            "sebelum" => "Laporan Peminjaman",
            "linkPages" => "/laporanpeminjaman",
            "alats" => $alats,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaporanPeminjamanRequest $request)
    {
        $validatedData = $request->validate([
            'nomor' => ['required','unique:laporan_peminjamen'],
            'peminjam' => 'required',
            'jumlah' => 'required',
            'nama' => 'required',
            'tanggalKembali' => 'required',
        ]);
        $validatedData['status']=1;
        $stocks = (int) $request->jumlah;
        $stockAwal = Alat::where('nomor',$request->nama)->get()->first()->stock;
        $stockAkhir = $stockAwal-$stocks;
        if ($stockAkhir<0) {
            return redirect('/laporanpeminjaman/tambah')->with('danger','Stock Kurang')->withInput();
        }
        Alat::where('nomor',$request->nama)
                    ->update(['stock' => $stockAkhir]);
        
        LaporanPeminjaman::create($validatedData);
        return redirect('/laporanpeminjaman')->with('success','Data Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanPeminjaman $laporanPeminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanPeminjaman $laporanPeminjaman)
    {
        $alats = Alat::all();
        return view("laporanpeminjamanfile.edit",[
            "title" => "SPM || Edit Laporan",
            "pages" => "Edit Laporan",
            "sebelum" => "Laporan Peminjaman",
            "linkPages" => "/laporanpeminjaman",
            "alats" => $alats,
            "laporanPeminjaman" => $laporanPeminjaman,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporanPeminjamanRequest $request, LaporanPeminjaman $laporanPeminjaman)
    {
        $rules = [
            'peminjam' => 'required',
            'jumlah' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'tanggalPinjam' => 'required',
            'tanggalKembali' => 'required',
        ];
        if ($request->nomor != $laporanPeminjaman->nomor) {
            $rules['nomor'] = 'required|unique:laporan_peminjamen';
        }
        // 0 dikembalikan 1 dipinjam
        $validatedData = $request->validate($rules);
        $validatedData['status'] = (int) $request->input('status');
        $stockAkhir=0;
        $checkPerubahan = false;
        if ($laporanPeminjaman->status==0) {
            // Ketika status Awal adalah Sudah Diperbaiki
            if ($request->status==0) {
                // Status masih menjadi Sudah Diperbaiki
                if ($request->jumlah != $laporanPeminjaman->jumlah) {
                    // jumlah nya tidak sama
                    // dd("Jumlah Beda, Status Sama sudah diperbaiki",$laporanPeminjaman->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                } elseif($request->jumlah == $laporanPeminjaman->jumlah){
                    // jumlah sama 
                    // dd("Jumlah Sama, Status Sama Sudah Diperbaiki",$laporanPeminjaman->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                }
            } elseif($request->status==1) {
                // Status diubah Sedang Diperbaiki
                if ($request->jumlah != $laporanPeminjaman->jumlah) {
                    // jumlah nya tidak sama
                    $stockAkhir= Alat::where('nomor',$request->nama)->get()->first()->stock - (int)$request->jumlah;
                    $checkPerubahan = true;
                    // dd("Jumlah Beda, Status diubah menjadi sedang diperbaiki",$laporanPeminjaman->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                } elseif($request->jumlah == $laporanPeminjaman->jumlah){
                    $stockAkhir= Alat::where('nomor',$request->nama)->get()->first()->stock - (int)$request->jumlah;
                    $checkPerubahan = true;
                    // jumlah sama 
                    // dd("Jumlah Sama, Status diubah menjadi sedang diperbaiki",$laporanPeminjaman->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                }
            }
        } elseif($laporanPeminjaman->status==1) {
            // Ketika Status Awal Adalah Sedang Diperbaiki
            if ($request->status==0) {
                // Status diubah menjadi Sudah Diperbaiki
                if ($request->jumlah != $laporanPeminjaman->jumlah) {
                    // jumlah nya tidak sama
                    $checkPerubahan = true;
                    $stockAkhir= Alat::where('nomor',$request->nama)->get()->first()->stock + (int)$laporanPeminjaman->jumlah;
                    // dd("Jumlah Beda, Status diubah menjadi sudah diperbaiki",$laporanPeminjaman->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                } elseif($request->jumlah == $laporanPeminjaman->jumlah){
                    $checkPerubahan = true;
                    $stockAkhir= Alat::where('nomor',$request->nama)->get()->first()->stock + (int)$laporanPeminjaman->jumlah;
                    // jumlah sama 
                    // dd("Jumlah Sama, Status diubah menjadi sudah diperbaiki",$laporanPeminjaman->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                }
            } elseif($request->status==1) {
                // Status masih Sedang Diperbaiki
                if ($request->jumlah != $laporanPeminjaman->jumlah) {
                    // jumlah nya tidak sama
                    $checkPerubahan = true;
                    $stocks = (int)$laporanPeminjaman->jumlah-(int) $request->jumlah;
                    $stockAwal = Alat::where('nomor',$request->nama)->get()->first()->stock;
                    $stockAkhir = $stockAwal+$stocks;
                    // dd("Jumlah Beda, Status masih sedang diperbaiki",$laporanPeminjaman->jumlah,$request->jumlah,$stocks,$stockAwal,$stockAkhir,$checkPerubahan);
                } elseif($request->jumlah == $laporanPeminjaman->jumlah){
                    // jumlah sama 
                    // dd("Jumlah Sama, Status masih sedang diperbaiki",$laporanPeminjaman->jumlah,$request->jumlah,$stockAkhir,$checkPerubahan);
                }
            }
        }else{
            dd("EROR COY");
        }

        if ($checkPerubahan) {
            if ($stockAkhir<0) {
                return redirect('/laporanpeminjaman'.$laporanPeminjaman->id.'/edit')->with('danger','Stock Kurang')->withInput();
            }
            Alat::where('nomor',$request->nama)
                        ->update(['stock' => $stockAkhir]);
        }
        
        LaporanPeminjaman::where('id',$laporanPeminjaman->id)
                        ->update($validatedData);
        return redirect('/laporanpeminjaman')->with('success','Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanPeminjaman $laporanPeminjaman)
    {
        // 0 dikembalikan 1 dipinjam            
        if ($laporanPeminjaman->status==0) {
            //status sudah diperbaiki
            // dd("Status sudah diperbaiki");
        } elseif($laporanPeminjaman->status==1) {
            //status sedang diperbaiki
            // dd("Status sedang diperbaiki");
            $stocks = $laporanPeminjaman->jumlah;
            $stockAkhir = Alat::where('nomor',$laporanPeminjaman->nama)->get()->first()->stock + $stocks;
            Alat::where('nomor',$laporanPeminjaman->nama)
                        ->update(['stock' => $stockAkhir]);
        }

        LaporanPeminjaman::destroy($laporanPeminjaman->id);
        return redirect('/laporanpeminjaman')->with('danger','Data Dihapus');
    }
}
