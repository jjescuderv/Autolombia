@extends('layouts.master')
@section('content')
  <html>
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no" />
      <title>Home</title>
    </head>
    <body id="page-top">
      <header class="masthead bg-primary text-white text-center">
        <div class="container">
       
            <h1 class="text-secondary">{{ $data["name"] }} </h1>
            <hr class="star-light"/>
            <div class="row">
              <div class="col-6 text-right">
                <p class="text-right text-secondary">Autolombia Id:</p>
                <p class="text-secondary">Email:</p>
                <p class="text-secondary">Compras:</p>
                <p class="text-secondary">Saldo disponible (USD):</p>
            </div>
            <div class="col text-left">
              <p class="text-secondary">{{ $data["id"] }}</p>
              <p class="text-secondary">{{ $data["email"] }}</p>
              <p class="text-secondary">{{ $data["compras"] }}</p>
              <p class="text-secondary">{{ $data["saldo"] }} $</p>
            </div>
          </div>
        </div>
      </header>
    </body>
  </html>
@endsection
