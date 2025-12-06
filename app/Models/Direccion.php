<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    // 
    use HasFactory;

    protected $table = 'direcciones';

    protected $fillable = [
        'estado',
        'ciudad', 
        'sector', 
        'calle', 
        'sede'
    ]; 

    // Relaciones: 

    
    public function ubicaciones(): HasMany 
    {
 
        return $this->hasMany(Ubicacion::class, 'direccion_id');
        
    }

     public function repuestos(): HasMany 
    {
 
        return $this->hasMany(Repuesto::class, 'direccion_id');
        
    }
}
