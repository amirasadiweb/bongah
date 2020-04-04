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
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Baner::class, function (Faker\Generator $faker) {
    return [
        'street'=>$faker->streetAddress,
        'city'=>$faker->city,
        'state'=>$faker->state,
        'country'=>$faker->country,
        'zip'=>$faker->postcode,
        'price'=>$faker->numberBetween(10000,90000),
        'description'=>$faker->paragraph,
    ];
});
