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
//        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'enabled' => 1,
    ];
});

$factory->define(App\Applicant::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'salutation' => $faker->name,
        'firstname' => $faker->firstName,
        'insertion' => $faker->name,
        'lastname' => $faker->lastName,
        'address' => $faker->address,
        'zipcode' => $faker->randomLetter,
        'location' => $faker->city,
        'phone' => $faker->randomNumber(),
        'email' => $faker->email,
    ];
});


$factory->define(App\Company::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'zipcode' => $faker->randomLetter,
        'city' => $faker->city,
        'phone' => $faker->randomNumber(),
        'email' => $faker->email,
        'website' => $faker->address,
        'contactperson' => $faker->name,
    ];
});

$factory->define(App\Admin::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'firstname' => $faker->firstName,
        'insertion' => $faker->name,
        'lastname' => $faker->lastName,
        'address' => $faker->address,
        'zipcode' => $faker->randomLetter,
        'location' => $faker->city,
        'phone' => $faker->randomNumber(),
        'email' => $faker->email,
    ];
});

//['salutation','firstname','insertion','lastname','address','zipcode','location','phone','email']