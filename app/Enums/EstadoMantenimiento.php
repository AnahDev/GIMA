<?php

namespace App\Enums;

enum EstadoMantenimiento : string
{
    case PENDIENTE = 'pendiente';
    case EN_PROCESO = 'en_proceso';
    case COMPLETADO = 'completado';
    case CANCELADO = 'cancelado';

    // Etiquetas legibles para cada estado
    public function label(): string
    {
        return match($this) {
            self::PENDIENTE => 'Pendiente',
            self::EN_PROCESO => 'En Proceso',
            self::COMPLETADO => 'Completado',
            self::CANCELADO => 'Cancelado'
        };
    }
}
