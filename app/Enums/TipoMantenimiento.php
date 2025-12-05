<?php

namespace App\Enums;

enum TipoMantenimiento: string
{
    case CORRECTIVO = 'correctivo';
    case PREDICTIVO = 'predictivo';
    case PREVENTIVO = 'preventivo';

    // Etiquetas legibles para cada estado
    public function label(): string
    {
        return match($this) {
            self::CORRECTIVO => 'Correctivo',
            self::PREDICTIVO => 'Predictivo',
            self::PREVENTIVO => 'Preventivo',
        };
    }
}
