<?php

namespace Database\Factories;

use App\Models\Partidagr;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PartidagrFactory extends Factory
{
    protected $model = Partidagr::class;

    public function definition()
    {
        return [
			'videojuego_id' => $this->faker->name,
			'equipo_id' => $this->faker->name,
			'tiempo_inicio' => $this->faker->name,
			'fecha' => $this->faker->name,
			'observacion' => $this->faker->name,
        ];
    }
}
