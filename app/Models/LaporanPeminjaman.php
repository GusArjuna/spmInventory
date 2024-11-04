<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LaporanPeminjaman extends Model
{
    protected $fillable = [
        'nomor',
        'nama',
        'jumlah',
        'peminjam',
        'status',
        'tanggalKembali',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($laporan) {
            $laporan->tanggalPinjam = Carbon::today();
        });
    }

    public function alats(){
        return $this->belongsTo(Alat::class, 'nama', 'nomor');
    }
}
