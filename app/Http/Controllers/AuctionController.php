<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Auction;
use App\User;

//Juan José Escudero
class AuctionController extends Controller 
{
    
    public function show($id) 
    {
        $data = [];
        $auction = Auction::findOrFail($id);
        $data["auction"] = $auction;

        
        $user = Auth::user();
        $data["user"] = $user;
        $bids = $auction->bids;

        $highestBid = new Auction();
        $highestBidValue = 0;
        foreach($bids as $bid) {
            if($bid->getBidValue() > $highestBidValue) {
                $highestBid = $bid;
                $highestBidValue = $bid->getBidValue();
                $userid = $bid->getUserId();
                $user2 = User::findOrFail($userid);
                $data["userwin"] = $user2;
            }
        }

        $data["bid"] = $highestBid;

        return view('auction.show')->with("data", $data);
    }

    public function showAll() 
    {
        $data = [];
        $data["auctions"] = Auction::with("car")->get();
        return view('auction.show_all')->with("data", $data);
    }
    
}