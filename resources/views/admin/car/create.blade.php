@extends('layouts.admin_master')
@section("title", 'Create')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 padding-admin">
        @include('util.message')
            <div class="card">
                <div class="card-header">Create car</div>
                    <div class="card-body">
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="POST" action="{{ route('admin.car.save') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Brand </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter brand" 
                                     name="brand" value="{{ old('brand') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Model </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter model" 
                                     name="model" value="{{ old('model') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Color </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter color" 
                                     name="color" value="{{ old('color') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Price </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" placeholder="Enter price" 
                                     name="price" value="{{ old('price') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Mileage </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" placeholder="Enter mileage" 
                                     name="mileage" value="{{ old('mileage') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Description </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" type="text" placeholder="Enter description" 
                                     rows=2 name="description" value="{{ old('description') }}" ></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Availability </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="availability" value="{{ old('availability') }}" >
                                        <option value="1">Available</option>
                                        <option value="0">Not available</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Plate </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Enter license plate" 
                                     name="license_plate" value="{{ old('license_plate') }}" >
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