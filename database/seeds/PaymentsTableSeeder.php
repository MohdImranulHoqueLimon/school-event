<?php

use Illuminate\Database\Seeder;
use \App\Models\Payments;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payments::create([
            'event_id' => 1,
            'user_id' => 1,
            'quantity' => 2,
            'amount' => 1100,
            'guest_amount' => 600,
            'guest_count' => 1,
            'is_payment' => true,
            'status' => true,
            'approved_by' => 1,
        ]);

        Payments::create([
            'event_id' => 2,
            'user_id' => 3,
            'quantity' => 1,
            'amount' => 300,
            'guest_amount' => null,
            'guest_count' => null,
            'is_payment' => false,
            'status' => false,
            'approved_by' => null,
        ]);
    }
}
