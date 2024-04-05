<?php

namespace App\Models;

use App\Enums\Gender;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Disaster Assistance Family Access Card
 */
class Dafac extends Model
{
    use HasFactory;

    protected $casts = [
        'sex' => Gender::class,
    ];

    protected function age(): Attribute
    {
        return Attribute::get(fn () => Carbon::parse($this->birthdate)->age);
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    protected function region(): Attribute
    {
        return Attribute::get(fn () => $this->barangay->region);
    }

    protected function province(): Attribute
    {
        return Attribute::get(fn () => $this->barangay->province);
    }

    protected function district(): Attribute
    {
        return Attribute::get(fn () => $this->barangay->district);
    }

    protected function municipality(): Attribute
    {
        return Attribute::get(fn () => $this->barangay->municipality);
    }

    public function evacuation_site()
    {
        return $this->belongsTo(EvacuationSite::class);
    }

    public function birthplace()
    {
        return $this->belongsTo(Birthplace::class);
    }
}
