@extends('layouts.app')
@section('titulo', 'Blogs con tag ' . $tag->nombre)
@section('contenido')
<div class="custom-container-2">
    <img src="{{ asset('img/fondos/Urubamba-amazing-view.webp') }}" alt="Peru Mega Turismo">
    <h1>Blogs referred to tag <span class="colorPrincipal">'{{$tag->nombre}}'</span></h1>
</div>
@endsection
