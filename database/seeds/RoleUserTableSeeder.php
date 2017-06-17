<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::whereEmail('admin@school.com')->first();
        $user2 = User::whereEmail('admin1@school.com')->first();
        $user3 = User::whereEmail('user@school.com')->first();

        $adminRole = Role::whereName('Admin')->first();
        $supportAdminRole = Role::whereName('Support-Admin')->first();
        $userRole = Role::whereName('User')->first();

        $user->assignRole($adminRole);
        $user->assignRole($userRole);
        $user->assignRole($supportAdminRole);

        $user2->assignRole($adminRole);

        $user3->assignRole($userRole);
    }
}
