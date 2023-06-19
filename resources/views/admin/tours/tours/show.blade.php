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
            <span>Days:<br>
                <span class="resaltado">{{ $tour->dias }}</span>
            </span>
            <span>Trip: <br>
                <span class="resaltado">{{ $tour->dificultad }}</span>
            </span>
            <span>Category: <br>
                <span class="resaltado">
                    @foreach ($tour->categorias as $categoria)
                        {{ $categoria->nombre }}
                    @endforeach
                </span>
            </span>
            <span>Price: <br>
                <span class="resaltado">USD{{ $tour->precioPublicado }}</span>
            </span>
            <span>
                <a href="" class="dates"><i class="fa fa-calendar"></i> Go to dates</a>
                <a href="" class="book"><i class="fa fa-pencil"> Book</i></a>
            </span>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>{{ $tour->nombre }}</h4>
                    <p>{{ $tour->lugarInicio }} → {{ $tour->lugarFin }}</p>
                    <img src="{{ asset($tour->mapa) }}" alt="{{ $tour->nombre }}" width="100%">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-3">
                <div class="sticky">
                    <div class="image-container">
                        <img src="{{ asset($tour->mapa) }}" alt="{{ $tour->nombre }}" width="100%">
                        <a href="#" class="expand-icon" data-toggle="modal" data-target="#imageModal">
                            <i class="fa fa-expand"></i>
                        </a>
                    </div>
                    <div class="submenu">
                        <a href="#overview"><i class="fa fa-list"></i> Overview</a>
                        <a href="#galeria"><i class="fa fa-image"></i> Gallery</a>
                        <a href="#itinerario"><i class="fa fa-map"></i> Itinerary</a>
                        <a href="#incluidos"><i class="fa fa-cart-plus"></i> Inclusions</a>
                        <a href=""><i class="fa fa-calendar"></i> Dates & Availability</a>
                        <a href=""><i class="fa fa-hotel"></i> Hotels</a>
                        <a href=""><i class="fa fa-exclamation"></i> Essential trip info</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="migas">
                    <span><a href="{{ route('index') }}">Home</a></span>
                    <span><a href="">→
                            @foreach ($tour->categorias as $categoria)
                                {{ $categoria->nombre }}
                            @endforeach
                        </a>
                    </span>
                    <span><a>→ {{ $tour->nombre }}</a></span>
                </div>

                <div id="overview" style="padding-top: 5rem">
                    <p class="mt-4">{{ $tour->descripcion }}</p>
                </div>
                <div id="galeria" style="padding-top:5rem">
                    <div class="carousel slide" data-ride="carousel" style="height: 300px;">
                        <!-- Indicadores -->
                        <ol class="carousel-indicators">
                            @php
                                $imageCount = count(explode(',', $tour->galeria));
                                $indicatorCount = ceil($imageCount / 2);
                            @endphp
                            @for ($i = 0; $i < $indicatorCount; $i++)
                                <li data-target="#galeria" data-slide-to="{{ $i }}"
                                    class="{{ $i === 0 ? 'active' : '' }}"></li>
                            @endfor
                        </ol>

                        <!-- Imágenes -->
                        <div class="carousel-inner" style="height: 100%;">
                            @php
                                $images = explode(',', $tour->galeria);
                            @endphp
                            @for ($i = 0; $i < $imageCount; $i += 2)
                                <div class="carousel-item {{ $i === 0 ? 'active' : '' }}" style="height: 100%;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{ asset($images[$i]) }}" alt="Galería" width="100%"
                                                style="object-fit: cover; height: 100%;">
                                        </div>
                                        @if ($i + 1 < $imageCount)
                                            <div class="col-md-6">
                                                <img src="{{ asset($images[$i + 1]) }}" alt="Galería" width="100%"
                                                    style="object-fit: cover; height: 100%;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <!-- Controles -->
                        <a class="carousel-control-prev" href="#galeria" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#galeria" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>

                {{-- <div id="galeria" class="carousel slide" data-ride="carousel">
                    <!-- Indicadores -->
                    <ol class="carousel-indicators">
                        @foreach (explode(',', $tour->galeria) as $index => $imagen)
                            <li data-target="#galeria" data-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                  
                    <!-- Imágenes -->
                    <div class="carousel-inner" style="height:300px;">
                        @foreach (explode(',', $tour->galeria) as $index => $imagen)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ asset($imagen) }}" alt="Galería" width="100%" style="object-fit: cover"> 
                            </div>
                        @endforeach
                    </div>
                  
                    <!-- Controles -->
                    <a class="carousel-control-prev" href="#galeria" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#galeria" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div> --}}
                <div class="itinerario" style="padding-top: 5rem" id="itinerario">
                    {!! $tour->detallado !!}
                </div>
                <div id="incluidos" style="padding-top: 5rem">
                    {!!$tour->incluidos!!}
                </div>


                <div class="container-fluid">
                    <div class="row">
                        <div style="height:80vh"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>

    </section>
@endsection
