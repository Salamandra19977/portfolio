<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Assessment;
use Faker\Generator as Faker;

$factory->define(Assessment::class, function (Faker $faker) {
    return [
        'assessment' => $faker->randomElement([-1,1]),
    ];
});
