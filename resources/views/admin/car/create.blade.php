@extends('layouts.admin_master')
@section("title", 'Create')
@section('content')
<div style="background-color:#6c757d; text-align: center; padding: 10px 0">
    <h3 style="color: white">{{ __('app.car_create_title') }}</h3>
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
                    <form id="create_car" method="POST" action="{{ route('admin.car.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.brand')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="{{__('app.phbrand')}}" 
                                 name="brand" value="{{ old('brand') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.model')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="{{__('app.phmodel')}}" 
                                 name="model" value="{{ old('model') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.color')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="{{__('app.phcolor')}}" 
                                 name="color" value="{{ old('color') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.price')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" placeholder="{{__('app.phprice')}}" 
                                 name="price" value="{{ old('price') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.mileage')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" placeholder="{{__('app.phmileage')}}" 
                                 name="mileage" value="{{ old('mileage') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.description')}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" placeholder="{{__('app.phdescription')}}" 
                                 rows=4 name="description" value="{{ old('description') }}" >{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.availability')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="availability" value="{{ old('availability') }}" >
                                    <option value="1">{{__('app.available')}}</option>
                                    <option value="0">{{__('app.not_available')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.license_plate')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="{{__('app.phlicense_plate')}}" 
                                 name="license_plate" value="{{ old('license_plate') }}" >
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
                            <input type="submit" class="btn btn-success" value="{{__('app.create')}}" form="create_car">
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection