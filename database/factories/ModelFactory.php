<?php

use App\Models\{User, Post, Comment, Tag};

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

// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->safeEmail,
//         'password' => bcrypt(str_random(10)),
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define( Post::class, function (Faker\Generator $faker) {
    return [
        'title'      => $faker->sentence(4, true),
        'content'    => $faker->paragraphs(8, true),
        'created_at' => $faker->dateTimeBetween( '-30 months', 'now' ),
    ];
});

$factory->define( Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => strtolower($faker->unique()->word(8)),
    ];
});

$factory->define( Comment::class, function (Faker\Generator $faker) {
    return [
		'text'       => $faker->sentence(10, true),
		'owner_name' => $faker->firstNameMale . ' ' . $faker->lastName,
		'created_at' => $faker->dateTimeInInterval( '-30 days', 'now' ),
    ];
});
