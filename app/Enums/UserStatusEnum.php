<?php

namespace App\Enums;

enum UserStatusEnum: string
{
    /*
    Para usarlo en donde lo necesiten deben de poner
    UserStatus::XXXXX     
    Ejemplo para asignar: $user->estado = UserStatus::INACTIVO;
    */ 
    case ACTIVO = 'activo';
    case INACTIVO = 'inactivo';
    case SUSPENDIDO = 'suspendido';

    // Etiquetas legibles para cada estado
    public function label(): string
    {
        return match($this) {
            self::ACTIVO => 'Activo',
            self::INACTIVO => 'Inactivo',
            self::SUSPENDIDO => 'Suspendido Temporalmente',
        };
    }
}
