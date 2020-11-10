<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Car;
use App\Auction;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        try {
            $cars = Car::inRandomOrder()->get()->where('availability', 1)->random(3);
            $auctions = Auction::inRandomOrder()->get()->where('state', 1)->random(3);
            $data["cars"] = $cars;
            $data["auctions"] = $auctions;
        } catch (Exception $e) {
            $cars = Car::inRandomOrder()->get()->random(3);
            $auctions = Auction::inRandomOrder()->get()->random(3);
            $data["cars"] = $cars;
            $data["auctions"] = $auctions;
        }

        return view('home.index')->with("data", $data);
    }

    public function successBuy()
    {
        return view('home.successbuy');
    }
}
