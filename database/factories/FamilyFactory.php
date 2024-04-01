<?php

namespace Database\Factories;

use App\Enums\HouseCondition;
use App\Enums\HouseOwnershipType;
use App\Enums\Gender;
use App\Models\Family;
use App\Models\FamilyMember;
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
        /** @var Gender */
        $gender = fake()->randomElement([Gender::MALE, Gender::FEMALE]);
        $str = strtolower($gender->value);

        return [
            'serial_number' => fake()->bothify('#####'),
            // 'region' => null,
            // 'province' => null,
            // 'district' => null,
            'barangay_id' => $this->randomOrNew(\App\Models\Barangay::class),
            // 'municipality' => null,
            'evacuation_site_id' => $this->randomOrNew(\App\Models\EvacuationSite::class),
            'head_last_name' => fake()->lastName($str),
            'head_first_name' => fake()->firstName($str),
            'head_middle_name' => fake()->lastName($str),
            'head_name_extension' => fake()->suffix(),
            'head_birthdate' => fake()->date(),
            'head_birthplace_id' => $this->randomOrNew(\App\Models\Birthplace::class),
            'head_gender' => $gender,
            'head_mother_maiden_name' => fake()->name('female'),
            'head_occupation_id' => $this->randomOrNew(\App\Models\Occupation::class),
            'head_monthly_family_net_income' => fake()->numberBetween(10000, 100000),
            'head_id_card_type_id' => $this->randomOrNew(\App\Models\IdCardType::class),
            'head_id_card_number' => fake()->bothify('##-###'),
            'head_primary_contact_number' => fake()->mobileNumber(),
            'head_alternate_contact_number' => fake()->mobileNumber(),
            'head_permanent_address' => fake()->address(),
            'head_is_4ps_beneficiary' => fake()->boolean(),
            'head_ip_ethnicity_id' => $this->randomOrNew(\App\Models\IpEthnicity::class),
            'house_ownership_type' => fake()->randomElement([
                HouseOwnershipType::OWNER,
                HouseOwnershipType::RENTER,
                HouseOwnershipType::SHARER,
            ]),
            'house_condition' => fake()->randomElement([
                HouseCondition::PARTIALLY_DAMAGED,
                HouseCondition::TOTALLY_DAMAGED,
            ]),
        ];
    }

    public function gender($gender): Factory
    {
        return $this->state(function () use ($gender) {
            $str = strtolower($gender);
            return [
                'head_last_name' => fake()->lastName($str),
                'head_first_name' => fake()->firstName($str),
                'head_middle_name' => fake()->lastName($str),
                'head_gender' => $gender,
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
