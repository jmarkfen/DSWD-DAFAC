<?php

namespace App\Enums;

enum HousingCondition: string implements \Filament\Support\Contracts\HasLabel
{
    case PARTIALLY_DAMAGED = 'Partially Damaged';
    case TOTALLY_DAMAGED = 'Totally Damaged';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PARTIALLY_DAMAGED => 'Partially Damaged',
            self::TOTALLY_DAMAGED => 'Totally Damaged',
        };
    }
}
