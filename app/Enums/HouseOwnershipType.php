<?php

namespace App\Enums;

enum HouseOwnershipType: string implements \Filament\Support\Contracts\HasLabel
{
    case OWNER = 'Owner';
    case RENTER = 'Renter';
    case SHARER = 'Sharer';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::OWNER => 'Owner',
            self::RENTER => 'Renter',
            self::SHARER => 'Sharer',
        };
    }
}
