<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $image = $faker->image('public/storage/images',640,480,null,false,true);
    return [
        'name' => $image,
        'patch' => "images/".$image,
        'patch_cover' => "covers/".$image,
        'size' => rand(20,1000),
        'extension' => "jpg",
    ];
});
