<?php

namespace Database\Factories;

use App\Models\Pago;
use App\Models\Suscripcion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pago>
 */
class PagoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Pago::class;
    public function definition(): array
    {
        return [
            'suscripcion_id' => Suscripcion::factory(),
            'monto' => $this->faker->randomFloat(2, 10, 500),
            'fecha_pago' => $this->faker->date,
            'metodo_pago' => $this->faker->randomElement(['tarjeta', 'transferencia', 'efectivo']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
