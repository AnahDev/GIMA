<?php

namespace App\Enums;

enum NivelPrioridad: string
{
    case ALTA = 'alta';
    case MEDIA ='media';
    case BAJA ='baja';

    // Etiquetas legibles para cada estado
    public function label(): string
    {
        return match($this) {
            self::ALTA => 'Alta',
            self::MEDIA => 'Media',
            self::BAJA => 'Baja',
        };
    }
}
