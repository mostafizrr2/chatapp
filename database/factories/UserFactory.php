<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'profile_image' => 'https://via.placeholder.com/150',
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Message::class, function (Faker $faker) {

    do{
        $from = rand(1,100);
        $to = rand(1,100);
    }
    while($from == $to);

    return [
        'from' => $from,
        'to' => $to ,
        'text' =>  $faker->sentence,
    ];
});