<?php

namespace Database\Factories;

use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consulta>
 */
class ConsultaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data' => $this->faker->dateTimeInInterval('-1 year', '+1 year'), // Data entre 1 ano atrás até hoje
            'medico_id' => Medico::inRandomOrder()->first()->id,
            'paciente_id' => Paciente::inRandomOrder()->first()->id,
        ];
    }
}
