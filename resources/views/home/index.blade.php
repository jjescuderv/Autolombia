@extends('layouts.master')

@section('content')
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-car"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                
                <p class="masthead-subheading font-weight-bold mb-0"> {!! __('app.welcome_msg') !!} </p>
                </div>
        </header>

<section class="page-section portfolio" id="portfolio">
    <div class="container">

        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"> {{ __('app.welcome_cars') }} </h2>
        <hr/>

        <div class="row">
            @foreach($data["cars"] as $car)
                <div class="col-md-6 col-lg-4 mb-5 justify-content-center">
                    <div class="card-header text-center text-uppercase text-secondary mb-0">
                        <h5 class="car-title"> {{ $car->getBrand() . ' ' . $car->getModel() }} </h5>
                        <h5 class="car-title"> {{ 'USD ' . $car->getPrice() }} </h5>
                    </div>
                    <a href="{{ route('car.show', $car->getId()) }}">
                    <div class="portfolio-item mx-auto" data-toggle="modal">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-shopping-cart fa-3x"></i>
                            </div>
                        </div>
                        <a href="{{ route('car.show', $car->getId()) }}">
                            <img class="img-fluid" src="{{ asset('storage/' . $car->getImagePath()) }}" alt="" />
                        </a>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>

        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"  style="margin-top:75px"> {{ __('app.welcome_auctions') }} </h2>
        <hr/>

        <div class="row">
            @foreach($data["auctions"] as $auction)
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="card-header text-center text-uppercase text-secondary mb-0">
                    <h5 class="car-title"> {{ $auction->car->getBrand() . ' ' . $auction->car->getModel() }} </h5>
                    <h5 class="car-title"> {{ __('app.welcome_auctions_sub') . $auction->getReservePrice() }} </h5>
                </div>
                <a href="{{ route('auction.show', $auction->getId()) }}">
                <div class="portfolio-item mx-auto" data-toggle="modal">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white">
                            <i class="fas fa-gavel fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="{{ asset('storage/' . $auction->car->getImagePath()) }}" alt="" />
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection