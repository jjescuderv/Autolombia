<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Car;
use App\Order;
use App\User;

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
        $users = User::all();
        $data["users"] = $users;
        return view('admin.sells')->with("data", $data);
    }

    public function delete($id) 
    {
        $car = Car::findOrFail($id);
        $order = Order::findOrFail($id);

        $car->setAvailability(1);
        $car->save();
      
        $order->delete();

        return redirect()->route('admin.sells.index');
    }
}