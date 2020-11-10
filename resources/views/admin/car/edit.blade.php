@extends('layouts.admin_master')
@section("title", 'Edit')
@section('content')
<div style="background-color:#6c757d; text-align: center; padding: 10px 0">
    <h3 style="color: white">{{ __('app.car_edit_title') . ' ' . $data['car']->getId() }}</h3>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11 mt-3 mb-5">
        @include('util.message')
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form id="edit_car" method="POST" action="{{ route('admin.car.update', $data['car']->getId()) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.brand')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="brand" value="{{ $data['car']->getBrand() }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.model')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="model" value="{{ $data['car']->getModel() }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.color')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="color" value="{{ $data['car']->getColor() }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.price')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="price" value="{{ $data['car']->getPrice() }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.mileage')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="mileage" value="{{ $data['car']->getMileage() }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.description')}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" placeholder="{{__('app.phdescription')}}" 
                                rows=4 name="description" value="{{ old('description') }}" >{{ $data['car']->getDescription() }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.availability')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="availability" value="{{ old('availability') }}" >
                                    @if($data["car"]->getAvailability())
                                        <option value="1" selected>{{__('app.available')}}</option>
                                        <option value="0">{{__('app.not_available')}}</option>
                                    @else
                                        <option value="1">{{__('app.available')}}</option>
                                        <option value="0" selected>{{__('app.not_available')}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.license_plate')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="license_plate" value="{{ $data['car']->getLicensePlate() }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.image')}}</label>
                            <div class="col-sm-10">
                                <input type="file" id="selectedFile" style="display: none;" name="image">
                                <input type="button" value="{{__('app.search')}}" onclick="document.getElementById('selectedFile').click();">
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-info" value="{{__('app.save')}}" form="edit_car">
                            <a class="btn btn-danger btn-xs" href="{{ route('admin.car.show', $data['car']->getId()) }}" >{{__('app.cancel')}}</a>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection