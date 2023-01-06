<?php

namespace Database\Factories;

use App\Models\Inscripciongr;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InscripciongrFactory extends Factory
{
    protected $model = Inscripciongr::class;

    public function definition()
    {
        return [
			'videojuego_id' => $this->faker->name,
			'equipo_id' => $this->faker->name,
			'observacion' => $this->faker->name,
        ];
    }
}
