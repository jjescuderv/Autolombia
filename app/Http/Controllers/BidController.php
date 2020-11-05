<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Bid;
use DB;

//Juan José Escudero

class BidController extends Controller 
{

    public function save(Request $request)
    {
        Bid::validate($request);
        Bid::create(
            $request->only([
                "bid_value", "auction_id", 'user_id'
            ])
        );

        return back()->with('success', 'Bid created!');
    }

}