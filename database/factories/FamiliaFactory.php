<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Familia>
 */
class FamiliaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $fillable = ['nombre', 'base'];

    public function definition(): array
    {
        return [
            //
        ];
    }
}
