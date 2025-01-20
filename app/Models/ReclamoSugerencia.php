<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReclamoSugerencia extends Model
{
    use HasFactory;

    protected $fillable = [

        'circuito',
        'sub_circuito',
        'tipo',
        'nombres',
        'apellidos',
        'contacto',
        'detalle',

    ];
}
