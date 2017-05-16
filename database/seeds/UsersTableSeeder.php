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
            'full_name' => 'Imranul Hoque Limon',
            'username' => 'limon',
            'phone' => '+8801723689536',
            'email' => 'admin@school.com',
            'status' => 1,
            'password' => bcrypt(123456)
        ));

        User::create(array(
            'full_name' => 'Shafiqul Islam',
            'username' => 'shafiq',
            'phone' => '+88017232321323',
            'email' => 'admin1@school.com',
            'password' => bcrypt(123456)
        ));

        User::create(array(
            'full_name' => 'Shakib Al Hasan',
            'username' => 'shakib',
            'phone' => '+88017200321323',
            'email' => 'user@school.com',
            'password' => bcrypt(123456)
        ));
    }
}
