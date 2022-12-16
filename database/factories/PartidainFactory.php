<?php

namespace Database\Factories;

use App\Models\Partidain;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PartidainFactory extends Factory
{
    protected $model = Partidain::class;

    public function definition()
    {
        return [
			'videojuego_id' => $this->faker->name,
			'jugador_id' => $this->faker->name,
			'tiempo_inicio' => $this->faker->name,
			'fecha' => $this->faker->name,
			'observacion' => $this->faker->name,
        ];
    }
}
