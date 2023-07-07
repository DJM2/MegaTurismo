@extends('layouts.app')
@section('titulo', 'Inicio')
@section('contenido')
    <div class="custom-container-2">
        <img src="{{ asset('img/fondos/destinies-peru.webp') }}" alt="Peru Mega Turismo">
        <h1>Destinies Perú</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($destinos as $destiny)
                <div class="col-lg-4 mb-4">
                    <div class="card mx-auto" style="width: 22rem;">
                        <img class="card-img-top" src="{{ asset('img/destinos/Thumbs/' . $destiny->imgThumb) }}"
                            alt="{{ $destiny->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $destiny->nombre }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="{{ route('destinies.show', $destiny->slug) }}" class="cardBtn btn btn-primary">View
                                destiny</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
