<?php

namespace Tests\Feature\Models;

use App\Models\Barangay;
use Database\Factories\BarangayFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BarangayTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @dataProvider dafacAttributesProvider
     * @testdox $_dataName is not null
     */
    public function test_attribute_not_null($attribute)
    {
        // arrange - create model
        $model = BarangayFactory::new()->create();
        // act - retrieve model
        $value = Barangay::find($model->getKey())->$attribute;
        // assert - attribute is not null
        $this->assertNotNull($value);
    }

    public static function dafacAttributesProvider()
    {
        // * use $_dataName on @testdox to get key
        return [
            // location of the affected family
            'region' => ['region'],
            'province' => ['province'],
            'district' => ['district'],
            'city/municipality' => ['municipality'],
            'barangay name' => ['name'],
        ];
    }
}
