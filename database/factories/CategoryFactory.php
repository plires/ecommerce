<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    	'description' => $faker->sentence(10),
    	'image' => $faker->imageUrl($width = 640, $height = 480)
    ];
});