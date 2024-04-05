<?php

namespace Tests\Feature\Models;

use App\Models\Occupation;
use Database\Factories\OccupationFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OccupationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @dataProvider dafacAttributesProvider
     * @testdox $_dataName is not null
     */
    public function test_attribute_not_null($attribute)
    {
        // arrange - create model
        $model = OccupationFactory::new()->create();
        // act - retrieve model
        $value = Occupation::find($model->getKey())->$attribute;
        // assert - attribute is not null
        $this->assertNotNull($value);
    }

    public static function dafacAttributesProvider()
    {
        // * use $_dataName on @testdox to get key
        return [
            'occupation' => ['name'],
        ];
    }
}
