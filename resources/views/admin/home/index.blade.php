@extends('layouts.admin_master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 padding-admin">
            <div class="card">
                <div class="card-header"> {{ __('app.admin') }} </div>

                <div class="card-body">
                    {{ __('app.admin_welcome') }} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection