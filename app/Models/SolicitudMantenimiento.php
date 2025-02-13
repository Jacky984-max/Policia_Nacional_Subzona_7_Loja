<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudMantenimiento extends Model
{
    use HasFactory;

    protected  $guarded = [
        'id',


    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'flotavehicular_id');
    }

    public function mantenimiento()
    {
        return $this->hasOne(Mantenimiento::class);
    }

    public function confirmadoPor()
    {
        return $this->belongsTo(User::class, 'confirmado_por');
    }

    public function personalPolicial()
    {
        return $this->belongsTo(Personal_policial::class, 'policia_id');
    }
}
