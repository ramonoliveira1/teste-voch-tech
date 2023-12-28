<?php

namespace Database\Factories;

use App\Models\Unidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colaborador>
 */
class ColaboradorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'unidade_id' => $this->faker->numberBetween(1, Unidade::count()),
                 'nome' => $this->faker->name,
                 'cpf' => $this->faker->unique()->numerify('###########'),
                 'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
