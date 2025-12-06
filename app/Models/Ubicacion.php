<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    // 

    use HasFactory;

    protected $table = 'ubicaciones';

    protected $fillable = [
        'edificio',
        'piso', 
        'salon'
    ]; 

    // Relaciones: 

     
    public function activos(): HasMany 
    {
 
        return $this->hasMany(Activos::class, 'ubicacion_id');
        
    }

}
