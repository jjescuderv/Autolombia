<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

//Juan José Escudero

class Auction extends Model 
{
    // Attributes id, reserve_price, beginning, ending, state, car_id, created_at, updated_at
    protected $fillable = ['reserve_price', 'beginning', 'ending', 'state', 'car_id'];

    public static function validate(Request $request) 
    {
        $request -> validate([
            "reserve_price" => "required|numeric|gt:0",
            "beginning" => "required|date",
            "ending" => "required|date",
            "state" => "required|boolean",
            "car_id" => "required|numeric|gt:0"
        ]);
    }

    public function getId() 
    {
        return $this->attributes['id'];
    }

    public function setId($id) 
    {
        $this->attributes['id'] = $id;
    }

    public function getReserve() 
    {
        return $this->attributes['reserve'];
    }

    public function setReserve($reserve) 
    {
        $this->attributes['reserve'] = $reserve;
    }

    public function getReservePrice() 
    {
        return $this->attributes['reserve_price'];
    }

    public function setReservePrice($reservePrice) 
    {
        $this->attributes['reserve_price'] = $reservePrice;
    }

    public function getBeginning() 
    {
        return $this->attributes['beginning'];
    }

    public function setBeginning($beginning) 
    {
        $this->attributes['beginning'] = $beginning;
    }

    public function getEnding() 
    {
        return $this->attributes['ending'];
    }

    public function setEnding($ending) 
    {
        $this->attributes['ending'] = $ending;
    }

    public function getState() 
    {
        return $this->attributes['state'];
    }

    public function setState($state) 
    {
        $this->attributes['state'] = $state;
    }

    public function car() 
    {
        return $this->belongsTo(Car::class);
    }

    public function bids() {
        return $this->hasMany(Bid::class);
    }

}
