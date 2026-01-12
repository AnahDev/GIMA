<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialArticuloResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'articulo_id' => $this->articulo_id,
            'tipo' => $this->tipo, // Al ser Enum, Laravel lo serializa automático
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'url' => $this->url,
            // Formateamos la fecha si existe
            'fecha_subida' => $this->fecha_subida ? $this->fecha_subida->format('Y-m-d H:i:s') : null,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}