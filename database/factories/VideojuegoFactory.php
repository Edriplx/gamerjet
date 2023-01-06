<?php

namespace Database\Factories;

use App\Models\Videojuego;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VideojuegoFactory extends Factory
{
    protected $model = Videojuego::class;

    public function definition()
    {
        return [
			'categoria_id' => $this->faker->name,
			'nombre' => $this->faker->name,
			'compania' => $this->faker->name,
			'precio' => $this->faker->name,
			'decripcion' => $this->faker->name,
        ];
    }
}
