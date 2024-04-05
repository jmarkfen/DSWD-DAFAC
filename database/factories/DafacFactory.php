<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dafac>
 */
class DafacFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial_number' => fake()->word(),
            // location of the affected family
            'barangay_id' => BarangayFactory::new(),
            'evacuation_site' => fake()->word(),
            // head of the family
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'name_extension' => fake()->suffix(),
            'birthdate' => fake()->date(),
            'birthplace' => fake()->word(),
            'sex' => fake()->word(),
            'mother_maiden_name' => fake()->word(),
            'occupation' => fake()->word(),
            'monthly_family_net_income' => fake()->word(),
            'id_card_presented' => fake()->word(),
            'id_card_number' => fake()->numerify(),
            'contact_number' => fake()->mobileNumber(),
            'permanent_address' => fake()->word(),
            'is_4ps_beneficiary' => fake()->boolean(),
            'is_ip' => true,
            'ethnicity_type' => fake()->word(),
            'members' => fake()->word(),
            'older_persons_count' => fake()->numberBetween(1, 9),
            'pregnant_and_lactating_mothers_count' => fake()->numberBetween(1, 9),
            'pwd_and_with_medical_conditions_count' => fake()->numberBetween(1, 9),
            'house_ownership' => fake()->word(),
            'housing_condition' => fake()->word(),
        ];
    }
}
