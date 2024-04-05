<?php

namespace Tests\Feature\Models;

use App\Models\EthnicityType;
use Database\Factories\EthnicityTypeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EthnicityTypeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @dataProvider dafacAttributesProvider
     * @testdox $_dataName is not null
     */
    public function test_attribute_not_null($attribute)
    {
        // arrange - create model
        $model = EthnicityTypeFactory::new()->create();
        // act - retrieve model
        $value = EthnicityType::find($model->getKey())->$attribute;
        // assert - attribute is not null
        $this->assertNotNull($value);
    }

    public static function dafacAttributesProvider()
    {
        // * use $_dataName on @testdox to get key
        return [
            'type of ethnicity' => ['name'],
        ];
    }
}
