<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SesionesMantenimiento extends Model
{
    use HasFactory;

    #protected $table = 'sesiones_mantenimiento';

    protected $fillable = [

        'id',
        'mantenimiento_id',
        'tecnico_id',
        'fecha',
        'horas_trabajadas',
        'observaciones',
        'descripcion_trabajo',
        'costo_hora',
        'created_at',
        'updated_at'
    ];

    //Una sesion de mantenimiento pertenece a un reporte de mantenimiento
    public function reporte(){

        return $this->belongsTo(Mantenimientos::class, 'reporte_mantenimiento_id');

    }

    //Una sesion de mantenimiento puede tener muchos repuestos usados
    public function respuestosUsados(){

        return $this->hasMany(respuestosUsados::class, 'sesion_mantenimiento_id');

    }

    public function tecnico(){

        return $this->belongsTo(Tecnico::class, 'tecnico_id');

    }
}
