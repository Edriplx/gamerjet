<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class VideojuegoResource extends JsonResource
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
            'nombre_categoria' => $this->tipo,
            'nombre' => $this->nombre,
            'compania' => $this->compania,
            'precio' => $this->precio,
            'decripcion' => $this->decripcion,
        ];
    }
}
