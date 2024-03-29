<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number',
        // 'region',
        // 'province',
        // 'district',
        // 'barangay',
        // 'municipality',
        'barangay_id',
        // 'evacuation_site',
        'evacuation_site_id',
        'head_last_name',
        'head_first_name',
        'head_middle_name',
        'head_name_extension',
        'head_birthdate',
        // 'head_birthplace',
        'head_birthplace_id',
        'head_sex',
        'head_mother_maiden_name',
        // 'head_occupation',
        'head_occupation_id',
        'head_monthly_family_net_income',
        // 'head_id_type',
        // 'head_id_number',
        'head_id_card_type_id',
        'head_id_card_number',
        'head_primary_contact_number',
        'head_alternate_contact_number',
        'head_permanent_address',
        'head_is_4ps_beneficiary',
        // 'head_ip_ethnicity',
        'head_ip_ethnicity_id',
        'house_ownership_type',
        'house_condition',
    ];

    protected $casts = [
        'head_sex' => \App\Enums\Gender::class,
        'house_ownership_type' => \App\Enums\HouseOwnershipType::class,
        'house_condition' => \App\Enums\HouseCondition::class,
    ];

    public function members()
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    public function getRegionAttribute()
    {
        return $this->barangay->region;
    }

    public function getProvinceAttribute()
    {
        return $this->barangay->province;
    }

    public function getDistrictAttribute()
    {
        return $this->barangay->district;
    }

    public function getMunicipalityAttribute()
    {
        return $this->barangay->municipality;
    }

    public function evacuation_site()
    {
        return $this->belongsTo(EvacuationSite::class);
    }

    public function getHeadAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->head_birthdate)->age;
    }

    public function head_birthplace()
    {
        return $this->belongsTo(Birthplace::class, 'head_birthplace_id');
    }

    public function occupation()
    {
        return $this->belongsTo(Occupation::class, 'head_occupation_id');
    }

    public function head_id_card_type()
    {
        return $this->belongsTo(IdCardType::class, 'head_id_card_type_id');
    }

    public function head_ip_ethnicity()
    {
        return $this->belongsTo(IpEthnicity::class, 'head_ip_ethnicity_id');
    }
}
