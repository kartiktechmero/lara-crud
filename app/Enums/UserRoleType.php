<?php

namespace App\Enums;

enum UserRoleType: string
{
    case SUPER_ADMIN = 'super_admin';
    case ADMIN = 'admin';
    case EMPLOYEE = 'employee';

    case OWNER = 'owner';

    public static function getAllRoles(): array
    {
        return self::cases();
    }
}
