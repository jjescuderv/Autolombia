<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Car;
use DB;

//Juan José Escudero

class CarController extends Controller 
{
    
    public function show($id) 
    {
        //DB::enableQueryLog(); // Enable query log

        $data = [];
        $car = Car::findOrFail($id);
        $data["car"] = $car;

        $questions = $car->questions;
        $data["questions"] = $questions;

        //dd(DB::getQueryLog());

        return view('car.show')->with("data", $data);
    }

    public function showAll() 
    {
        $data = [];
        $data["cars"] = Car::all();
        
        return view('car.show_all')->with("data", $data);
    }
    
}