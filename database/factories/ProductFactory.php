<?php

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(10, 1000),
        'image_lg' => 'https://picsum.photos/g/650/550?image=' . $faker->numberBetween(0, 50),
        'image_md' => 'https://picsum.photos/g/350/250?image=' . $faker->numberBetween(0, 50),
        'image_sm' => 'https://picsum.photos/g/50/50?image=' . $faker->numberBetween(0, 50),
    ];
});
