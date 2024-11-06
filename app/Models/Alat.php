<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $fillable=[
        'nomor',
        'nama',
        'jenis',
        'harga',
        'stock',
    ];
    
    public function sukuCadangs(){
        return $this->belongsTo(SukuCadang::class, 'jenis', 'nomor');
    }
    public function laporanPeminjaman(){
        return $this->hasMany(laporanPeminjaman::class, 'nama', 'nomor');
    }
    
    public function laporanKerusakan(){
        return $this->hasMany(laporanKerusakan::class, 'nama', 'nomor');
    }
}
