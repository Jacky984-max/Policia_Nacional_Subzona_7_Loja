<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected  $guarded = [
        'id',
        
        
    ];

    public function flota()
    {
        return $this->belongsTo(FlotaVehicular::class);
    }
}
