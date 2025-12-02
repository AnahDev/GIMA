<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Role;
use App\Models\Notificacion;
use App\Models\Auditoria;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;   //=========Para crear los roles con Spatie============
    use HasApiTokens; //=========Para usar tokens Sanctum============

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'telefono',
        'estado',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function roles(): BelongsToMany{
        return $this->belongsToMany(Role::class);
    }

    public function notificaciones(): HasMany{
        return $this->hasMany(Notificacion::class, 'usuario_id');
    }

    public function auditorias(): HasMany{
        return $this->hasMany(Auditoria::class, 'usuario_id');
    }
}
