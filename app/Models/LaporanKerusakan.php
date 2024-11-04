<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LaporanKerusakan extends Model
{
    protected $fillable=[
        'nomor',
        'nama',
        'teknisi',
        'status',
        'tanggal',
        'jumlah',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($laporan) {
            $laporan->tanggalLapor = Carbon::today();
        });
    }

    public function alats(){
        return $this->belongsTo(Alat::class, 'nama', 'nomor');
    }
    public function teknisis(){
        return $this->belongsTo(Teknisi::class, 'teknisi', 'nomor');
    }
}
