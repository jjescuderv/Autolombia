<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

// Juan José Escudero

$factory->define(Car::class, function (Faker $faker) {

    $car_array = app('Faker')->car;
    return [
        'brand' => $car_array[0],
        'model' => $car_array[1],
        'color' => $faker->colorName,
        'price' => $faker->numberBetween($min = 5000, $max = 40000),
        'mileage' => $faker->numberBetween($min = 100, $max = 20000),
        'description' => Str::random(200),
        'availability' => 1,
        'license_plate' => Str::random(6),
        'image' => $faker->numberBetween($min = 1, $max = 5) . '.png',
    ];
});
