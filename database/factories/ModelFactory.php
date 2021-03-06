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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'token' => str_random(10)
    ];
});

$factory->define(App\Pin::class, function (Faker\Generator $faker) {
    return [
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'country' => $faker->country,
        'city' => $faker->city,
        'formatted_address' => $faker->streetAddress
    ];
});
