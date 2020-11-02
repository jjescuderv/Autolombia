<?php
//Jhonatan Acevedo Castrillón
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Order;
use App\Car;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;



class OrderController extends Controller
{

    public function show($id)
    {
        $data = [];
        $car = Car::findOrFail($id);
        $data["car"] = $car;
        $user_id = Auth::user()->getId();
        $data["user_id"] = $user_id;
        
        return view('/order/order')->with("data", $data);
    }
    
    
    public function save(Request $request) 
    {
        Order::validate($request);
        Order::create(
            $request->only([
                "id","total_price","car_id","user_id"
            ])
        );

        $id = $request->input('id');
        $car = Car::findOrFail($id);
        $car->setAvailability(0);
        $car->save();
        

        $data = [];
        $data["id"] = $id;

        return view('/order/successbuy')->with("data", $data);

    }

    public function download($id)
    {
        $order = Order::findOrFail($id);
        $car = Car::findOrFail($id);
        $car_brand = $car->getBrand();
        $car_model = $car->getModel();
        $car_license_plate = $car->getLicensePlate();

        $car_id = $id;
        $order_id = $order->getId();

        $user = $order->user;
        $user_id = $user->getId();
        $user_email = $user->getEmail();
        $user_name = $user->getName();
        
        $total_price =$order->getTotalPrice();
        $created_at =$order["created_at"];

        
        $pdf = app('dompdf.wrapper');
        $cadena = "<b>"."AUTOLOMBIA S.A.S"."</b>".
        "<br>"."Factura #: ".$order_id."<br>"."Fecha de facturación: ".$created_at.
        "<br>"."<b>"."COMPRADOR"."</b>"."<br>".
        "Usuario de nombre: ".$user_name."<br>".
        "Identificado con el correo: ".$user_email."<br>"."<b>".
        "AUTOMÓVIL COMPRADO"."</b>"."<br>"."Carro #: ".$car_id."<br>".
        "Carro marca: ".$car_brand."<br>"."Carro modelo: ".$car_model."<br>".
        "Identificado con la placa: ".$car_license_plate."<br>"."<b>".
        "TOTAL A PAGAR"."</b>"."<br>"."Precio total: ".$total_price."$ (USD)"."<br>";

        $pdf->loadHTML($cadena);
        
        
        
        return $pdf->download('Order.pdf');
    }


    public function cancel($data) 
    {
        return redirect('/car');
    }

    



}