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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'id' =>  $faker->numberBetween(1, 10000),
        'name' => $faker->word
    ];
});
$factory->define(App\Product::class, function (Faker\Generator $faker) {

    return [
        'lm' => $faker->randomNumber(5),
        'name' => $faker->word,
        'category_id' => factory(App\Category::class)->create()->id,
        'free_shipping' => $faker->boolean(),
        'description' => $faker->sentence(10),
        'price' => $faker->randomFloat(2, 10),
        'active' => $faker->boolean()
    ];
});
