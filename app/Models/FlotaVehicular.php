<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlotaVehicular extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_vehiculo', 'marca', 'kilometraje', 'capacidad_pasajeros', 'placa', 'modelo', 'cilindraje', 'chasis', 'motor', 'capacidad_carga'];
}
