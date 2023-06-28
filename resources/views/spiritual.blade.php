@extends('layouts.app')
@section('titulo', 'Inicio')
@section('contenido')
    <div class="custom-container-2">
        <img src="{{ asset('img/fondos/luxury-spiritual-shamanic-peru.jpg') }}" alt="Peru Mega Turismo">
        <h1>Spiritual</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-justify">
                <p>
                    Full of mystery and culture dating back millennia, Peru is an indomitable land of deserts etched with
                    ancient geoglyphs, rainforests teeming with wildlife, and soaring peaks harbouring secret cities.
                </p>
                <p>
                    While many travellers come to visit one of South America's most famous sites, the ruins of Machu Picchu,
                    the real Peru lies within its warm, proud inhabitants – many of whom can trace their bloodlines back to
                    the Incas. What you might not expect is the foodie bonanza found in Lima or the adventures that await
                    you in the ancient capital of Cusco. Whether you’re exploring the cobbled streets of Arequipa, bobbing
                    on the floating islands of Lake Titicaca or uncovering mummies in Nazca, our Peru tours will have you
                    feeling like a modern-day Indiana Jones. Just don’t forget to pack your fedora.
                </p>
            </div>
            <div class="col-12">
                <h2>Top Peru travel deals</h2>
            </div>
            <div class="col-lg-12 mt-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Thumb</th>
                            <th>Trip</th>
                            <th>Route</th>
                            <th>Days</th>
                            <th>From</th>
                            <th>Visit Tour</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tours as $tour)
                            <tr>
                                <td class="align-middle"><img src="{{ asset($tour->imgThumb) }}" width="150px" alt="{{$tour->nombre}}"></td>
                                <td class="align-middle"><strong>{{ $tour->nombre }}</strong> <br> {{ $tour->lugarInicio }} → {{ $tour->lugarFin }}</td>
                                <td class="align-middle">                    
                                    <div class="modal fade" id="imageModal{{ $tour->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h4 class="text-center">{{ $tour->nombre }}</h4>
                                                    <img src="{{ asset($tour->mapa) }}" alt="{{ $tour->nombre }}" width="100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset($tour->mapa) }}" alt="{{ $tour->nombre }}" width="150px" data-toggle="modal" data-target="#imageModal{{ $tour->id }}">
                                </td>
                                <td class="align-middle">{{ $tour->dias }}</td>
                                <td class="align-middle">{{ $tour->precioReal}}<br> {{$tour->precioPublicado}}</td>
                                <td class="align-middle"><a href="{{$tour->slug}}">View tour ⮞</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>


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
                                                <img src="{{ asset('img/chica-02.jpg') }}" width="100%" alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>Nombre Muestra</h5>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>

                                            <p>Texto de muestra del comentario...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row cardReview ml-1 mr-1">
                                        <div class="col-4">
                                            <div class="circulo">
                                                <img src="{{ asset('img/thumb/user-img-1.PNG') }}" width="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>Nombre Muestra</h5>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <p>Texto de muestra del comentario...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row cardReview ml-1 mr-1">
                                        <div class="col-4">
                                            <div class="circulo">
                                                <img src="{{ asset('img/thumb/user-img-2.PNG') }}" width="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>Nombre Muestra</h5>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
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
                                                <img src="{{ asset('img/thumb/user-img-3.PNG') }}" width="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>David Miranda</h5>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>

                                            <p>Texto de muestra del comentario...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row cardReview ml-1 mr-1">
                                        <div class="col-4">
                                            <div class="circulo">
                                                <img src="{{ asset('img/thumb/user-img-4.PNG') }}" width="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>Gabriela Durand</h5>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <p>Texto de muestra del comentario...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row cardReview ml-1 mr-1">
                                        <div class="col-4">
                                            <div class="circulo">
                                                <img src="{{ asset('img/thumb/user-img-5.PNG') }}" width="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>Kelly Pérez</h5>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
                                            <i class="fa fa-star" style="color: #08e5e5"></i>
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
