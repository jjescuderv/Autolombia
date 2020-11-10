@extends('layouts.admin_master')
@section("title", 'Show')
@section('content')
<div style="background-color:#6c757d; text-align: center; padding: 10px 0">
    <h3 style="color: white">{{ __('app.show_car') . ' ' . $data['car']->getId() }}</h3>
    <a class="btn btn-info btn-xs" href="{{ route('admin.car.edit', $data['car']->getId()) }}"> 
        <h4 class="d-inline"> {{ __('app.edit') }} </h4>
        <i class="fas fa-edit" style="font-size:20px; margin:auto"></i>
    </a>
</div>
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7">
                    <h3 class="card-title"> {{  'ID: ' . ' ' . $data['car']->getId() }} </h3>
                    <h3 class="card-title"> {{  $data['car']->getBrand() . ' ' . $data['car']->getModel() }} </h3>
                </div>
                <div class="col-lg-5">
                    <div class="col">
                        <form method="POST" action="{{ route('admin.car.delete', $data['car']->getId()) }}">
                            <input type="submit" class="btn btn-danger float-right" value="{{ __('app.delete') }}">
                            @method('delete')
                            @csrf
                        </form>
                    </div> 
                </div>
                <hr style="width:95%">
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <img src="{{ asset('./storage/' . $data['car']->getImagePath()) }}" 
                    style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="col-lg-5">
                    <p class="card-body">
                        @if($data['car']->getAvailability()) 
                            <b> {{ __('app.availability') . ': ' }} </b> {{ __('app.available') }} <br/>
                        @else
                            <b> {{ __('app.availability') . ': ' }} </b> {{ __('app.not_available') }} <br/>
                        @endif
                        <b> {{ __('app.mileage') . ': ' }} </b> {{ $data['car']->getMileage() . ' ' . __('app.miles') }} <br/>
                        <b> {{ __('app.price') . ': ' }} </b> {{ $data['car']->getPrice() }} <br/>
                        <b> {{ __('app.color') . ': ' }} </b> {{ $data['car']->getColor() }} <br/>
                        <b> {{ __('app.license_plate') . ': ' }} </b> {{ $data['car']->getLicensePlate() }} <br/>
                        <b> {{ __('app.description') . ': ' }} </b> {{  $data['car']->getDescription() }} 
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="col-lg-12">
                <h4 class="card-title d-flex justify-content-center"> {{ __('app.questions_title') }} </h4>
                <hr style="width:100%">
            </div>
            <ul>
                @foreach($data["questions"] as $question)
                <div class="col-lg-12">
                    <li>
                        <form method="POST" action="{{ route('car.question.delete', $question->getId()) }}">
                            {{ $question->getQuestion() }}
                            <b> {{ __('app.questions_by') . $question->user->getName() }} </b>
                            <input type="submit" class="btn btn-danger float-right" value="{{ __('app.questions_delete') }}">
                            @method('delete')
                            @csrf
                        </form>

                        <ul>
                            <div class="card-body">
                                @if(!empty($question->answers->toArray()))
                                    <h6> {{ __('app.answers_title') }} </h6>
                                @endif
                                @foreach($question->answers as $answer)
                                    <li>
                                        {{ $answer->getAnswer() }}
                                    </li>
                                @endforeach  
                            </div>  
                            <form method="POST" action="{{ route('car.answer', $question->getId()) }}">
                            @csrf
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Enter answer"
                                         name="answer" value="{{ old('question') }}">
                                        <input class="form-control" type="hidden" name="question_id"
                                         value="{{ $question->getId() }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="submit" class="btn btn-info" value="{{ __('app.post') }}">
                                    </div>
                                </div>
                            </form>
                        </ul>
                    </li>
                </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection