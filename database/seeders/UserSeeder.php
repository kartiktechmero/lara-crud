<?php

namespace Database\Seeders;

use App\Enums\UserRoleType;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = User::updateOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Test Super Admin',
                'password' => bcrypt('password'),
            ]);
        $super_admin->assignRole(UserRoleType::SUPER_ADMIN);

        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Test Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        $admin->assignRole(UserRoleType::ADMIN);

        $employee = User::updateOrCreate(
            ['email' => 'employee@example.com'],
            [
                'name' => 'Test Employee',
                'email' => 'employee@example.com',
                'password' => bcrypt('password'),
            ]);
        $employee->assignRole(UserRoleType::EMPLOYEE);
    }
}
