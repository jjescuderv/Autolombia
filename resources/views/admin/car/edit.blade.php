@extends('layouts.admin_master')
@section("title", 'Edit')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 padding-admin">
        @include('util.message')
            <div class="card">
                <div class="card-header">Update car id: {{ $data["car"]->getId() }}</div>
                    <div class="card-body">
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="POST" action="{{ route('admin.car.update', $data['car']->getId()) }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Brand </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="brand" value="{{ $data['car']->getBrand() }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Model </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="model" value="{{ $data['car']->getModel() }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Color </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="color" value="{{ $data['car']->getColor() }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Price </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="price" value="{{ $data['car']->getPrice() }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Mileage </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="mileage" value="{{ $data['car']->getMileage() }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Description </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="description" value="{{ $data['car']->getDescription() }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Availability </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="availability" value="{{ old('availability') }}" >
                                        @if($data["car"]->getAvailability())
                                            <option value="1" selected>Available</option>
                                            <option value="0">Not available</option>
                                        @else
                                            <option value="1">Available</option>
                                            <option value="0" selected>Not available</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> Plate </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="license_plate" value="{{ $data['car']->getLicensePlate() }}" >
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-info" value="Save changes">
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection