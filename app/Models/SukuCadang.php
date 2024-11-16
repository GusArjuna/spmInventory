<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SukuCadang extends Model
{
    protected $fillable=[
        'nomor',
        'nama',
        'jenis',
        'harga',
        'holdingCosts',
        'biayaPemesanan',
        'stock',
    ];
    
    public function alats(){
        return $this->belongsTo(Alat::class, 'jenis', 'nomor');
    }
    public function penjualans(){
        return $this->hasMany(LaporanPenjualan::class, 'nama', 'nomor');
    }
    public function wagners(){
        return $this->hasMany(Wagner::class, 'nomor', 'nomor');
    }
}
