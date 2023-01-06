<?php

namespace Database\Factories;

use App\Models\Horario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HorarioFactory extends Factory
{
    protected $model = Horario::class;

    public function definition()
    {
        return [
			'videojuego_id' => $this->faker->name,
			'aula_id' => $this->faker->name,
			'tiempo_inicio' => $this->faker->name,
			'tiempo_final' => $this->faker->name,
			'fecha' => $this->faker->name,
			'observacion' => $this->faker->name,
        ];
    }
}
