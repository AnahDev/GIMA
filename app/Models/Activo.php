<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\EstadoActivo; 
use App\Models\Articulos;
use App\Models\Ubicacion; //Eduardo

class Activo extends Model
{
    use HasFactory;

    protected $fillable = [
        'articulo_id',
        'ubicacion_id',
        'estado',      
        'valor',       
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos o Enums.
     */
    protected $casts = [
        'estado' => EstadoActivo::class, 
        'valor' => 'float',
    ];

    public function articulo()
    {
        return $this->belongsTo(Articulos::class, 'articulo_id');
    }

    public function ubicacion()
    {
        return $this->belongsTo('App\\Models\\Ubicacion', 'ubicacion_id'); //eduardo
    }

    public function calendarioMantenimientos()
    {
        return $this->hasMany(CalendarioMantenimiento::class);
    }
}