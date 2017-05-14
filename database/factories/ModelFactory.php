<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Models\News::class, function (Faker\Generator $faker) {

    return [
        'news_uuid' => $faker->name,
        'news_title' => $faker->unique()->safeEmail,
        'news_body' => $faker->paragraph,
        'created_by' => factory('App\User')->create()->id,
    ];
});

$factory->define(App\Models\Admin\Gps\Tracker::class,function (Faker\Generator $faker){
   return [

   ];
});