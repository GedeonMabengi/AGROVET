<?php

namespace App\Enums;

enum UserRole: string
{
    case CLIENT = 'client';
    case SELLER = 'seller';
    case ADMIN = 'admin';
}
