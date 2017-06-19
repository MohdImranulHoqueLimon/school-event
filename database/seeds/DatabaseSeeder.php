<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(RegistrationAmountSeed::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
    }
}
