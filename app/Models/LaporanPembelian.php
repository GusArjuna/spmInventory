<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LaporanPembelian extends Model
{
    protected $fillable = [
        'nomor',
        'nama',
        'jumlah',
        'tanggal',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($laporan) {
            $laporan->tanggal = Carbon::today();
        });
    }

    public function sukuCadangs(){
        return $this->belongsTo(SukuCadang::class, 'nama', 'nomor');
    }
}
