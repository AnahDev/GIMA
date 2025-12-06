<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function activo()
    {
        return $this->belongsTo(Activo::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function tecnicoPrincipal()
    {
        return $this->belongsTo(User::class, 'tecnico_principal_id');
    }

    public function sesiones()
    {
        return $this->hasMany(SesionMantenimiento::class);
    }

    public function reportes()
    {
        return $this->belongsToMany(
            Reporte::class,
            'reportes_mantenimiento',
            'mantenimiento_id',
            'reporte_id'
        )->withTimestamps();
    }
}