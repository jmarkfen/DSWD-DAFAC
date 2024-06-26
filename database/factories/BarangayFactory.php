<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barangay>
 */
class BarangayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // location of the affected family
            'region' => fake()->word(),
            'province' => fake()->word(),
            'district' => fake()->word(),
            'municipality' => fake()->word(),
            'name' => fake()->word(),
        ];
    }
}
