<?php

use App\Support\Configs\Constants;
use \App\Models\Student;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create(array(
            'full_name' => 'Imranul Hoque Limon',
            'username' => 'limon',
            'phone' => '+8801723689536',
            'email' => 'student1@school.com',
            'address' => 'Dhaka, Bangladesh',
            'city' => 'Dhaka, Bangladesh',
            'status' => Constants::$user_active_status,
            'password' => bcrypt(123456)
        ));

        Student::create(array(
            'full_name' => 'Shafiqul Islam',
            'username' => 'shafiq',
            'phone' => '+88017232321323',
            'email' => 'student2@school.com',
            'address' => 'Dhaka, Bangladesh',
            'city' => 'Dhaka, Bangladesh',
            'status' => Constants::$user_default_status,
            'password' => bcrypt(123456)
        ));

        Student::create(array(
            'full_name' => 'Shakib Al Hasan',
            'username' => 'shakib',
            'phone' => '+88017200321323',
            'email' => 'student3@school.com',
            'address' => 'Dhaka, Bangladesh',
            'city' => 'Dhaka, Bangladesh',
            'status' => Constants::$user_default_status,
            'password' => bcrypt(123456)
        ));
    }
}
