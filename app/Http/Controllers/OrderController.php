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
        
        return view('order')->with("data", $data);
    }
    
    
    public function save(Request $request) 
    {
        Order::validate($request);
        Order::create(
            $request->only([
                "total_price","car_id","user_id"
            ])
        );

        $data = [];
        $data["car_id"] = $request->input('car_id');

        
        
        return view('/home/successbuy')->with("data", $data);

    }

    public function download($id)
    {
        $order = Order::where('car_id', $id)->get();
        echo $order[0]["id"];
        $order_id = $order[0]["id"];
        $user_id = $order[0]["user_id"];
        $car_id = $order[0]["car_id"];
        $total_price =$order[0]["total_price"];
        $created_at =$order[0]["created_at"];
        
        $pdf = app('dompdf.wrapper');
        $cadena = "Factura #: ".$order_id."<br>"."Usuario identificado con el id: ".$user_id."<br>"."Carro #: ".$car_id."<br>"."Precio total: ".$total_price." $(USD)<br>"."Fecha de compra: ".$created_at."<br>";

        $pdf->loadHTML($cadena);
        
        //Car::where('id', $data["car_id"])->delete();
        
        return $pdf->download('Order.pdf');
    }


    public function cancel($data) 
    {
        return redirect('/car');
    }

    



}