<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TipoArticulo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function materiales(): HasMany
    {
        return $this->hasMany(MaterialArticulos::class);
    }


}
