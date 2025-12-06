<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Mantenimiento; 
use App\Models\Reporte; 

class ReporteMantenimiento extends Model
{
    protected $table = 'reporte_mantenimientos';

    protected $fillable = [
        'mantenimiento_id',
        'reporte_id'
    ];

    //Un reporte de mantenimiento pertenece a un mantenimiento
    public function mantenimiento() : BelongsTo
    {
        return $this->belongsTo(Mantenimiento::class, 'mantenimiento_id');
    }
    //Un reporte de mantenimiento pertenece a un reporte
    public function reporte() : BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id'); 
    }

}
