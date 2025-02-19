<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReclamoSugerencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'nombres',
        'apellidos',
        'contacto',
        'detalle',
        'dependencia_id',
        'nombre_circuito',
        'nombre_sub_circuito'
    ];

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'dependencia_id');
    }
}
