<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Car;

//Juan José Escudero

class AdminCarController extends Controller 
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->getRole()=="client"){
                return redirect()->route('home.index');
            }
    
            return $next($request);
        });
    }
    
    public function show($id) 
    {
        $data = [];
        $car = Car::findOrFail($id);
        $data["car"] = $car;
 
        $questions = $car->questions;
        $data["questions"] = $questions;

        return view('admin.car.show')->with("data", $data);
    }

    public function showAll() 
    {
        $data = [];
        $data["cars"] = Car::all();
        
        return view('admin.car.show_all')->with("data", $data);
    }

    public function create() 
    {
        $data = [];

        return view('admin.car.create')->with("data", $data);
    }

    public function save(Request $request) 
    {
        Car::validate($request);
        $car = Car::create(
            $request->only([
                "brand", "model", "color", "price", "mileage", "description", "availability", "license_plate"
            ])
        );

        $imagePath = $car->getId() . ' ' . $car->getModel() . '.png';

        $storeCarImage = app(ImageStorage::class);
        $storeCarImage->store($request, $imagePath);

        $car->setImagePath($imagePath);
        $car->save();
        
        return back()->with('success', 'Car created successfully!');
    }

    public function edit($id)
    {
        $data = [];

        $car = Car::findOrFail($id);
        $data["car"] = $car;

        return view('admin.car.edit')->with("data", $data);
    }

    public function update(Request $request, $id)
    {
        Car::validate($request);
        Car::find($id)->update($request->all());

        return back()->with('success', 'Car updated succesfully!');
    }

    public function delete($id) 
    {
        Car::where('id', $id)->delete();
        
        return redirect()->route('admin.car.index');
    }
    
}