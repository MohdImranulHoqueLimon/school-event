<?php

namespace App\Traits;

use App\User;
use Illuminate\Database\Eloquent\Model;

trait BlamableTrait
{
    public static function bootBlamableTrait()
    {

        static::creating(function (Model $model){

            if(auth()->check()){
                $user = auth()->user()->id;
            }else{
                $user = User::where('email','admin@test.com')->first()->id;
            }

            $model->created_by = $user;
            $model->updated_by = $user;
        });

        static::updating(function (Model $model) {

            if(auth()->check()){
                $user = auth()->user()->id;
            }else{
                $user = User::where('email','admin@test.com')->first()->id;
            }

            $model->updated_by = $user;

        });
    }
}
