<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    	'description' => $faker->sentence(10),
    	'long_description' => $faker->text,
    	'price' => $faker->randomFloat(2, 5, 150),
    	'category_id' => 1
    ];
});