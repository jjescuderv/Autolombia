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
        $compras = sizeof($orders);

        return $compras;
    }

    public function show()
    {
        $data = [];
        
        $data["name"] = Auth::user()->getName();
        $data["id"] = Auth::user()->getId();
        $data["email"] = Auth::user()->getEmail();
        $data["compras"] = self::comprasUsuario();
        $data["saldo"] = Auth::user()->getCredit();
        return view('/profile/show')->with("data", $data);
    }

}
