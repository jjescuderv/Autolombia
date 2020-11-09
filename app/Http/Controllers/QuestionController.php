<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;

// Andrew Pérez
// Juan José Escudero

class QuestionController extends Controller
{

    public function save(Request $request)
    {
        Question::validate($request);
        Question::create(
            $request->only([
                "question", "car_id", "user_id"
            ])
        );

        return back()->with('success', 'Question posted!');
    }

    public function delete($id)
    {
        Question::where('id', $id)->delete();
        
        return redirect()->route('car.index');
    }

}
