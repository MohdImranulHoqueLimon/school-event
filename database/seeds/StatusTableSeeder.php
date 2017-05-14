<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Paid',
        ]);

        Status::create([
            'name' => 'Partial Paid'
        ]);

        Status::create([
            'name' => 'Truck Not Assigned'
        ]);

        Status::create([
            'name' => 'Not Picked'
        ]);

        Status::create([
            'name' => 'Delivered'
        ]);

        Status::create([
            'name' => 'Cancelled'
        ]);

        Status::create([
            'name' => 'Address Not Assigned'
        ]);

        Status::create([
            'name' => 'Route Not Assigned'
        ]);

        Status::create([
            'name' => 'Not Paid'
        ]);

        Status::create([
            'name' => 'Picked'
        ]);

        Status::create([
            'name' => 'Partially Picked'
        ]);

    }
}
