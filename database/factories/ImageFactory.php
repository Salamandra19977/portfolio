<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use Faker\Generator as Faker;

//$faker = \Faker\Factory::create();
//$faker->addProvider(new \App\Providers\PicsumImage($faker));

$factory->define(Image::class, function (Faker $faker) {
    $image = $faker->image('public/storage/images',640,480,null,false,true);
    return [
        'name' => $image,
        'patch' => "images/".$image,
        'size' => rand(20,1000),
        'extension' => "jpg",
    ];
});
