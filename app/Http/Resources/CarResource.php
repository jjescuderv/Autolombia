<?php
//Jhonatan Acevedo
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            "brand" => $this->getBrand(),
            "model" => $this->getModel(),
            "color" => $this->getColor(),
            "price" => $this->getPrice(),
            "mileage" => $this->getMileage(),
            "description" => $this->getDescription(),
            "availability" => $this->getAvailability(),
            "license_plate" => $this->getLicensePlate(),
        ];
    }
}
