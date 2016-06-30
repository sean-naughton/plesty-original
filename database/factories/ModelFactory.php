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
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Plest::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'user_id' => factory(App\User::class)->create()->id,
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
    ];
});

$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    return [
        'text' => $faker->name,
    ];
});

$factory->defineAs(App\Answer::class, 'withQuestion', function (Faker\Generator $faker) {
    return [
        'text' => $faker->name,
        'question_id' => factory(App\Question::class)->create()->id,
    ];
});