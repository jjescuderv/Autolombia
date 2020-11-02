<?php
//Jhonatan Acevedo Castrillón
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;



class Order extends Model 
{
    // Attributes id, total_price, created_at, updated_at, user_id
    protected $fillable = ['id','total_price',"user_id"];

    public static function validate(Request $request) 
    {
        $request -> validate([
            "id" => "required",
            "total_price" => "required",
            "user_id" => "required",
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

    public function getTotalPrice() 
    {
        return $this->attributes['total_price'];
    }

    public function setTotalPrice($total_price) 
    {
        $this->attributes['total_price'] = $total_price;
    }

    public function getUserId() 
    {
        return $this->attributes['user_id'];
    }

    public function setUserID($user_id) 
    {
        $this->attributes['user_id'] = $user_id;
    }


    public function getDate() 
    {
        return $this->attributes['created_at'];
    }


    public function car() 
    {
        return $this->hasOne(Car::class);
    }

    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

}
