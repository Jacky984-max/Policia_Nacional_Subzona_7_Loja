<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_policial extends Model
{
    use HasFactory;

    protected  $guarded = [
        'id',
        
    ];

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }
}
