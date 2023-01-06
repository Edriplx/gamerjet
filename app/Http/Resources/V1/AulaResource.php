<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AulaResource extends JsonResource
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
            'nombre_aula' => $this->nombre_aula,
            'edificio' => $this->edificio,
            'direccion' => $this->direccion,
            'observacion' => $this->observacion,
        ];
    }
}
