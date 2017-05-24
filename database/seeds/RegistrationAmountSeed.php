<?php

use Illuminate\Database\Seeder;

class RegistrationAmountSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RegistrationAmount::create(array(
            'amount' => 500,
            'created_by' => 1,
        ));
    }
}
