<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    protected $fillable=[
        'nomor',
        'nama',
        'jabatan',
        'status',
        'dipekerjakan',
    ];

    public function laporanKerusakan(){
        return $this->hasMany(LaporanKerusakan::class, 'teknisi', 'nomor');
    }
}
