<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Objeto>
 */
class ObjetoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'denominacion' => $this->faker->word(1),  // Generates a two-word phrase
            'descripcion' => $this->faker->sentence(2),  // Generates an abstract image URL
            'stock' => $this->faker->numberBetween(1, 10),  // Random quantity between 1 and 10
            'valor' => $this->faker->randomDigitNotZero(2, 1, 100), // Price between 1.00 and 100.00
        ];
    }
}
