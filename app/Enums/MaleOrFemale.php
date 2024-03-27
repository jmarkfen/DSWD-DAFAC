<?php

namespace App\Enums;

enum MaleOrFemale: int
{
    case MALE = 1;
    case FEMALE = 2;

    public function getLower(): string
    {
        return match ($this) {
            self::MALE => 'male',
            self::FEMALE => 'female',
        };
    }
}
