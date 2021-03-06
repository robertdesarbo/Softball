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
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'gender' => $faker->numberBetween(0,1),
        'type' => $faker->numberBetween(0,1),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\League::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text($maxNbChars = 15),
        'type' => $faker->word,
        #'active' => $faker->boolean,
        'active' => 1,
    ];
});


$factory->define(App\Division::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text($maxNbChars = 15),
        #'active' => $faker->boolean,
        'active' => 1,
    ];
});


$factory->define(App\Session::class, function (Faker\Generator $faker) {
    return [
        'start_date' => $faker->dateTimeBetween('now', '+1 months'),
        'end_date' => $faker->dateTimeBetween('+1 months', '+6 months'),
        #'active' => $faker->boolean,
        'active' => 1,

    ];
});


$factory->define(App\Team::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text($maxNbChars = 15),
    ];
});


$factory->define(App\TeamRoster::class, function (Faker\Generator $faker) {
    return [
    	#'active' => $faker->boolean,
        'active' => 1,
        'captain' => $faker->boolean,
    ];
});


$factory->define(App\Field::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'alcohol_allowed' => $faker->boolean,
        'pets_allowed' => $faker->boolean,
        'night_games' => $faker->boolean,
        #'active' => $faker->boolean,
        'active' => 1,
    ];
});


$factory->define(App\Umpire::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
    ];
});


$factory->define(App\UmpireEvaluation::class, function (Faker\Generator $faker) {
    return [
        'rating' => $faker->numberBetween(1,5),
        'note' => $faker->paragraph( 5 ),
    ];
});


$factory->define(App\Rule::class, function (Faker\Generator $faker) {
    return [
        'rule' => $faker->sentence,
    ];
});


$factory->define(App\Game::class, function (Faker\Generator $faker) {
    return [
        'game_time' => $faker->dateTimeBetween('-1 month', '+3 months'),
    ];
});