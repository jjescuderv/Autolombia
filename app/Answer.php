<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Question;

//Andrew Pérez

class Answer extends Model
{
    //attributes id, answers, question_id, created_at, updated_at
    protected $fillable = ['answer', 'question_id'];

    public static function validate(Request $request)
    {
        $request->validate([
            "answer" => "required",
            "question_id" => "required|numeric|gt:0"
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

    public function getAnswer()
    {
        return $this->attributes['answer'];
    }

    public function setAnswer($ans)
    {
        $this->attributes['answer'] = $ans;
    }

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
    
}
