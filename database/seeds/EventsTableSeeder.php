<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use \App\Models\Events;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Events::create([
            'title' => 'Reunion Payment',
            'description' => 'Reunion Payment',
            'amount' => 500,
            'fixed_amount' => true,
            'guest_allow' => true,
            'guest_amount' => 600,
            'created_by' => 1,
            'status' => true,
        ]);

        Events::create([
            'title' => 'Picnic Payment',
            'description' => 'Picnic Payment',
            'amount' => 300,
            'fixed_amount' => false,
            'guest_allow' => false,
            'guest_amount' => 0,
            'created_by' => 2,
            'status' => true,
        ]);
    }
}
