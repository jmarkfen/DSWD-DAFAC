<?php

namespace Database\Factories;

use App\Enums\MaleOrFemale;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Family>
 */
class FamilyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /** @var MaleOrFemale */
        $gender = fake()->randomElement([MaleOrFemale::MALE, MaleOrFemale::FEMALE]);

        return [
            'serial_number' => fake()->bothify('#####'),
            // 'region' => null,
            // 'province' => null,
            // 'district' => null,
            // 'barangay' => null,
            // 'municipality' => null,
            // 'evacuation_site' => null,
            
            'head_last_name' => fake()->firstName($gender->getLower()),
            'head_first_name' => fake()->lastName($gender->getLower()),
            'head_middle_name' => fake()->lastName($gender->getLower()),
            'head_name_extension' => fake()->suffix(),
            'head_birthdate' => fake()->date(),
            // 'head_birthplace' => null,
            'head_sex' => $gender,
            'head_mother_maiden_name' => fake()->name('female'),
            // 'head_occupation' => null,
            'head_monthly_family_net_income' => fake()->randomNumber(),
            // 'head_id_type' => null,
            // 'head_id_number' => null,
            'head_primary_contact_number' => fake()->mobileNumber(),
            'head_alternate_contact_number' => fake()->randomElement([null, fake()->mobileNumber()]),
            'head_permanent_address' => fake()->address(),
            'head_is_4ps_beneficiary' => fake()->boolean(),
            // 'head_ip_ethnicity' => null,
            // 'house_ownership_type' => null,
            // 'house_condition' => null,
        ];
    }
}
