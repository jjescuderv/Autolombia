@extends('layouts.master')
@section("title", 'Show all')
@section('content')
</header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 padding-admin">
            <div class="card">
                <div class="card-header">Auctions</div>
                <div class="card-body" id="card-body-all">
                    @if(empty($data["auctions"]->toArray()))
                    {{ __('app.dbempty') }}
                    @endif
                    @foreach($data["auctions"] as $auction)
                    <a href="{{ route('auction.show', $auction->getId()) }}">
                        <div class="row" id="row-all">
                            <div class="card-body">
                                <div class="col-lg-4" style="float:left">
                                    <img src="{{ asset('storage/' . $auction->car->getImagePath()) }}"
                                        style="height: 100%; width: 100%; object-fit: contain;">
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

                                <div class="col-lg-8" style="float:right">

                                    @if($auction->getState())
                                    <p class="card-text" style="float:left">{{('Active')}} </p>
                                    @else
                                    <p class="card-text" style="float:left"> {{('Inactive')}}</p>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection