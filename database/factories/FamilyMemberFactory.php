<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Models\Family;
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
        /** @var Gender */
        $gender = fake()->randomElement([Gender::MALE, Gender::FEMALE]);
        $str = strtolower($gender->value);
        return [
            'family_id' => $this->randomOrNew(Family::class, 0.1),
            'family_member' => fake()->name($str),
            'relation_to_head' => fake()->word(),
            'birthdate' => fake()->date(),
            'gender' => $gender,
            'educational_attainment' => fake()->word(),
            'occupational_skills' => fake()->word(),
            'remarks' => fake()->word(),
        ];
    }

    public function gender($gender): Factory
    {
        return $this->state(function () use ($gender) {
            $str = strtolower($gender);
            return [
                'family_member' => fake()->name($str),
                'gender' => $gender,
            ];
        });
    }

    /** pick a random existing model or a create a new one
     * 
     * @param string $class model class
     * @param int|float $weight A probability between 0 and 1, 0 means that we always get an existing model.
     */
    public function randomOrNew($class, $weight = 0.3)
    {
        return fake()->optional(
            weight: $weight,
            default: $class::inRandomOrder()->limit(1)->first()
        )->passthrough($class::factory()) ?? $class::factory();
    }
}
