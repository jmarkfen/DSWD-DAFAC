<?php

namespace Tests\Feature\Models;

use App\Models\Family;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class FamilyModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_collection_contains_model(): void
    {
        $model = Family::factory()->create();
        
        $this->assertTrue(Family::all()->contains($model));
    }

    public function test_collection_does_not_contain_deleted_model(): void
    {
        $model = Family::factory()->create();
        $model->delete();

        $this->assertFalse(Family::all()->contains($model));
    }
}
