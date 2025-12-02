<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\TipoMaterial;

class MaterialArticulos extends Model
{
    #protected $table = 'material_articulos';

    protected $fillable = [
        'articulo_id',
        'tipo',
        'titulo',
        'descripcion',
        'url',
        'fecha_subida'
    ];

    protected $casts = [
        'tipo' => TipoMaterial::class,
        'fecha_subida' => 'date_time',
    ];

    //Relación con el modelo Articulo
    public function articulo(): BelongsTo
    {
        return $this->belongsTo(Articulos::class);
    }
    
}
