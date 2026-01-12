<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'usuario_id' => $this->usuario_id, // Quién recibe la notificación
            'contenido' => $this->contenido,   // El mensaje
            
            // Opcional: Si en el futuro cargas la relación 'usuario', aquí se mostrará.
            // Si no la cargas, esto no aparece y no da error.
            'usuario' => $this->whenLoaded('usuario'),

            // Fechas bonitas (Ej: 2026-01-11 20:30:00)
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toDateTimeString() : null,
        ];
    }
}