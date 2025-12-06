<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Ubicacion;
use App\Models\Repuesto;

class Direccion extends Model
{
    protected $table = 'direcciones';

    protected $fillable = [
        'estado',
        'ciudad',
        'sector',
        'calle',
        'sede'
    ];

    
   //Relación con el modelo Ubicacion
    public function ubicaciones(): HasMany 
    {
        return $this->hasMany(Ubicacion::class, 'direccion_id');
    }

    //Relación con el modelo Repuesto
     public function repuestos(): HasMany 
    {
        return $this->hasMany(Repuesto::class, 'direccion_id');
    }
}
