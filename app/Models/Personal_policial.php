<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_policial extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula', 
        'nombres', 
        'apellidos', 
        'fecha_nacimiento',
        'tipo_sangre', 
        'ciudad_nacimiento', 
        'celular', 
        'rango',
        'dependencia_id',
    ];

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }
}
