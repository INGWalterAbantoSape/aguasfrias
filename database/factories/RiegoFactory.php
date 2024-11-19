<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Riego>
 */
class RiegoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sensor_valor' => $this->faker->randomNumber(2),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
        ];
    }
}
