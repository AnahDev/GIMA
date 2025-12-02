<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Auditoria extends Model
{

    protected $fillable = [
        'usuario_id',
        'entidad',
        'entidad_id',
        'accion',
        'descripcion',
        'fecha',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'fecha' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    public function usuario(): BelongsTo{
        return $this->belongsTo(User::class, 'usuario_id');
    }

}