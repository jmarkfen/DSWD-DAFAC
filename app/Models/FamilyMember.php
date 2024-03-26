<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_id',
        'last_name',
        'first_name',
        'middle_name',
        'name_extension',
        'relation_to_head',
        'birthdate',
        'sex',
        'educational_attainment',
        'occupational_skills',
        'remarks',
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
