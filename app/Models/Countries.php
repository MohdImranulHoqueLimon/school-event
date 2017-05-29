<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $table = 'countries';

    protected $guarded = ['id'];
}
