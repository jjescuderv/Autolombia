@extends('layouts.master')
@section("title", 'Show')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 padding-admin">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            Auction id: {{ $data["auction"]->getId() }}
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
                            Car information
                        </div>
                        <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection