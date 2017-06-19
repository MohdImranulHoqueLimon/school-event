<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';

    protected $guarded = ['id'];

    protected $with = ['user', 'approved_admin', 'event'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function approved_admin() {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function event() {
        return $this->belongsTo(Events::class, 'event_id');
    }
}
