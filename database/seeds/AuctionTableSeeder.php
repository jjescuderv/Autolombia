<?php

use Illuminate\Database\Seeder;
use App\Auction;

// Juan José Escudero

class AuctionTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Auction::class,5)->create();
    }
}