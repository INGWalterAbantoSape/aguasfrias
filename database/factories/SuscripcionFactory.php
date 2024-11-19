<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\Suscripcion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suscripcion>
 */
class SuscripcionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Suscripcion::class;
    public function definition(): array
    {
        return [
            'cliente_id' => Cliente::factory(),
            'servicio_id' => Servicio::factory(),
            'fecha_inicio' => $this->faker->date,
            'fecha_fin' => $this->faker->optional()->date,
            'estado' => $this->faker->randomElement(['activa', 'inactiva', 'cancelada']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
