<?php

namespace App\Enums;

enum EstadoActivo : string
{
    case OPERATIVO = 'operativo';
    case MANTENIMiENTO = 'mantenimiento';
    case FUERA_SERVICIO = 'fuera_servicio';
    case BAJA = 'baja';

    // Etiquetas legibles para cada estado
    public function label(): string
    {
        return match($this) {
            self::OPERATIVO => 'Operativo',
            self::MANTENIMiENTO => 'En mantenimiento',
            self::FUERA_SERVICIO => 'Fuera de Servicio',
            self::BAJA => 'Dado de baja'
        };
    }
}
