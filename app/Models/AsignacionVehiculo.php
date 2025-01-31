<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionVehiculo extends Model
{
    use HasFactory;

    protected $table = 'asignacion_vehiculos';

    protected $fillable = [
        'vehiculo_id',
        'dependencia_id',
        'fecha_asignacion',
        'observacion',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'dependencia_id');
    }
}
