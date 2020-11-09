<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use App\Car;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

// Juan José Escudero

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question' => Str::random(15) . ' ?',
        'car_id' => function () {
            $car = Car::inRandomOrder()->get()->where('availability', 1)->random(1)->first();
            return $car->getId();
        },
        'user_id' => User::inRandomOrder()->get('id')->random(1)->first(),
    ];
});
