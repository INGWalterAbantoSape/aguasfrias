<?php

namespace Database\Factories;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servicio>
 */
class ServicioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Servicio::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'precio' => $this->faker->randomFloat(2, 100, 2000),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'tipo' => $this->faker->randomElement(['quincenal', 'mensual','anual']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
