<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number',
        'region',
        'province',
        'district',
        'barangay',
        'municipality',
        'evacuation_site',
        'head_last_name',
        'head_first_name',
        'head_name_extension',
        'head_birthdate',
        'head_birthplace',
        'head_sex',
        'head_mother_maiden_name',
        'head_occupation',
        'head_monthly_family_net_income',
        'head_id_type',
        'head_id_number',
        'head_primary_contact_number',
        'head_alternate_contact_number',
        'head_permanent_address',
        'head_is_4ps_beneficiary',
        'head_ip_ethnicity',
        'house_ownership_type',
        'house_condition',
    ];

    public function members()
    {
        return $this->hasMany(FamilyMember::class);
    }
}
