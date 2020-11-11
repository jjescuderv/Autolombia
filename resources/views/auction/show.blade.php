@extends('layouts.master')
@section("title", 'Show')
@section('content')
</header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 padding-admin">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                        <h4 class="card-title">Auction id: {{ $data["auction"]->getId() }} </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col"><b>Reserve price: </b></div>
                        <div class="col"> {{ $data["auction"]->getReservePrice() }} </div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Beginning date: </b></div>
                        <div class="col"> {{ $data["auction"]->getBeginning() }} </div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Ending date: </b></div>
                        <div class="col"> {{ $data["auction"]->getEnding() }} </div>
                    </div>
                    <div class="row">
                        <div class="col"><b>State: </b></div>
                        <div class="col">
                            @if($data["auction"]->getState())
                            Active
                            @else
                            Inactive
                            @endif
                        </div>
                    </div>
                    <!-- Car information -->
                    <div class="card auction-car-info">
                        <div class="card-header">
                        <h6 class="card-title">Car information </h6>
                        </div>
                        <div class="card-body">
                        <br>
                            <div class="col-lg-4" style="float:center">
                                <img src="{{ asset('storage/' . $data["auction"]->car->getImagePath()) }}" 
                                style="height: 100%; width: 200%; object-fit: contain;">
                            </div>
                        </br>
                            <div class="row">
                                <div class="col"><b>Id: </b></div>
                                <div class="col"> {{ $data["auction"]->car->getId() }} </div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Brand: </b></div>
                                <div class="col"> {{ $data["auction"]->car->getBrand() }} </div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Model: </b></div>
                                <div class="col"> {{ $data["auction"]->car->getModel() }} </div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Color: </b></div>
                                <div class="col"> {{ $data["auction"]->car->getColor() }} </div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Price: </b></div>
                                <div class="col"> {{ $data["auction"]->car->getPrice() }} </div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Mileage: </b></div>
                                <div class="col"> {{ $data["auction"]->car->getMileage() }} </div>
                            </div>
                            <div class="row">
                                <div class="col"><b>License Plate: </b></div>
                                <div class="col"> {{ $data["auction"]->car->getLicensePlate() }} </div>
                            </div>
                            <div class="row">
                                <div class="col"><b>Description: </b></div>
                                <div class="col"> {{ $data["auction"]->car->getDescription() }} </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bids -->
                    <div class="card auction-car-info">
                        <div class="card-header">
                            @if(!empty($data["bid"]->toArray()))
                                Highest bid: {{ $data["bid"]->getBidValue() . " User: " . $data["userwin"]->getName() ." Email: ". $data["userwin"]->getEmail() }}
                            @else
                                Be the first bidder!
                            @endif
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('auction.bid', $data['auction']->getId()) }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" placeholder="Enter bid value"
                                            name="bid_value" value="{{ old('bid_value') }}">
                                        <input class="form-control" type="hidden" name="auction_id"
                                            value="{{ $data['auction']->getId() }}">
                                        @guest
                                        @else
                                        <input class="form-control" type="hidden" name="user_id"
                                            value="{{ $data['user']->getId() }}">
                                        @endguest
                                    </div>
                                    <div class="col-sm-2">
                                        @guest
                                        <a class="btn btn-info btn-xs float-right" href="{{ route('login') }}">
                                            Login
                                        </a>
                                        @else
                                        <input type="submit" class="btn btn-info" value="Bid">
                                        @endguest
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection