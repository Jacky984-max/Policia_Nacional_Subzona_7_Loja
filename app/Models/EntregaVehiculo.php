<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaVehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'orden_trabajo_id',
        'fecha_entrega',
        'personal_recibio_id',
        'kilometraje_actual',
        'kilometraje_proximo_mantenimiento',
        'observaciones'
    ];

    public function ordenTrabajo()
    {
        return $this->belongsTo(OrdenTrabajo::class);
    }

  

    public function recibidoPor()
    {
        return $this->belongsTo(Personal_policial::class, 'personal_recibio_id');
    }
}
