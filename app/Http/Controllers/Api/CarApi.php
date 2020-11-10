<?php
//Jhonatan Acevedo
namespace App\Http\Controllers\Api;
use App\Http\Resources\CarResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Car;

class CarApi extends Controller
{
    public function index()
    {
        return CarResource::collection(Car::all());
    }

    public function show($id)
    {
        return new CarResource(Car::findOrFail($id));
    }
}
