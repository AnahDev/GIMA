<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function activo()
    {
        return $this->belongsTo(Activo::class);
    }

    public function mantenimientos()
    {
        return $this->belongsToMany(
            Mantenimiento::class,
            'reportes_mantenimiento',
            'reporte_id',
            'mantenimiento_id'
        )->withTimestamps();
    }
}