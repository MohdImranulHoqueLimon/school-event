<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PaymentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PaymentTypes::create([
            'title' => 'Bank'
        ]);

        \App\Models\PaymentTypes::create([
            'title' => 'Bkash'
        ]);
    }
}
