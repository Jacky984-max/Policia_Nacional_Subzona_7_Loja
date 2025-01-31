<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionPersonal extends Model
{
    use HasFactory;

    protected $table = 'asignacion_personals';

    protected $fillable = [
        'personal_id',
        'dependencia_id',
        'fecha_asignacion',
        'observacion',
    ];

    public function personal()
    {
        return $this->belongsTo(Personal_policial::class, 'personal_id');
    }

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'dependencia_id');
    }
}
