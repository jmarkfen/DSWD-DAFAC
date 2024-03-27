<?php

namespace App\Enums;

enum HouseOwnershipType: int
{
    case OWNER = 1;
    case RENTER = 2;
    case SHARER = 3;
}
