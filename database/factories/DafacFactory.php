<?php

namespace Database\Factories;

use App\Enums\Gender;
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
            'evacuation_site_id' => EvacuationSiteFactory::new(),
            // head of the family
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'name_extension' => fake()->suffix(),
            'birthdate' => fake()->date(),
            'birthplace_id' => BirthplaceFactory::new(),
            'sex' => fake()->randomElement(Gender::cases()),
            'mother_maiden_name' => fake()->word(),
            'occupation_id' => OccupationFactory::new(),
            'monthly_family_net_income' => fake()->numberBetween(),
            'id_card_type_id' => IdCardTypeFactory::new(),
            'id_card_number' => fake()->numerify(),
            'contact_number' => fake()->mobileNumber(),
            'permanent_address' => fake()->word(),
            'is_4ps_beneficiary' => fake()->boolean(),
            'is_ip' => true,
            'ethnicity_type_id' => EthnicityTypeFactory::new(),
            'members' => fake()->word(),
            'older_persons_count' => fake()->numberBetween(1, 9),
            'pregnant_and_lactating_mothers_count' => fake()->numberBetween(1, 9),
            'pwd_and_with_medical_conditions_count' => fake()->numberBetween(1, 9),
            'house_ownership' => fake()->word(),
            'housing_condition' => fake()->word(),
        ];
    }
}
