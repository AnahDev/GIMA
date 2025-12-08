<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RepuestoUsado extends Model
{
    use HasFactory;

    protected $table = 'repuestos_usados';

    protected $fillable = [
        'sesion_id',
        'repuesto_id',
        'cantidad',
        'costo_total',
    ];

    //Relacion inversa con el modelo SesionesMantenimiento
    public function sesion(): BelongsTo
    {
        return $this->belongsTo(SesionesMantenimiento::class, 'sesion_id');
    }

    //Relacion inversa con el modelo Repuesto
    public function repuesto(): BelongsTo
    {
        return $this->belongsTo(Repuesto::class, 'repuesto_id');
    }
}
