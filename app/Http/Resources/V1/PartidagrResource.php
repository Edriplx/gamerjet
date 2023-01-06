<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PartidagrResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'videojuego_id' => $this->nombre,
            'equipo_id' => $this->nombre_equipo,
            'tiempo_inicio' => $this->tiempo_inicio,
            'fecha' => $this->fecha,
            'observacion' => $this->observacion,
        ];
    }
}
