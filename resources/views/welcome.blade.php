@extends('layouts.app')
@section('titulo', 'Inicio')
@section('contenido')
    <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" style="height: 70vh">
            <div class="carousel-item active">
                <img class="d-block zoom-in-image" src="{{ asset('img/sacsayhuaman-yoga-panoramic.webp') }}" alt="First slide">
                <div class="carousel-caption d-md-block">
                    <h5>Este es un texto ejemplas</h5>
                    <p>Este es un parrafo ejemplar</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block zoom-in-image" src="{{ asset('img/Qeswachaka-inca-bridge-Cusco.webp') }}"
                    alt="Third slide">
                <div class="carousel-caption d-md-block">
                    <h5>h5 de ejemplo</h5>
                    <p>Parrafo de ejemplo</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block zoom-in-image" src="{{ asset('img/panoramic-view-of-machu-picchu.webp') }}"
                    alt="Third slide">
                <div class="carousel-caption d-md-block">
                    <h5>h5 de ejemplo</h5>
                    <p>Parrafo de ejemplo</p>
                </div>
            </div>
        </div>
        <!-- Flechas de navegación -->
        <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
            <span class="prev" aria-hidden="true">
                < <span class="sr-only">Previous
            </span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
            <span class="next" aria-hidden="true">></span>
            <span class="sr-only">Next</span>
        </a>
        <!-- Puntos indicadores -->
        <ol class="carousel-indicators">
            <!-- Indicadores del carousel -->
        </ol>
    </div>
    <section class="pt-3 pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($gruposTours as $grupo)
                                <div class="carousel-item active">
                                    <div class="row">
                                        @foreach ($grupo as $tour)
                                            <div class="col-md-3 mb-3">
                                                <div class="card">
                                                    <a href="{{ route('tour.show', $tour->slug) }}">
                                                        <img alt="" src="{{ $tour->imgThumb }}">
                                                    </a>
                                                    <div class="cardMin">
                                                        <span><i class="fa fa-dollar"></i> {{ $tour->precioReal }}</span>
                                                        <span><i class="fa fa-map-marker"></i> {{ $tour->lugarInicio }} →
                                                            {{ $tour->lugarFin }} </span>
                                                        <span><i class="fa fa-calendar"></i> {{ $tour->dias }} days</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{ $tour->nombre }}</h4>
                                                        <p class="card-text">{{ $tour->descripcion }}</p>
                                                        <a class="cardBtn" href="{{ route('tour.show', $tour->slug) }}"
                                                            class="btn btn-primary">View details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280"
                                                src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                                            <div class="cardMin">
                                                <span><i class="fa fa-dollar"></i> 340.00</span>
                                                <span><i class="fa fa-map-marker"></i> Cusco</span>
                                                <span><i class="fa fa-calendar"></i> 2 days</span>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="">Ver tour</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280"
                                                src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                            <div class="cardMin">
                                                <span><i class="fa fa-dollar"></i> 340.00</span>
                                                <span><i class="fa fa-map-marker"></i> Cusco</span>
                                                <span><i class="fa fa-calendar"></i> 2 days</span>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="">Ver tour</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280"
                                                src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                            <div class="cardMin">
                                                <span><i class="fa fa-dollar"></i> 340.00</span>
                                                <span><i class="fa fa-map-marker"></i> Cusco</span>
                                                <span><i class="fa fa-calendar"></i> 2 days</span>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="">Ver tour</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280"
                                                src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
                                            <div class="cardMin">
                                                <span><i class="fa fa-dollar"></i> 340.00</span>
                                                <span><i class="fa fa-map-marker"></i> Cusco</span>
                                                <span><i class="fa fa-calendar"></i> 2 days</span>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="">Ver tour</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a class="btn-slide mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <i class="fa fa-circle"></i>
                    </a>
                    <a class="btn-slide mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fa fa-circle"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <div class="container-fluid containerReviews">

        <div class="row">
            <div class="col-lg-12 mb-4">
                <h2 class="text-center">Top Reviews</h2>
                <p class="text-center">Esta es una lista de los comentarios de nuestros pasajeros del año 2023</p>
            </div>
            <div class="col-lg-12">
                <div id="commentCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-4">
                                    <div class="row cardReview ml-1 mr-1">
                                        <div class="col-4">
                                            <div class="circulo">
                                                <img src="{{ asset('img/chica-02.jpg') }}" width="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>Nombre Muestra</h5>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            
                                            <p>Texto de muestra del comentario...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row cardReview ml-1 mr-1">
                                        <div class="col-4">
                                            <div class="circulo">
                                                <img src="{{ asset('img/chica-02.jpg') }}" width="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>Nombre Muestra</h5>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <p>Texto de muestra del comentario...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row cardReview ml-1 mr-1">
                                        <div class="col-4">
                                            <div class="circulo">
                                                <img src="{{ asset('img/chica-02.jpg') }}" width="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>Nombre Muestra</h5>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <p>Texto de muestra del comentario...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-4">
                                    <div class="row cardReview ml-1 mr-1">
                                        <div class="col-4">
                                            <div class="circulo">
                                                <img src="{{ asset('img/chica-02.jpg') }}" width="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>David Miranda</h5>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            
                                            <p>Texto de muestra del comentario...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row cardReview ml-1 mr-1">
                                        <div class="col-4">
                                            <div class="circulo">
                                                <img src="{{ asset('img/chica-02.jpg') }}" width="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>Gabriela Durand</h5>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <p>Texto de muestra del comentario...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row cardReview ml-1 mr-1">
                                        <div class="col-4">
                                            <div class="circulo">
                                                <img src="{{ asset('img/chica-02.jpg') }}" width="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>Kelly Pérez</h5>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <p>Texto de muestra del comentario...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Añade más "carousel-item" si tienes más comentarios -->
                    </div>
                    <!-- Controles de navegación -->
                    <div class="col-12 text-center mt-4">
                        <a class="btn-slide mb-3 mr-1" href="#commentCarousel" role="button" data-slide="prev">
                            <i class="fa fa-circle"></i>
                        </a>
                        <a class="btn-slide mb-3" href="#commentCarousel" role="button" data-slide="next">
                            <i class="fa fa-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="cursiva">Enjoy your</h2>
                    <h3 class="text-center" style="font-size:2.5em; font-weight:bold">Vacations in Peru</h3>
                    <p class="text-center">Our tour packages include the essentials for an unforgettable trip.</p>
                    <div class="row">
                        <div class="col-lg-3 text-center">
                            <img src="{{ asset('img/restaurant.PNG') }}" width="100px" alt="Peruvian restaurants">
                            <h4 class="text-center">Restaurants</h4>
                            <p class="text-center">The best options for enjoy peruvian food.</p>
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="{{ asset('img/Tour-guide.png') }}" width="100px" alt="Peruvian tour guides">
                            <h4 class="text-center">Tour guides</h4>
                            <p class="text-center">We offer experienced and professional tour guides.</p>
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="{{ asset('img/transport-mega-turismo.png') }}" width="100px"
                                alt="Peruvian restaurants">
                            <h4 class="text-center">Transport</h4>
                            <p class="text-center">All transfers and transportation available during your trip</p>
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="{{ asset('img/hotel-service.png') }}" width="100px" alt="Peruvian tour guides">
                            <h4 class="text-center">Hotel</h4>
                            <p class="text-center">Option of including accommodation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom mt-5">
            <div class="row" style="margin-left:0px; margin-right:0px">
                <div class="col-lg-3 custom-col">
                    <img src="{{ asset('img/tour-cusco-peru.jpg') }}" alt="" width="100%">
                    <div class="card-hover">
                        <h4>Muestra</h4>
                        <p>Texto de muestra dirigido</p>
                        <a href="">Boton de muestra</a>
                    </div>
                </div>
                <div class="col-lg-3 custom-col">
                    <img src="{{ asset('img/chica-01.jpg') }}" alt="" width="100%">
                    <div class="card-hover">
                        <h4>Muestra</h4>
                        <p>Texto de muestra dirigido</p>
                        <a href="">Boton de muestra</a>
                    </div>
                </div>
                <div class="col-lg-3 custom-col">
                    <img src="{{ asset('img/chica-02.jpg') }}" alt="" width="100%">
                    <div class="card-hover">
                        <h4>Muestra</h4>
                        <p>Texto de muestra dirigido</p>
                        <a href="">Boton de muestra</a>
                    </div>
                </div>
                <div class="col-lg-3 custom-col">
                    <img src="{{ asset('img/chica-03.jpg') }}" alt="" width="100%">
                    <div class="card-hover">
                        <h4>Muestra</h4>
                        <p>Texto de muestra dirigido</p>
                        <a href="">Boton de muestra</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="cursiva">Enjoy your</h2>
                    <p class="text-center">Best places to visit in Perú</p>
                </div>
                <div class="col-lg-4 circulares mt-3">
                    <a href="">
                        <div class="circular">
                            <img src="{{ asset('img/galeriaTours/condor-arequipa.webp') }}" alt="">
                            <h3>Machu Picchu</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 circulares mt-3">
                    <a href="">
                        <div class="circular">
                            <img src="{{ asset('img/galeria/arequipa-city-tour.webp') }}" alt="">
                            <h3>Cusco</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 circulares mt-3">
                    <a href="">
                        <div class="circular">
                            <img src="{{ asset('img/galeria/calle-sevilla-Arequipa.webp') }}" alt="">
                            <h3>Camino Inca</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
