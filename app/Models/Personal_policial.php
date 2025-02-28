<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_policial extends Model
{
    use HasFactory;

    protected  $guarded = [
        'id',
        
    ];

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function solicitudesMantenimiento()
    {
        return $this->hasMany(SolicitudMantenimiento::class, 'policia_id');
    }


    public static function generarCodigo()
    {
        $ultimoID = self::max('id') + 1;
        return 'POL' . str_pad($ultimoID, 3, '0', STR_PAD_LEFT);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($policia) {
            $policia->codigo_personal = self::generarCodigo();
        });
    }
}
