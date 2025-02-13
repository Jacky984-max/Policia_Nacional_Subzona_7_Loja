<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected  $guarded = [
        'id',

    ];

    public function personal()
    {
        return $this->belongsTo(Personal_policial::class);
    }

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class);
    }

    public function personalPolicial()
    {
        return $this->belongsTo(Personal_policial::class, 'personal_id');
    }
}
