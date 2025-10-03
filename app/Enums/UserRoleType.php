<?php

namespace App\Enums;

enum UserRoleType: string
{
    case SUPER_ADMIN = 'super_admin';
    case ADMIN = 'admin';
    case EMPLOYEE = 'employee';

    public static function getAllRoles(): array
    {
        return self::cases();
    }
}
