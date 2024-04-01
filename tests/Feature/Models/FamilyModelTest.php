<?php

namespace Tests\Feature\Models;

use App\Models\Family;
use App\Models\FamilyMember;
use Database\Factories\FamilyFactory;
use Database\Factories\FamilyMemberFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class FamilyModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_serial_number(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'serial_number', $model->serial_number);
    }

    public function test_region(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'region', $model->region);
    }

    public function test_province(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'province', $model->province);
    }

    public function test_district(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'district', $model->district);
    }

    public function test_barangay(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'barangay', $model->barangay);
    }

    public function test_municipality(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'municipality', $model->municipality);
    }

    public function test_evacuation_site(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'evacuation_site', $model->evacuation_site);
    }

    public function test_head_last_name(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_last_name', $model->head_last_name);
    }

    public function test_head_first_name(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_first_name', $model->head_first_name);
    }

    public function test_head_middle_name(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_middle_name', $model->head_middle_name);
    }

    public function test_head_name_extension(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_name_extension', $model->head_name_extension);
    }

    public function test_head_birthdate(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_birthdate', $model->head_birthdate);
    }

    public function test_head_birthplace(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_birthplace', $model->head_birthplace);
    }

    public function test_head_gender(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_gender', $model->head_gender);
    }

    public function test_head_mother_maiden_name(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_mother_maiden_name', $model->head_mother_maiden_name);
    }

    public function test_head_occupation(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_occupation', $model->head_occupation);
    }

    public function test_head_monthly_family_net_income(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_monthly_family_net_income', $model->head_monthly_family_net_income);
    }

    public function test_head_id_type(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_id_card_type', $model->head_id_card_type);
    }

    public function test_head_id_number(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_id_card_number', $model->head_id_card_number);
    }

    public function test_head_primary_contact_number(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_primary_contact_number', $model->head_primary_contact_number);
    }

    public function test_head_alternate_contact_number(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_alternate_contact_number', $model->head_alternate_contact_number);
    }

    public function test_head_permanent_address(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_permanent_address', $model->head_permanent_address);
    }

    public function test_head_is_4ps_beneficiary(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_is_4ps_beneficiary', $model->head_is_4ps_beneficiary);
    }

    public function test_head_ip_ethnicity(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'head_ip_ethnicity', $model->head_ip_ethnicity);
    }

    public function test_members(): void
    {
        $model = FamilyFactory::new()->has(FamilyMemberFactory::new()->count(5), 'members')->create();
        $this->assertCount(5, $model->members);
    }

    public function test_house_ownership_type(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'house_ownership_type', $model->house_ownership_type);
    }

    public function test_house_condition(): void
    {
        $model = FamilyFactory::new()->create();
        $this->assertModelAttribute($model, 'house_condition', $model->house_condition);
    }
}
