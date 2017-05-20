<?php

use App\Support\Configs\Constants;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name' => 'Imranul Hoque Limon',
            'role' => 1,
            'phone' => '+8801723689536',
            'email' => 'admin@school.com',
            'address' => 'Bagerhat',
            'city' => 'Dhaka',
            'status' => 1,
            'password' => bcrypt(123456)
        ));

        User::create(array(
            'name' => 'Shafiqul Islam',
            'role' => 1,
            'phone' => '+88017232321323',
            'address' => 'Bagerhat',
            'city' => 'Dhaka',
            'email' => 'admin1@school.com',
            'password' => bcrypt(123456)
        ));

        User::create(array(
            'name' => 'Shakib Al Hasan',
            'role' => 1,
            'phone' => '+88017200321323',
            'email' => 'user@school.com',
            'address' => 'Bagerhat',
            'city' => 'Dhaka',
            'password' => bcrypt(123456)
        ));
    }
}
