<?php

namespace Tests\Feature;

use App\Models\Family;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FamilyTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create(): void
    {
        $data = Family::factory()->definition();

        $model = Family::query()->create($data);

        $families = Family::all();
        $this->assertCount(1, $families);
        $this->assertTrue($families->contains($model));
    }

    public function test_can_update(): void
    {
        $model = Family::factory()->create();
        $newData = Family::factory()->definition();

        $model->update($newData);

        $fromDb = Family::find($model->id);
        foreach ($newData as $key => $value) {
            $this->assertTrue($fromDb->$key == $value);
        }
    }

    public function test_can_delete(): void
    {
        $model = Family::factory()->create();

        $model->delete();

        $families = Family::all();
        $this->assertFalse($families->contains($model));
    }
}
