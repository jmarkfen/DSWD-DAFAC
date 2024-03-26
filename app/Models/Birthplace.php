<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Birthplace extends Model
{
    use HasFactory;

    protected $fillable = ['birthplace'];

    public function __toString()
    {
        return $this->birthplace;
    }

    public function family_heads()
    {
        return $this->hasMany(Family::class, 'head_birthplace_id');
    }
}
