@extends('layouts.admin_master')
@section("title", 'Show all')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 padding-admin">
            <div class="card">
                <div class="card-header">Auctions</div>
                
                <a href="{{ route('admin.auction.create') }}" class="btn btn-info"> New auction </a>
                    <div class="card-body" id="card-body-all">
                        @if(empty($data["auctions"]->toArray()))
                            The database is empty!
                        @endif
                        @foreach($data["auctions"] as $auction)
                            <a href="{{ route('admin.auction.show', $auction->getId()) }}">
                            <div class="row" id="row-all"> 
                                <div class="col-2"> 
                                    {{ $auction->getId() }} 
                                </div>

                                <div class="col-lg-4" style="float:center">
                                    <img src="{{ asset('storage/' . $auction->car->getImagePath()) }}" 
                                    style="height: 100%; width: 200%; object-fit: contain;">
                                </div>

                                <div class="col-lg-8" style="float:left">
                                    <h3 class="card-title"> {{ $auction->car->getBrand() . ' ' .
                                        $auction->car->getModel() }} </h3>
                                    <h5> {{ $auction->car->getColor() }} </h5>
                                    @if($auction->bids->max('bid_value') == NULL)
                                    <h4> Reserve price: {{ '$' . $auction->getReservePrice()}} </h4>
                                    @else
                                    <h4> Highest bid: {{ '$' . $auction->bids->max('bid_value') }} </h4>
                                    @endif
                                    <p class="card-text"> {{ __( $auction->getBeginning() . " to " .
                                        $auction->getEnding()) }} </p>
                                    <i class="fas fa-tachometer-alt"
                                        style="font-size:25px; float:left; margin: 0 10px 0 0"></i> {{
                                    $auction->car->getMileage() . ' miles'}} 
                                </div>

                                <div class="col-3">
                                    @if($auction->getState())
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </div>
                            </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
