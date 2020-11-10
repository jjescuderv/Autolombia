<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Car;
use App\Order;

//Jhonatan Acevedo

class SellController extends Controller 
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
    
    public function show() 
    {
        $data = [];
        $data["cars"] = Car::where('availability', 0)->get();
        $orders = Order::all();
        $data["orders"] = $orders;
        
        
        return view('admin.sells')->with("data", $data);
    }
}