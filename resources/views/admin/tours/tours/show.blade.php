@extends('layouts.app')
@section('titulo', 'Inicio')
@section('contenido')

    <div class="container-fluid custom-container">
        <img src="{{ asset($tour->img) }}" alt="{{ $tour->nombre }}">
        <h1 class="title">{{ $tour->nombre }}</h1>
    </div>
    <div class="mensaje d-flex align-items-center justify-content-center">
        <p>Texto de muestra generado automaticametne</p>
    </div>
    <div class="container-fluid toursDetails">        
        <div class="row">
            <span>Price: <br>
               <span class="resaltado">USD{{ $tour->precioPublicado }}</span>
            </span>
            <span>Days:<br> 
            <span class="resaltado">{{ $tour->dias }}</span>
            </span>
            <span>Trip: <br>
                <span class="resaltado">{{ $tour->lugarInicio }} → {{ $tour->lugarFin }}</span>
                </span>
            <span>Category: <br>
            <span class="resaltado">Machu Picchu</span>
            </span>
            <span>
                <a href="" class="dates"><i class="fa fa-calendar"></i> Go to dates</a>
            <a href="" class="book"><i class="fa fa-pencil"> Book</i></a>
            </span>
        </div>
    </div>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div style="height:80vh"></div>
            </div>
        </div>
    </section>

@endsection
