<?php

namespace App\Http\Controllers;

use App\Models\Wagner;
use App\Http\Requests\StoreWagnerRequest;
use App\Http\Requests\UpdateWagnerRequest;
use App\Models\LaporanPenjualan;
use App\Models\SukuCadang;
use Carbon\Carbon;

class WagnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Wagner::truncate();
        $dateNow = Carbon::now();
        $periode1 = $dateNow->copy()->subMonth(3);
        $periode2 = $dateNow->copy()->subMonth(2);
        $periode3 = $dateNow->copy()->subMonth(1);
        
        $laporanPenjualan1 = LaporanPenjualan::whereMonth('tanggal', $periode1->format('m'))->get();
        $laporanPenjualan2 = LaporanPenjualan::whereMonth('tanggal', $periode2->format('m'))->get();
        $laporanPenjualan3 = LaporanPenjualan::whereMonth('tanggal', $periode3->format('m'))->get();

        $demand = [];
        $matrixAlternative = [];
        $matrixBiaya = [];
        $matrixTotal = [];


        function hitungTotalPenjualan($laporanPenjualan) {           
            return $laporanPenjualan->groupBy('nama') 
                ->map(function ($item) {
                    $sukuCadang = SukuCadang::where('nomor',$item->first()->nama)->get()->first();
                    return [
                        $sukuCadang->nomor => $item->sum('jumlah')
                    ];
                })
                ->collapse();
        }

        $totalPenjualan1 = hitungTotalPenjualan($laporanPenjualan1);
        foreach ($totalPenjualan1 as $nomor => $jumlah) {
            Wagner::create([
                'nomor'=> $nomor,
                'periode1'=> $jumlah,
                'periode2'=> 0,
                'periode3'=> 0,
                'ww'=> 0,
            ]);
        }
        $totalPenjualan2 = hitungTotalPenjualan($laporanPenjualan2);
        foreach ($totalPenjualan2 as $nomor => $jumlah) {
            $wagner = Wagner::where('nomor',$nomor)->get()->first();
            if(isset($wagner)){
                Wagner::where('nomor',$nomor)->update([
                    'periode2'=> $jumlah,
                ]);
            }else{
                Wagner::create([
                    'nomor'=> $nomor,
                    'periode1'=> 0,
                    'periode2'=> $jumlah,
                    'periode3'=> 0,
                    'ww'=> 0,
                ]);
            }
        }
        $totalPenjualan3 = hitungTotalPenjualan($laporanPenjualan3);
        foreach ($totalPenjualan3 as $nomor => $jumlah) {
            $wagner = Wagner::where('nomor',$nomor)->get()->first();
            if(isset($wagner)){
                Wagner::where('nomor',$nomor)->update([
                    'periode3'=> $jumlah,
                ]);
            }else{
                Wagner::create([
                    'nomor'=> $nomor,
                    'periode1'=> 0,
                    'periode2'=> 0,
                    'periode3'=> $jumlah,
                    'ww'=> 0,
                ]);
            }
        }
        
        $wagnerDemands = Wagner::all();
        foreach ($wagnerDemands as $wagnerDemand) {
            $demand[$wagnerDemand->nomor][0] = $wagnerDemand->periode1;
            $demand[$wagnerDemand->nomor][1] = $wagnerDemand->periode2;
            $demand[$wagnerDemand->nomor][2] = $wagnerDemand->periode3;
            $demand[$wagnerDemand->nomor]['biayaPemesanan'] = $wagnerDemand->sukuCadangs->biayaPemesanan;
            $demand[$wagnerDemand->nomor]['holdingCosts'] = $wagnerDemand->sukuCadangs->holdingCosts;
            $demand[$wagnerDemand->nomor]['harga'] = $wagnerDemand->sukuCadangs->harga;
        }

        foreach ($demand as $key => $value) { 
            for ($i=0; $i < 3 ; $i++) { 
                for ($q=$i; $q < 3 ; $q++) { 
                    if($q==$i){
                        $matrixAlternative[$key][$i][$q]=$demand[$key][$i];
                    }else {
                        $matrixAlternative[$key][$i][$q]=$matrixAlternative[$key][$i][($q-1)]+$demand[$key][$q];
                    }
                }
            }
        }
        
        // foreach ($demand as $key => $value) { 
        //     for ($i=0; $i < 3 ; $i++) { 
        //         for ($q=$i; $q < 3 ; $q++) { 
        //             $hasil = 0;
        //             if($q==$i){
        //                 $matrixBiaya[$key][$i][$q]=$demand[$key]['biayaPemesanan']+$demand[$key]['holdingCosts']*( $matrixAlternative[$key][$i][$q]- $matrixAlternative[$key][$i][$q]);
        //             }else {
        //                 for ($b=$i; $b <=$q ; $b++) { 
        //                     $hasil += $matrixAlternative[$key][$i][$q]-$matrixAlternative[$key][$i][$b];
        //                 }
        //                 $matrixBiaya[$key][$i][$q]=$demand[$key]['biayaPemesanan']+$demand[$key]['holdingCosts']*$hasil;
        //             }
        //         }
        //     }
        // }

        foreach ($demand as $key => $value) { 
            for ($i=0; $i < 3 ; $i++) { 
                for ($q=$i; $q < 3 ; $q++) { 
                    $hasil = 0;

                    for ($a=$q; $a >= $i; $a--) { 
                        $hasil += ($matrixAlternative[$key][$i][$q]-$matrixAlternative[$key][$i][$a]);
                    }
                    // if($q==2){
                    //     dd($hasil);
                    // }
                    $matrixBiaya[$key][$i][$q] = $demand[$key]['biayaPemesanan']+$demand[$key]['holdingCosts']*$hasil;
                    // if($q==$i){
                    //     $matrixBiaya[$key][$i][$q]=$demand[$key]['biayaPemesanan']+$demand[$key]['holdingCosts']*( $matrixAlternative[$key][$i][$q]- $matrixAlternative[$key][$i][$q]);
                    // }else {
                    //     for ($b=$i; $b <=$q ; $b++) { 
                    //         $hasil += $matrixAlternative[$key][$i][$q]-$matrixAlternative[$key][$i][$b];
                    //     }
                    //     $matrixBiaya[$key][$i][$q]=$demand[$key]['biayaPemesanan']+$demand[$key]['holdingCosts']*$hasil;
                    // }
                }
            }
        }

        // dd($matrixBiaya);

        foreach ($demand as $key => $value) { 
            for ($i=0; $i < 3 ; $i++) { 
                $matrixTotal[$key]['minimum'][$i]=null;
                // for ($q=$i; $q < 3 ; $q++) { 
                //     if($i==0){
                //         $matrixTotal[$key][$i][$q]=$matrixBiaya[$key][$i][$q]+0;
                //     }else{
                //         $matrixTotal[$key][$i][$q]=$matrixBiaya[$key][$i][$q]+$matrixTotal[$key]['minimum'][$i-1];
                //     }
                // }
                for($a=$i; $a >= 0 ; $a--){
                    $value = $matrixBiaya[$key][$a][$i];
                    if ($matrixTotal[$key]['minimum'][$i] === null || $value < $matrixTotal[$key]['minimum'][$i]) {
                        $matrixTotal[$key]['minimum'][$i] = $value;
                    }
                }
            }
        }

        foreach ($matrixTotal as $key => $value) {
            // $totalBiayaMinimum[$key] = array_sum($matrixTotal[$key]['minimum']);
            $totalDemand[$key] = $demand[$key][0]+$demand[$key][1]+$demand[$key][2];
        }

        foreach ($wagnerDemands as $wagner) {
            $sukuCadang = SukuCadang::where('nomor',$wagner->nomor)->get()->first();
            $wagnerWithin = ($totalDemand[$wagner->nomor]*$sukuCadang->harga)+$matrixTotal[$wagner->nomor]['minimum'][2]+($totalDemand[$wagner->nomor]*$sukuCadang->holdingCosts);
            Wagner::where('nomor',$wagner->nomor)->update([
                'ww' => $wagnerWithin,
            ]);
        }
        // dd(SukuCadang::first(),$wagnerDemands,$demand,$matrixAlternative,$matrixBiaya,$matrixTotal,$totalDemand);    

        $wagners = Wagner::paginate(15);
        return view("wagnerfile.index",[
            "title" => "SPM || Algoritma Wagner Within",
            "pages" => "Algoritma Wagner Within",
            "wagners" => $wagners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWagnerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Wagner $wagner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wagner $wagner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWagnerRequest $request, Wagner $wagner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wagner $wagner)
    {
        //
    }
}
