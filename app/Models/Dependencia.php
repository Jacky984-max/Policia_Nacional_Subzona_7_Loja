<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;
    protected $fillable = [

        'provincia',
        'cod_distrito',
        'cod_circuito',
        'cod_sub_circuito',
        'numero_distrito',
        'nombre_distrito',
        'nombre_circuito',
        'nombre_sub_circuito',
        'parroquia',
        'numero_circuito',
        'numero_sub_circuito',

    ];
}
