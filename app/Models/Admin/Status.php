<?php

namespace App\Models\Admin;

use App\Traits\BlamableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes;
    use BlamableTrait;

    protected $guarded = ['id'];

    protected $table = 'status';
}
