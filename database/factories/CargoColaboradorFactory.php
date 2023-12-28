<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\Colaborador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CargoColaborador>
 */
class CargoColaboradorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cargo_id' => Cargo::factory(),
            'colaborador_id' => Colaborador::factory(),
            'nota_desempenho' => $this->faker->numberBetween(0, 10),
        ];
    }
}
