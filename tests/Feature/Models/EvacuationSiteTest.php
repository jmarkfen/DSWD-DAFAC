<?php

namespace Tests\Feature\Models;

use App\Models\EvacuationSite;
use Database\Factories\EvacuationSiteFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EvacuationSiteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @dataProvider dafacAttributesProvider
     * @testdox $_dataName is not null
     */
    public function test_attribute_not_null($attribute)
    {
        // arrange - create model
        $model = EvacuationSiteFactory::new()->create();
        // act - retrieve model
        $value = EvacuationSite::find($model->getKey())->$attribute;
        // assert - attribute is not null
        $this->assertNotNull($value);
    }

    public static function dafacAttributesProvider()
    {
        // * use $_dataName on @testdox to get key
        return [
            // location of the affected family
            'evacuation center/site' => ['name'],
        ];
    }
}
