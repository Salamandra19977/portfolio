<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\View;
use Faker\Generator as Faker;

$factory->define(View::class, function (Faker $faker) {
    return [
        'ip' => $faker->unique()->ipv4
    ];
});
