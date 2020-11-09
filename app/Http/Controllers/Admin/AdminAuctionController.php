<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Auction;
use App\Car;

//Juan José Escudero
//Andrew Perez

class AdminAuctionController extends Controller 
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
    
    public function show($id) 
    {
        $data = [];
        $auction = Auction::findOrFail($id);
        $data["auction"] = $auction;

        return view('admin.auction.show')->with("data", $data);
    }

    public function showAll() 
    {
        $data = [];
        $auctions = Auction::with("car")->get();
        $data["auctions"] = $auctions;
        
        return view('admin.auction.show_all')->with("data", $data);
    }

    public function create() 
    {
        $data = [];
        $cars = Car::where('availability',1)->get();
        $data["cars"] = $cars;
        return view('admin.auction.create')->with("data", $data);
    }

    public function save(Request $request) 
    {
        Auction::validate($request);
        $car = Car::findOrFail($request->input('car_id'));
        $car->setAvailability(0);
        $car->save();
        
        Auction::create(
            $request->only([
                "reserve_price", "beginning", "ending", "state", "car_id"
            ])
        );

        return back()->with('success', 'Auction created succesfully!');
    }

    public function edit($id)
    {
        $data = [];
        $auction = Auction::findOrFail($id);
        $data["auction"] = $auction;
        $cars = Car::all();
        $data["cars"] = $cars;

        return view('admin.auction.edit')->with("data", $data);
    }

    public function update(Request $request, $id)
    {
        Auction::validate($request);
        Auction::find($id)->update($request->all());

        return back()->with('success', 'Auction updated succesfully!');
    }

    public function delete($id) 
    {
        Auction::where('id', $id)->delete();
        
        return redirect()->route('admin.auction.index');
    }
    
}