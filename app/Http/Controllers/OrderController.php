<?php
//Jhonatan Acevedo Castrillón
//Andrew Perez
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Car;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use App\Orders\OrderStorage;



class OrderController extends Controller
{

    public function show($id)
    {
        $data = [];
        $car = Car::findOrFail($id);
        $data["car"] = $car;
        $user = Auth::user();
        $data["user"] = $user;

        return view('/order/show')->with("data", $data);
    }


    public function save(Request $request)
    {
        $total_price = $request->input('total_price');
        $id_user = $request->input('user_id');
        $user = User::findOrFail($id_user);
        $credit = $user->getCredit();

        if ($credit - $total_price <= 0) {
            return back();
        } else {

            Order::validate($request);
            Order::create(
                $request->only([
                    "id", "total_price", "car_id", "user_id"
                ])
            );

            $user->setCredit($credit - $total_price);
            $user->save();

            $id = $request->input('id');
            $car = Car::findOrFail($id);
            $car->setAvailability(0);
            $car->save();

            $data = [];
            $data["id"] = $id;

            return view('/order/successbuy')->with("data", $data);
        }
    }

    public function download(Request $request, $id)
    {
        $type = $request->input("boton");
        $order = app(OrderStorage::class, ['array' => $type]);
        return $order->store($id);
    }


    public function cancel()
    {
        return redirect('/car');
    }
}
