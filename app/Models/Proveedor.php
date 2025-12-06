<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    // 

     use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre', 
        'contacto', 
        'telefono', 
        'email'
    ]; 

    // Relaciones: 

     
    public function repuestos(): HasMany 
    {
 
        return $this->hasMany(Repuestos::class, 'proveedor_id');
        
    }
}
