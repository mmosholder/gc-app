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

/**
 * Companies
 */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {

    return [
        'username' => $faker->unique()->userName(),
        'name' => $faker->name(),
        'password' => bcrypt($faker->password),
        'email' => $faker->unique()->safeEmail
    ];
});

?>
