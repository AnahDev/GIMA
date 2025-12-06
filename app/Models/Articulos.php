<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TipoArticulo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\MaterialArticulos;
use App\Models\Activo;

class Articulos extends Model
{
    use HasFactory;  
    
    protected $table = 'articulos'; 

    protected $fillable = [
        'tipo',
        'marca', 
        'modelo',
        'descripcion'
    ];

    protected $casts = [
        'tipo' => TipoArticulo::class,
    ];

    //Relación con el modelo MaterialArticulos
    public function materiales(): HasMany
    {
        return $this->hasMany(MaterialArticulos::class, 'articulo_id');
    }

    //Relación con el modelo Activo
    public function activos(): HasMany
    {
        return $this->hasMany(Activo::class, 'articulo_id');
    }
}
