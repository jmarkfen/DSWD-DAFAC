<?php

namespace Database\Factories;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FamilyMember>
 */
class FamilyMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dafac_id' => DafacFactory::new(),
            'name' => fake()->name(),
            'relation_to_head' => fake()->word(),
            'age' => fake()->numberBetween(0, 100),
            'sex' => fake()->randomElement(Gender::cases()),
            'educational_attainment' => fake()->word(),
            'occupational_skills' => fake()->word(),
            'remarks' => fake()->word(),
        ];
    }
}
