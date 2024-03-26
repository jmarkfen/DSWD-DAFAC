<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvacuationSite extends Model
{
    use HasFactory;

    protected $fillable = ['evacuation_site'];

    public function __toString()
    {
        return $this->evacuation_site;
    }

    public function families()
    {
        return $this->hasMany(Family::class);
    }
}
