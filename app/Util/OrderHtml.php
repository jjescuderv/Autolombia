<?php
//Andrew Perez
namespace App\Util;

use App\Orders\OrderStorage;
use Illuminate\Support\Facades\Storage;
use App\Order;
use App\Car;
use App\User;

class OrderHtml implements OrderStorage
{
    public function store($id)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

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

        $cadena = "<b>"."AUTOLOMBIA S.A.S"."</b>".
        "<br>"."Factura #: ".$order_id."<br>"."Fecha de facturación: ".$created_at.
        "<br>"."<b>"."COMPRADOR"."</b>"."<br>".
        "Usuario de nombre: ".$user_name."<br>".
        "Identificado con el correo: ".$user_email."<br>"."<b>".
        "AUTOMÓVIL COMPRADO"."</b>"."<br>"."Carro #: ".$car_id."<br>".
        "Carro marca: ".$car_brand."<br>"."Carro modelo: ".$car_model."<br>".
        "Identificado con la placa: ".$car_license_plate."<br>"."<b>".
        "TOTAL A PAGAR"."</b>"."<br>"."Precio total: ".$total_price."$ (USD)"."<br>"; 

        $text = $section->addText($cadena);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');

        try {
            $objWriter->save(storage_path('Order.html'));
        } catch (Exception $e) {
        }
        return response()->download(storage_path('Order.html'));
    }

}