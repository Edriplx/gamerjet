<?php

namespace Database\Factories;

use App\Models\Inscripcionin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InscripcioninFactory extends Factory
{
    protected $model = Inscripcionin::class;

    public function definition()
    {
        return [
			'videojuego_id' => $this->faker->name,
			'jugador_id' => $this->faker->name,
			'observacion' => $this->faker->name,
        ];
    }
}
