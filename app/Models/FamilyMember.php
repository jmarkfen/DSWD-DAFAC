<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $casts = [
        'sex' => Gender::class,
    ];

    public function dafac()
    {
        return $this->belongsTo(Dafac::class);
    }
}
