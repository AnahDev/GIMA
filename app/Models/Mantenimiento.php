<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Activo;
use App\Models\User;
use App\Models\Reporte;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $table = 'mantenimientos';

    protected $fillable = [
        'activo_id',
        'supervisor_id',
        'tecnico_principal_id',
        'tipo',
        'fecha_apertura',
        'fecha_cierre',
        'estado',
        'descripcion',
        'validado',
        'costo_total',
    ];

    protected $casts = [
        'estado' => 'string',
        'tipo' => 'string',
        'fecha_apertura' => 'datetime',
        'fecha_cierre' => 'datetime',
        'validado' => 'boolean',
        'costo_total' => 'decimal:2',
    ];

    public function activo(): BelongsTo
    {
        return $this->belongsTo(Activo::class);
    }

    //Relación inversa con el modelo User como supervisor
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    //Relación inversa con el modelo User como técnico principal
    public function tecnicoPrincipal(): BelongsTo
    {
        return $this->belongsTo(User::class, 'tecnico_principal_id');
    }

    //Relación con el modelo SesionesMantenimiento
    public function sesiones(): HasMany
    {
        return $this->hasMany(SesionesMantenimiento::class);
    }

    // Nueva relación directa: Un mantenimiento tiene muchos reportes
    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }
}
