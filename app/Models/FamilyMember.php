<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_id',
        'family_member',
        'relation_to_head',
        'birthdate',
        'gender',
        'educational_attainment',
        'occupational_skills',
        'remarks',
    ];

    protected $casts = [
        'gender' => Gender::class,
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
