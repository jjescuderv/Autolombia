<?php
//Jhonatan Acevedo Castrillón
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Car;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->getRole()=="client"){
                
            }else{
                return redirect()->route('home.index');
            }
    
            return $next($request);
        });
    }

    public function comprasUsuario()
    {
        $id = Auth::user()->getId();
        

        $orders = Order::where('user_id', $id)->get();
        

        return $orders;
    }

    public function show()
    {
        $data = [];
        $orders = self::comprasUsuario();
        $cars = [];

        $index = 0;
        foreach ($orders as &$order) {
            $order_id=$order->getId();
            
            $car = Car::findOrFail($order_id);
            
            array_push($cars, $car);
        }
        
        
        
        

        
        $data["name"] = Auth::user()->getName();
        $data["id"] = Auth::user()->getId();
        $data["email"] = Auth::user()->getEmail();
        $data["compras"] = sizeof(self::comprasUsuario());
        $data["saldo"] = Auth::user()->getCredit();
        $data["cars"] = $cars;
        return view('/profile/show')->with("data", $data);
    }

}
