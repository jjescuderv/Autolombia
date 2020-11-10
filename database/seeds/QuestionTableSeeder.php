<?php

use Illuminate\Database\Seeder;
use App\Question;

// Juan José Escudero

class QuestionTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Question::class,25)->create();
    }
}