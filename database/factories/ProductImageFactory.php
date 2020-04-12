<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductImage;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
		'image' => $faker->imageUrl($width = 640, $height = 480),
		'featured' => false,
		'product_id' => 1,
    ];
});