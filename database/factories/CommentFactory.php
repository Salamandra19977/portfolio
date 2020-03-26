<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'work_id' => $faker->biasedNumberBetween(0,100),
        'user_id' => $faker->biasedNumberBetween(0,100),
        'text' => $faker->text(100),
    ];
});
