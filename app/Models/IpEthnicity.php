<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpEthnicity extends Model
{
    use HasFactory;

    protected $fillable = ['ip_ethnicity'];

    public function __toString()
    {
        return $this->ip_ethnicity;
    }

    public function families()
    {
        return $this->hasMany(Family::class, 'head_ip_ethnicity_id');
    }
}
