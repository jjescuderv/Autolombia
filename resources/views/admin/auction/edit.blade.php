@extends('layouts.admin_master')
@section("title", 'Edit')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 padding-admin">
        @include('util.message')
            <div class="card">
                <div class="card-header">Update auction id: {{ $data["auction"]->getId() }}</div>
                    <div class="card-body">
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="POST" action="{{ route('admin.auction.update', $data['auction']->getId()) }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Reserve Price </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="reserve_price" value="{{ $data['auction']->getReservePrice() }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Beginning </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" name="beginning" value="{{ substr($data['auction']->getBeginning(), 0, 10) }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Ending </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" name="ending" value="{{ substr($data['auction']->getEnding(), 0, 10) }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> State </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="state" value="{{ old('state') }}" >
                                        @if($data["auction"]->getState())
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        @else
                                            <option value="1">Active</option>
                                            <option value="0" selected>Inactive</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Car </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="car_id" value="{{ old('car_id') }}" >
                                        @foreach($data["cars"] as $car)
                                            @if($data["auction"]->car == $car)
                                                <option value="{{ $car->getId() }}" selected> 
                                                    {{ $car->getId() . ". " . $car->getBrand() . " " . $car->getModel() }} 
                                                </option>
                                            @else
                                                <option value="{{ $car->getId() }}"> 
                                                    {{ $car->getId() . ". " . $car->getBrand() . " " . $car->getModel() }} 
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" value="Save changes">
                                <a class="btn btn-danger btn-xs" href="{{ route('admin.auction.show', $data['auction']->getId()) }}" > Cancel </a>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection