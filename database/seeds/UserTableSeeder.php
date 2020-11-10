<?php

use Illuminate\Database\Seeder;
use App\User;

// Juan José Escudero

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,3)->create();
    }
}