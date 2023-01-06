<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class JugadoreResource extends JsonResource
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
            'nombre' => $this->nombre,
            'cedula' => $this->cedula,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'equipo_id' => $this->nombre_equipo,
            'observacion' => $this->observacion,
        ];
    }
}
