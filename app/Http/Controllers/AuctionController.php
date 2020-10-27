<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Auction;

//Juan José Escudero

class AuctionController extends Controller 
{
    
    public function show($id) 
    {
        $data = [];
        $auction = Auction::findOrFail($id);
        $data["auction"] = $auction;

        return view('auction.show')->with("data", $data);
    }

    public function showAll() 
    {
        $data = [];
        $data["auctions"] = Auction::with("car")->get();
        
        return view('auction.show_all')->with("data", $data);
    }
    
}