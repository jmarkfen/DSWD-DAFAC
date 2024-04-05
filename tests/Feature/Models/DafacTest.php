<?php

namespace Tests\Feature\Models;

use App\Models\Dafac;
use Database\Factories\DafacFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DafacTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @dataProvider dafacAttributesProvider
     * @testdox $_dataName is not null
     */
    public function test_attribute_not_null($attribute)
    {
        // arrange - create model
        $model = DafacFactory::new()->create();
        // act - retrieve model
        $value = Dafac::find($model->getKey())->$attribute;
        // assert - attribute is not null
        $this->assertNotNull($value);
    }

    public static function dafacAttributesProvider()
    {
        // * use $_dataName on @testdox to get key
        return [
            // location of the affected family
            'serial number' => ['serial_number'],
            'region' => ['region'],
            'province' => ['province'],
            'district' => ['district'],
            'barangay' => ['barangay'],
            'city/municipality' => ['municipality'],
            'evacuation center/site' => ['evacuation_site'],
            // head of the family
            'last name' => ['last_name'],
            'first name' => ['first_name'],
            'middle name' => ['middle_name'],
            'name extension' => ['name_extension'],
            'birthdate' => ['birthdate'],
            'age' => ['age'],
            'birthplace' => ['birthplace'],
            'sex' => ['sex'],
            'mother\'s maiden name' => ['mother_maiden_name'],
            'occupation' => ['occupation'],
            'monthly family net income' => ['monthly_family_net_income'],
            'ID card presented' => ['id_card_presented'],
            'ID card number' => ['id_card_number'],
            'contact number' => ['contact_number'],
            'permanent address' => ['permanent_address'],
            '4Ps beneficiary' => ['is_4ps_beneficiary'],
            'IP' => ['is_ip'],
            'type of ethnicity' => ['ethnicity_type'],
            'family members' => ['members'],
            'no. of older persons' => ['older_persons_count'],
            'no. of pregnant and lactating mothers' => ['pregnant_and_lactating_mothers_count'],
            'no. of pwds & with medical conditions' => ['pwd_and_with_medical_conditions_count'],
            'house ownership' => ['house_ownership'],
            'housing condition' => ['housing_condition'],
        ];
    }
}
