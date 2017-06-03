<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RegistrationPayment extends Model
{
    protected $table = 'registration_payment';

    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class, 'id');
    }

    public function register_admin() {
        return $this->belongsTo(User::class, 'registered_by');
    }
}
