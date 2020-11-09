@extends('layouts.master')
@section("title", 'Show all')
@section('content')
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
                                <div class="col-2"> 
                                    {{ $auction->getId() }} 
                                </div>
                            
                                <div class="col-7">
                                    {{ $auction->car->getColor() . " " . $auction->car->getBrand() . " " . $auction->car->getModel()}} <br/>
                                    {{ $auction->getBeginning() . " to " .  $auction->getEnding() }} <br/>
                                    Reserve price: {{ $auction->getReservePrice() }}
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
