<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_policial extends Model
{
    use HasFactory;

    protected $fillable = ['cedula', 'nombres', 'apellidos', 'tipo_sangre', 'ciudad_nacimiento', 'celular', 'rango'];
}
