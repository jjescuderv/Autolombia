@extends('layouts.admin_master')
@section("title", 'Show all')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 padding-admin">
            <div class="card">
                <div class="card-header">Cars</div>
                    <div class="card-body" id="card-body-all">
                        @if(empty($data["cars"]->toArray()))
                            The database is empty!
                        @endif
                        @foreach($data["cars"] as $car)
                            <a href="{{ route('admin.car.show', $car->getId()) }}">
                            <div class="row" id="row-all">  
                                <div class="col-2"> 
                                    {{ $car->getId() }} 
                                </div>
                            
                                <div class="col-7">
                                    {{ $car->getBrand() }} {{ $car->getModel() }} <br/>
                                    {{ $car->getColor() }} <br/>
                                    Price: {{ $car->getPrice() }}
                                </div>

                                <div class="col-3">
                                    @if($car->getAvailability())
                                        Available
                                    @else
                                        Unavailable
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
