<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Answer;

//Juan José Escudero

class AdminQuestionController extends Controller
{

    public function answer(Request $request)
    {
        Answer::validate($request);
        Answer::create(
            $request->only([
                "answer", "question_id"
            ])
        );

        return back()->with('success', 'Answer posted!');
    }

    // Sin hacer
    public function delete($id)
    {
        Answer::where('id', $id)->delete();
        
        return redirect()->route('car.index');
    }

}