<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use App\Auction;
use Faker\Generator as Faker;

// Juan José Escudero

$factory->define(Auction::class, function (Faker $faker) {
    return [
        'reserve_price' => $faker->numberBetween($min = 20000, $max = 40000),
        'beginning' => now(),
        'ending' => now()->addDays($faker->numberBetween($min = 30, $max = 365)),
        'state' => $faker->numberBetween($min = 0, $max = 1),
        'car_id' => function () {
            $car = Car::inRandomOrder()->get()->where('availability', 1)->random(1)->first();
            $car->setAvailability(0);
            $car->save();
            return $car->getId();
        },
    ];
});
