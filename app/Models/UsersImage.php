<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UsersImage extends Model
{
    protected $table = 'users_image';

    protected $guarded = ['id'];

    protected $with = ['avatar'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function avatar()
    {
        return $this->belongsTo(User::class,'id');
    }
}
