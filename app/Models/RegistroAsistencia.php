<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroAsistencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'personal_policial_id',
        'fecha',
        'hora_entrada',
        'hora_salida',
       
    ];

    public function personalPolicial()
    {
        return $this->belongsTo(Personal_policial::class, 'personal_policial_id');
    }
}
