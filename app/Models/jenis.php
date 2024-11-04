<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    
    protected $fillable=[
        'nomor',
        'jenis',
    ];

    public function sukuCadang(){
        return $this->hasMany(SukuCadang::class, 'jenis', 'nomor');
    }

    public function alat(){
        return $this->hasMany(Alat::class, 'jenis', 'nomor');
    }
}
