<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'name' => 'example.png',
        'size' => $faker->biasedNumberBetween(10,5000),
    ];
});
