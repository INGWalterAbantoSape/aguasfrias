<?php

namespace Database\Factories;

use App\Models\Premio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Premio>
 */
class PremioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Premio::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'descripcion' => $this->faker->text(50),
            'puntos_requeridos' => $this->faker->randomNumber(2),
        ];
    }
}
