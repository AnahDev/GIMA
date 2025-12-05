<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Repuestos extends Model
{
    use HasFactory;
    protected $table = 'repuestos';
    protected $fillable = [
        'descripcion',
        'codigo',
        'stock',
        'stock_minimo',
        'costo',
        'proveedor_id',
        'direccion_id',
    ];

    protected $casts = [
        'stock' => 'decimal:2',
        'stock_minimo' => 'decimal:2',
        'costo' => 'decimal:2',
    ];

    
    //Relación con el modelo Proveedor
    public function proveedor(): BelongsTo
    {
        return $this->belongsTo('App\\Models\\Proveedor', 'proveedor_id');
    }

    
    //Relación con el modelo Direccion
    public function direccion(): BelongsTo
    {
        return $this->belongsTo('App\\Models\\Direccion', 'direccion_id');
    }
}
