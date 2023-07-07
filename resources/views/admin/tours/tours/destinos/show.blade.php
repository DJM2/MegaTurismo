@extends('layouts.app')
@section('titulo', $destino->nombre)
@section('contenido')
    <div class="custom-container-2">
        <img src="{{ asset('img/destinos/' . $destino->img) }}" alt="{{ $destino->nombre }}">
        <h1 class="title">{{ $destino->nombre }}</h1>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="migas mb-2 mt-2 d-flex align-items-center justify-content-center">
                    <span><a href="{{ route('index') }}">Home</a></span>
                    <span><a href="">→ Destinies </a> </span>
                    <span><a>→ {{ $destino->nombre }}</a></span>
                </div>
            </div>
            <div class="col-lg-12 text-justify">
                <h3>{{ $destino->nombre }}</h3>
                {!! $destino->descripcion !!}
            </div>
            <div class="col-lg-12">
                <h3>Tours con destino {{ $destino->nombre }}:</h3>
                <div class="row">
                    @foreach ($tours as $tour)
                        <div class="col-lg-3">
                            <div class="card-deck">
                                <div class="card">
                                    <img class="card-img-top" src="{{ asset($tour->imgThumb) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$tour->nombre}}</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>
                                        <a href="{{ route('tour.show', ['slug' => $tour->slug]) }}" class="cardBtn">More details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
@endsection
