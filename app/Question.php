<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

//Andrew Pérez

class Question extends Model
{
    //attributes id, question, created_at, updated_at
    protected $fillable = ['question', 'car_id'];

    public static function validate(Request $request)
    {
        $request->validate([
            "question" => "required",
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

    public function getQuestion()
    {
        return $this->attributes['question'];
    }

    public function setQuestion($question)
    {
        $this->attributes['question'] = $question;
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
}
