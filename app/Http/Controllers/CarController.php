<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Util\CurrencyExchange;
use Illuminate\Http\Request;
use App\Car;
use DB;

//Juan José Escudero

class CarController extends Controller 
{
    
    public function show($id) 
    {
        $data = [];
        $car = Car::findOrFail($id);
        $data["car"] = $car;

        $questions = $car->questions;
        $data["questions"] = $questions;

        $data["price"] = $car->getPrice();
        $data["currency"] = 'USD';

        return view('car.show')->with("data", $data);
    }

    public function updateCurrency(Request $request)
    {
        $car = Car::findOrFail($request->input('car_id'));
        $amount = $car->getPrice();
        $currency = $request->input('currency');

        $exchangeCurrency = app(CurrencyExchange::class);
        $newAmount = $exchangeCurrency->convert($currency, $amount);
        
        $data["car"] = $car;

        $questions = $car->questions;
        $data["questions"] = $questions;

        $data["price"] = $newAmount;
        $data["currency"] = $currency;

        return view('car.show')->with("data", $data);
    }

    public function showAll() 
    {
        $data = [];
        $data["cars"] = Car::all()->where('availability', 1);
        
        return view('car.show_all')->with("data", $data);
    }
    
}