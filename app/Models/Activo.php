<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Asegúrate de importar el Enum si ya fue creado por el equipo, 
// si no, puedes dejarlo comentado o usar 'string' temporalmente.
use App\Enums\EstadoActivo; 

class Activo extends Model
{
    use HasFactory;

    protected $fillable = [
        'articulo_id',
        'ubicacion_id',
        'estado',      // Agregado según diagrama
        'valor',       // Agregado según diagrama
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos o Enums.
     */
    protected $casts = [
        'estado' => EstadoActivo::class, // O 'string' si aún no tienes el Enum
        'valor' => 'float',
    ];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    public function calendarioMantenimientos()
    {
        return $this->hasMany(CalendarioMantenimiento::class);
    }
}