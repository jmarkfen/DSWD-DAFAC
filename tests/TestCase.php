<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function assertSetAndGet(string $model, string $key): void
    {
        $set = $model::factory()->create();
        $get = $this->retrieveModel($set);
        $this->assertNotNull($set->$key);
        $this->assertNotNull($get->$key);
        $this->assertEqualAttribute($set, $get, $key);
    }

    public function assertEqualAttribute(Model $model1, Model $model2, string $key, bool $preventAccessingMissingAttributes = true)
    {
        Model::preventAccessingMissingAttributes($preventAccessingMissingAttributes);
        $this->assertEquals($model1->$key, $model2->$key);
        Model::preventAccessingMissingAttributes(false);
    }

    public function retrieveModel(Model $model)
    {
        return $model::class::find($model->getKey());
    }

    public function assertModelAttribute(Model $model, string $attribute, mixed $expectedValue)
    {
        $id = $model->getKey();
        /** @var Model */
        $retrieved = $model::class::find($id);
        $retrievedValue = $retrieved->$attribute;
        $this->assertNotNull($retrievedValue, $attribute . ' is null');
        $this->assertEquals($expectedValue, $retrievedValue);
    }
}
