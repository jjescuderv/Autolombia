@extends('layouts.admin_master')
@section("title", 'Create')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 padding-admin">
        @include('util.message')
            <div class="card">
                <div class="card-header">Create auction</div>
                    <div class="card-body">
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="POST" action="{{ route('admin.auction.save') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Reserve price </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" placeholder="Enter reserve price" 
                                     name="reserve_price" value="{{ old('reserve_price') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Beginning </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" placeholder="Enter beginning date" 
                                     name="beginning" value="{{ old('beginning') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Ending </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" placeholder="Enter ending date" 
                                     name="ending" value="{{ old('ending') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> State </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="state" value="{{ old('state') }}" >
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Car </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="car_id" value="{{ old('car_id') }}" >
                                        @foreach($data["cars"] as $car)
                                            <option value="{{ $car->getId() }}"> 
                                                {{ $car->getId() . ". " . $car->getBrand() . " " . $car->getModel() }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" value="Create">
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection