<?php

namespace Tests\Feature\Models;

use App\Models\FamilyMember;
use Database\Factories\FamilyMemberFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FamilyMemberModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_family()
    {
        $model = FamilyMemberFactory::new()->create();
        $this->assertModelAttribute($model, 'family', $model->family);
        $this->assertModelExists($model->family);
    }

    public function test_name()
    {
        $model = FamilyMemberFactory::new()->create();
        $this->assertModelAttribute($model, 'family_member', $model->__toString());
    }

    public function test_relation_to_head()
    {
        $model = FamilyMemberFactory::new()->create();
        $this->assertModelAttribute($model, 'relation_to_head', $model->relation_to_head);
    }

    public function test_birthdate()
    {
        $model = FamilyMemberFactory::new()->create();
        $this->assertModelAttribute($model, 'birthdate', $model->birthdate);
    }

    public function test_gender()
    {
        $model = FamilyMemberFactory::new()->create();
        $this->assertModelAttribute($model, 'gender', $model->gender);
    }

    public function test_educational_attainment()
    {
        $model = FamilyMemberFactory::new()->create();
        $this->assertModelAttribute($model, 'educational_attainment', $model->educational_attainment);
    }

    public function test_occupational_skills()
    {
        $model = FamilyMemberFactory::new()->create();
        $this->assertModelAttribute($model, 'occupational_skills', $model->occupational_skills);
    }

    public function test_remarks()
    {
        $model = FamilyMemberFactory::new()->create();
        $this->assertModelAttribute($model, 'remarks', $model->remarks);
    }
}
