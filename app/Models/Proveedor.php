<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Repuesto;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'nombre', 
        'contacto', 
        'telefono', 
        'email'
    ]; 

    //Relación con el modelo Repuesto
    public function repuestos(): HasMany 
    {
        return $this->hasMany(Repuesto::class, 'proveedor_id');
    }
}
