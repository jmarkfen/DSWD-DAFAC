<?php

namespace App\Enums;

enum HouseOwnershipType: string
{
    case OWNER = 'Owner';
    case RENTER = 'Renter';
    case SHARER = 'Sharer';
}
