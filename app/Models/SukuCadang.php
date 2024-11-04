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
        'stock',
    ];
    
    public function jeniss(){
        return $this->belongsTo(Jenis::class, 'jenis', 'nomor');
    }
}
