<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Mantenimientos; //Franklin

class ReporteMantenimiento extends Model
{
    protected $table = 'reporte_mantenimientos';

    protected $fillable = [
        'mantenimiento_id',
        'reporte_id'
    ];

    //Un reporte de mantenimiento pertenece a un equipo
    public function equipo()
    {
        return $this->belongsTo('App\\Models\\Mantenimiento'::class, 'id'); //Franklin
    }
}
