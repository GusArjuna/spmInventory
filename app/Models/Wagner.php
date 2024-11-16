<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wagner extends Model
{
    protected $fillable=[
        'nomor',
        'ww',
        'periode1',
        'periode2',
        'periode3',
    ];

    public function sukuCadangs(){
        return $this->belongsTo(SukuCadang::class, 'nomor', 'nomor');
    }
}
