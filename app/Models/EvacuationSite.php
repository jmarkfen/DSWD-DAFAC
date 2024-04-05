<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvacuationSite extends Model
{
    use HasFactory;

    public function dafacs()
    {
        return $this->hasMany(Dafac::class);
    }
}
