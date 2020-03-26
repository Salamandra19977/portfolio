<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->text(100),
        'description' => $faker->realText(200),
        'user_id' => $faker->biasedNumberBetween(0,100),
        'views' => $faker->biasedNumberBetween(0,100),
        'like' => $faker->biasedNumberBetween(0,100),
        'dislike' => $faker->biasedNumberBetween(0,100),
        'status_id' => 1,
    ];
});
