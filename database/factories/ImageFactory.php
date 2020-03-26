<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->image(),
        'size' => $faker->biasedNumberBetween(10,5000),
        'work_id' => $faker->biasedNumberBetween(0,100),
    ];
});
