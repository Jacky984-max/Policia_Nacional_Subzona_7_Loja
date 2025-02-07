<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'solicitud_id',
        'fecha_ingreso',
        'kilometraje',
        'tipo_vehiculo',
        'placa', 
        'marca',
        'modelo',
        'asunto',
        'detalle',
        'estado',
        'tipo_mantenimiento',
        'subtotal',
        'iva',
        'total',

    ];

    public function solicitud()
    {
        return $this->belongsTo(SolicitudMantenimiento::class);
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }


}
