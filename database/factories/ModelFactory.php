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
        'password' =>  bcrypt('secret'),
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
        'name' => $faker->company,
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
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Competence::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\CV::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'date' => \Carbon\Carbon::now(),
        'title' => $faker->name,
        'text' => $faker->paragraph,
        'applicant_id'=> factory(App\Applicant::class)->create()->id,
        'video' => $faker->mimeType,
        'motivation'=> $faker->paragraph,
        'category_id' => factory(\App\CV::class)->create()->id
    ];
});

$factory->define(App\Vacancy::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'date' => \Carbon\Carbon::now(),
        'title' => $faker->name,
        'text' => $faker->paragraph,
        'company_id'=> factory(App\Company::class)->create()->id
    ];
});