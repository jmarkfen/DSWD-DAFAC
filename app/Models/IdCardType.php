<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdCardType extends Model
{
    use HasFactory;

    protected $fillable = ['id_card_type'];

    public function __toString()
    {
        return $this->id_card_type;
    }

    public function families()
    {
        return $this->hasMany(Family::class, 'head_id_card_type_id');
    }
}
