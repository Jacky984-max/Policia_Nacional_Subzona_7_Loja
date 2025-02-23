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

    // Relación con el mantenimiento
    public function mantenimiento()
    {
        return $this->belongsTo(Mantenimiento::class);
    }

    public function entregadoPor()
    {
        return $this->belongsTo(Personal_policial::class, 'personal_entrego_id');
    }

    public function recibidoPor()
    {
        return $this->belongsTo(Personal_policial::class, 'personal_recibio_id');
    }
    public function entregaVehiculo()
    {
        return $this->hasOne(EntregaVehiculo::class);
    }



    // Relación con el usuario (técnico que generó la orden)
    /*public function tecnico()
     {
         return $this->belongsTo(User::class, 'tecnico_id');
     }*/

     // 🔥 Relación con el Vehículo
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

      // 🔥 Relación con el Técnico Responsable
      public function tecnico()
      {
          return $this->belongsTo(User::class, 'tecnico_id');
      }
  
      // 🔥 Relación con el Personal Policial que solicitó el mantenimiento
      public function policiaSolicitante()
      {
          return $this->belongsTo(Personal_policial::class, 'policia_solicitante_id');
      }

       // 🔥 Relación con el Encargado de Logística
    public function encargadoLogistica()
    {
        return $this->belongsTo(User::class, 'encargado_logistica_id');
    }

    // 🔥 Relación con el Personal que Retira el Vehículo
    public function personalRetiro()
    {
        return $this->belongsTo(Personal_policial::class, 'personal_retiro_id');
    }


   

}
