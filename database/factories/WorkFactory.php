<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Work;
use Faker\Generator as Faker;

$factory->define(Work::class, function (Faker $faker) {
    return [
        'name' => $faker->text(100),
        'description' => $faker->realText(200),
        'status_id' => 1
    ];
});
