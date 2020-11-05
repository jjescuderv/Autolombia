<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Answer;

//Juan José Escudero
class AdminQuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->getRole()=="client"){
                return redirect()->route('home.index');
            }

            return $next($request);
        });
    }

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