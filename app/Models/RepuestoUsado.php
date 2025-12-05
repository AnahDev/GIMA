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
        'id',
        'sesion_id',
        'repuesto_id',
        'cantidad',
        'costo_total',
        'created_at',
        'updated_at'
    ];

    //Un repuesto usado pertenece a una sesion de mantenimiento
    public function sesion(){

        return $this->belongsTo(SesionesMantenimiento::class, 'sesion_mantenimiento_id');

    }    

    public function repuesto(){

        return $this->belongsTo(Repuesto::class, 'repuesto_id');

    }
}
