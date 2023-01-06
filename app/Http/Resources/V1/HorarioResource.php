<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class HorarioResource extends JsonResource
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
            'aula_id' => $this->nombre_aula,
            'tiempo_inicio' => $this->tiempo_inicio,
            'tiempo_final' => $this->tiempo_final,
            'fecha' => $this->fecha,
            'observacion' => $this->observacion,
        ];
    }
}
