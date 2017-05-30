<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RegistrationPayment extends Model
{
    protected $table = 'registration_payment';

    protected $guarded = ['id'];

    public function user_info() {
        return $this->belongsTo(User::class, 'id');
    }
}
