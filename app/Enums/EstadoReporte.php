<?php

namespace App\Enums;

enum EstadoReporte: string
{
    case ABIERTO = 'abierto';
    case ASIGNADO ='asignado';
    case EN_PROCESO ='en_progreso';
    case RESUELTO ='resuelto';
    case CERRADO ='cerrado';

    // Etiquetas legibles para cada estado
    public function label(): string
    {
        return match($this) {
            self::ABIERTO => 'Abierto',
            self::ASIGNADO => 'Asignado',
            self::EN_PROCESO => 'En Proceso',
            self::RESUELTO => 'Resuelto',
            self::CERRADO => 'Cerrado',
        };
    }
}
