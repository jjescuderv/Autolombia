@extends('layouts.master')
@section("title", 'Show all')
@section('content')
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if(empty($data["cars"]->toArray()))
                {{ __('app.dbempty') }}
            @endif
            @foreach($data["cars"] as $car)
            <a href="{{ route('car.show', $car->getId()) }}">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="col-lg-4" style="float:left">
                            <img src="{{ asset('storage/' . $car->getImagePath()) }}" 
                            style="height: 100%; width: 100%; object-fit: contain;">
                        </div>
                        <div class="col-lg-8" style="float:left">
                            <h3 class="card-title"> {{ $car->getBrand() . ' ' .  $car->getModel() }} </h3>
                            <h4> {{ '$' . $car->getPrice() }} </h4>
                            <p class="card-text"> {{ __($car->getDescription()) }} </p>
                            <i class="fas fa-tachometer-alt" style="font-size:25px; float:left; margin: 0 10px 0 0"></i> {{ $car->getMileage() . ' miles'}}
                        </div>
                    </div>
                </div>
            </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
