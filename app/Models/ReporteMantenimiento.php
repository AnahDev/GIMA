<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteMantenimiento extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'reportes_mantenimiento';

    public function reporte()
    {
        return $this->belongsTo(Reporte::class);
    }

    public function mantenimiento()
    {
        return $this->belongsTo(Mantenimiento::class);
    }
}