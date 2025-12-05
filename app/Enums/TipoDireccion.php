<?php

namespace App\Enums;

enum TipoDireccion: string
{
    case PAIS = 'pais';
    case ESTADO = 'estado';
    case CIUDAD = 'ciudad';
    case SECTOR = 'sector';
    case CALLE = 'calle';
    case CAMPUS = 'campus';
    case EDIFICIO = 'edificio';
    case PISO = 'piso';
    case SALON = 'salon';

    // Etiquetas legibles para cada estado
    public function label(): string
    {
        return match($this) {
            self::PAIS => 'País',
            self::ESTADO => 'Estado',
            self::CIUDAD => 'Ciudad',
            self::SECTOR => 'Sector',
            self::CALLE => 'Calle',
            self::CAMPUS => 'Campus',
            self::EDIFICIO => 'Edificio',
            self::PISO => 'Piso',
            self::SALON => 'Salón',
        };
    }
}
