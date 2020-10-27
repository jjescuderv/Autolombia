<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

//Juan José Escudero

class Bid extends Model 
{
    // Attributes id, date, bid_value, auction_id, user_id, created_at, updated_at
    protected $fillable = ['date', 'bid_value', 'auction_id', 'user_id'];

    public static function validate(Request $request) 
    {
        $request -> validate([
            "date" => "required|date",
            "bid_value" => "required|numeric|gt:0",
            "auction_id" => "required|numeric|gt:0",
            "user_id" => "required|numeric|gt:0"
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

    public function getDate() 
    {
        return $this->attributes['date'];
    }

    public function setDate($date) 
    {
        $this->attributes['date'] = $date;
    }

    public function getBidValue() 
    {
        return $this->attributes['bid_value'];
    }

    public function setBidValue($bidValue) 
    {
        $this->attributes['bid_value'] = $bidValue;
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

}
