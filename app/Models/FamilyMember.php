<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_id',
        'family_member',
        'name_extension',
        'relation_to_head',
        'birthdate',
        'sex',
        'educational_attainment',
        'occupational_skills',
        'remarks',
    ];

    public function __toString()
    {
        return $this->family_member;
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
