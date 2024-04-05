<?php

namespace Tests\Feature\Models;

use App\Models\FamilyMember;
use Database\Factories\FamilyMemberFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FamilyMemberTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @dataProvider dafacAttributesProvider
     * @testdox $_dataName is not null
     */
    public function test_attribute_not_null($attribute)
    {
        // arrange - create model
        $model = FamilyMemberFactory::new()->create();
        // act - retrieve model
        $value = FamilyMember::find($model->getKey())->$attribute;
        // assert - attribute is not null
        $this->assertNotNull($value);
    }

    public static function dafacAttributesProvider()
    {
        // * use $_dataName on @testdox to get key
        return [
            'name of family member' => ['name'],
            'relation to family head' => ['relation_to_head'],
            'age' => ['age'],
            'sex' => ['sex'],
            'educational attainment' => ['educational_attainment'],
            'occupational skills' => ['occupational_skills'],
            'remarks' => ['remarks'],
        ];
    }
}
