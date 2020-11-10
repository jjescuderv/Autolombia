<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use App\Question;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

// Juan José Escudero

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'answer' => Str::random(25),
        'question_id' => Question::inRandomOrder()->get('id')->random(1)->first(),
    ];
});
