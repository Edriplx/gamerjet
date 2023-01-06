<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PartidainResource extends JsonResource
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
            'compania' => $this->compania,
            'jugador_id' => $this->nombre,
            'tiempo_inicio' => $this->tiempo_inicio,
            'fecha' => $this->fecha,
            'observacion' => $this->observacion,
        ];
    }
}
