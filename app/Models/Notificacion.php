<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Notificacion extends Model
{
    
    protected $fillable = [
        'usuario_id',
        'contenido',
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function usuario(): BelongsTo{
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
