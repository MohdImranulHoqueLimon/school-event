<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PaymentTypes extends Model
{
    protected $table = 'payment_types';

    protected $guarded = ['id'];
}
