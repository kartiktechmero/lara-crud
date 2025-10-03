<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRoleType;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        Company::factory(100)->create()->each(function ($company) {
            // Create main owner
            $owner = User::factory()->owner()->create([
                'company_id' => $company->id,
            ]);
            $owner->assignRole(UserRoleType::OWNER);

            // Set main_user_id in company
            $company->main_user_id = $owner->id;
            $company->save();

            // Optionally, create employees
            User::factory(100000)->create([
                'company_id' => $company->id,
            ])->each(function ($user) {
                $user->assignRole(UserRoleType::EMPLOYEE);
            });
        });

    }
}
