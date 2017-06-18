<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';

    protected $guarded = ['id'];

    protected $with = ['createdBy'];

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id');
    }
}
