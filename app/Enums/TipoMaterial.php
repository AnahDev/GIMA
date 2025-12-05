<?php

namespace App\Enums;

enum TipoMaterial: string
{
    case DATASHEET = 'datasheet';
    case MANUAL = 'manual';
    case ENLACE = 'enlace';

    // Etiquetas legibles para cada estado
    public function label(): string
    {
        return match($this) {
            self::DATASHEET => 'datasheet',
            self::MANUAL => 'manual',
            self::ENLACE => 'enlace'
        };
    }
}
