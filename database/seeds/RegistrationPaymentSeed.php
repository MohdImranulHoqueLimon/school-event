<?php

use Illuminate\Database\Seeder;

class RegistrationPaymentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RegistrationPayment::create(array(
            'amount' => 500,
            'user_id' => 2,
            'registered_by' => 1,
        ));
    }
}
