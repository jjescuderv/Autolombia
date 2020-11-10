<?php

use Illuminate\Database\Seeder;
use App\Answer;

// Juan José Escudero

class AnswerTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Answer::class,15)->create();
    }
}