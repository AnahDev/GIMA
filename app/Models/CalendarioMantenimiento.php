<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Importar Enums 
use App\Enums\EstadoMantenimiento;
use App\Enums\TipoMantenimiento;
use App\Models\Activo;
use App\Models\User;

class CalendarioMantenimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'activo_id',
        'tecnico_asignado_id',    
        'tipo',                   // (Enum)
        'fecha_programada',
        'descripcion',            
        'estado',                // (Enum)
    ];

    /**
     * Casting de tipos para fechas y Enums
     */
    protected $casts = [
        'fecha_programada' => 'datetime',
        'tipo' => TipoMantenimiento::class,       // O 'string'
        'estado' => EstadoMantenimiento::class,   // O 'string'
    ];

    public function activo()
    {
        return $this->belongsTo(Activo::class, 'activo_id');
    }

    /**
     * Relación con el técnico (User)
     */
    public function tecnicoAsignado()
    {
        return $this->belongsTo(User::class, 'tecnico_asignado_id');
    }
}