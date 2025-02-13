<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $fillable = [
        'mantenimiento_id',
        'fecha_generacion',
        'detalle_mantenimiento',
        'estado',
    ];

    public function mantenimiento()
    {
        return $this->belongsTo(Mantenimiento::class);
    }
}
