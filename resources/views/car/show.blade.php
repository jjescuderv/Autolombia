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
                            Car id: {{ $data["car"]->getId() }}
                        </div>
                        <div class="col">
                            @guest
                                <a class="btn btn-info btn-xs float-right" href="{{ route('login') }}" > Login to buy </a>
                            @else
                                <a class="btn btn-info btn-xs float-right" href="{{ route('order', $data['car']->getId()) }}" > Buy </a>
                            @endguest
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col"><b>Brand: </b></div>
                        <div class="col"> {{ $data["car"]->getBrand() }} </div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Model: </b></div>
                        <div class="col"> {{ $data["car"]->getModel() }} </div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Color: </b></div>
                        <div class="col"> {{ $data["car"]->getColor() }} </div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Price: </b></div>
                        <div class="col"> {{ $data["car"]->getPrice() }} </div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Mileage: </b></div>
                        <div class="col"> {{ $data["car"]->getMileage() }} </div>
                    </div>
                    <div class="row">
                        <div class="col"><b>License Plate: </b></div>
                        <div class="col"> {{ $data["car"]->getLicensePlate() }} </div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Description: </b></div>
                        <div class="col"> {{ $data["car"]->getDescription() }} </div>
                    </div>
                    <div class="row">
                        <div class="col"><b>Availability: </b></div>
                        <div class="col"> 
                            @if($data["car"]->getAvailability())
                                Available
                            @else
                                Not Available
                            @endif
                        </div>
                    </div>
                    <!-- Questions -->
                    <div class="card auction-car-info">
                        <div class="card-header">
                            Questions
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('car.question', $data['car']->getId()) }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Enter question" 
                                         name="question" value="{{ old('question') }}" >
                                        <input class="form-control" type="hidden" name="car_id" value="{{ $data['car']->getId() }}" >
                                    </div>
                                    <div class="col-sm-2">
                                        @guest
                                            <a class="btn btn-info btn-xs float-right" href="{{ route('login') }}" > Login </a>
                                        @else
                                            <input type="submit" class="btn btn-info" value="Post">
                                        @endguest
                                    </div>
                                </div>
                            </form>
                            <ul>
                                @foreach($data["questions"] as $question)
                                    <li>
                                        {{ $question->getQuestion() }}
                                        <ul>
                                            @foreach($question->answers as $answer)
                                                <li>
                                                    {{ $answer->getAnswer() }}
                                                </li>
                                            @endforeach    
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection