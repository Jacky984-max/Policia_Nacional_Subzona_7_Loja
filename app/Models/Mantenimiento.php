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

    public function personal()
    {
        return $this->belongsTo(Personal_policial::class, 'solicitante_id');
    }
}
