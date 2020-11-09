<?php

use Illuminate\Database\Seeder;
use App\Car;

// Juan José Escudero

class CarTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Car::class,10)->create();
    }
}