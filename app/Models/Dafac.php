<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Disaster Assistance Family Access Card
 */
class Dafac extends Model
{
    use HasFactory;

    protected function age(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return \Carbon\Carbon::parse($attributes['birthdate'])->age;
            }
        );
    }
}
