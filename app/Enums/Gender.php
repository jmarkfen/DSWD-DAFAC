<?php

namespace App\Enums;

enum Gender: string implements \Filament\Support\Contracts\HasLabel
{
    case MALE = 'Male';
    case FEMALE = 'Female';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
        };
    }
}
