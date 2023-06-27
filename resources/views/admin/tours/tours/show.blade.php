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
            <span>Difficulty: <br>
                <span class="resaltado">{{ $tour->dificultad }}</span>
            </span>
            <span>Tour: <br>
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
                <a href="#dates" class="dates"><i class="fa fa-calendar"></i> Go to dates</a>
                <a class="book" id="bookBtn"><i class="fa fa-pencil"></i> Book</a>
            </span>
            <div class="popup" id="bookPopup">
                <div class="popup-content container">
                    <h3 class="text-center">Reserve trip</h3>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Name:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control form-control-sm"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono">Phone:</label>
                                    <input type="tel" id="telefono" name="telefono"
                                        class="form-control form-control-sm" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fechaViaje">Fecha de Viaje:</label>
                                    <input type="date" id="fechaViaje" name="fechaViaje"
                                        class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cantidadAdultos">Adults:</label>
                                    <input type="number" id="cantidadAdultos" name="cantidadAdultos"
                                        class="form-control form-control-sm" min="1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cantidadAdultos">Children:</label>
                                    <input type="number" id="cantidadAdultos" name="cantidadAdultos"
                                        class="form-control form-control-sm" min="1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipoViaje">Trip kind:</label>
                                    <select id="tipoViaje" name="tipoViaje" class="form-control form-control-sm" required>
                                        <option value="familia">Familia</option>
                                        <option value="enPareja">En Pareja</option>
                                        <option value="amigos">Amigos</option>
                                        <option value="enGrupo">En Grupo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje:</label>
                            <textarea id="mensaje" name="mensaje" class="form-control form-control-sm" rows="4" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                        </div>
                    </form>
                    <button class="close close-btn" id="closeBtn"><i class="fa fa-times"></i></button>
                </div>
            </div>            
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
                        <a href="#galery"><i class="fa fa-image"></i> Gallery</a>
                        <a href="#itinerary"><i class="fa fa-map"></i> Itinerary</a>
                        <a href="#includes"><i class="fa fa-cart-plus"></i> Inclusions</a>
                        <a href="#dates"><i class="fa fa-calendar"></i> Dates & Availability</a>
                        <a href="#hotels"><i class="fa fa-hotel"></i> Hotels</a>
                        <a href="#important"><i class="fa fa-exclamation"></i> Essential trip info</a>
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
                <div class="row">
                    <div class="col-12">
                        <div id="overview" style="padding-top: 4rem">
                            <h3>Overview:</h3>
                            <p class="mt-4">{!! $tour->contenido !!}</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <h3 id="galery" class="mb-3" style="padding-top: 4rem">Gallery:</h3>
                        <div id="galeria" class="carousel slide" data-ride="carousel">
                            <!-- Indicadores -->
                            <ol class="carousel-indicators">
                                @foreach (array_chunk(explode(',', $tour->galeria), 2) as $index => $imagenes)
                                    <li data-target="#galeria" data-slide-to="{{ $index }}"
                                        class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <!-- Imágenes -->
                            <div class="carousel-inner" style="height: 300px;">
                                @foreach (array_chunk(explode(',', $tour->galeria), 2) as $index => $imagenes)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <div class="row">
                                            @foreach ($imagenes as $imagen)
                                                <div class="col-md-6">
                                                    <img src="{{ asset($imagen) }}" alt="Galería">
                                                </div>
                                            @endforeach
                                        </div>
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
                        </div>
                    </div>

                    {{--  <div id="galeria" class="carousel slide" data-ride="carousel">
                        <!-- Indicadores -->
                        <ol class="carousel-indicators">
                            @foreach (explode(',', $tour->galeria) as $index => $imagen)
                                <li data-target="#galeria" data-slide-to="{{ $index }}"
                                    class="{{ $loop->first ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <!-- Imágenes -->
                        <div class="carousel-inner" style="height:300px;">
                            @foreach (explode(',', $tour->galeria) as $index => $imagen)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ asset($imagen) }}" alt="Galería" width="100%"
                                        style="object-fit: cover">
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
                    <div class="col-12">
                        <div class="itinerary" style="padding-top: 5rem" id="itinerary">
                            <h3>Itinerary:</h3>
                            {!! $tour->detallado !!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div id="includes" style="padding-top: 4rem">
                            <h3>Inclusions:</h3>
                            {!! $tour->incluidos !!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div id="dates" style="padding-top: 4rem">
                            <h3>Next dates with offers:</h3>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead thead-dark">
                                        <tr>
                                            <th>Data de início</th>
                                            <th>Data final</th>
                                            <th>Preço</th>
                                            <th>Reservar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tour->fechas as $fecha)
                                            <tr>
                                                <td class="align-middle">{{ date('M d, Y', strtotime($fecha->fecha)) }}
                                                </td>
                                                <td class="align-middle">
                                                    <?php
                                                    $fechaFinal = date('Y-m-d', strtotime($fecha->fecha . ' + ' . $tour->dias . ' days'));
                                                    ?>
                                                    {{ date('M d, Y', strtotime($fechaFinal)) }}
                                                </td>
                                                <td class="align-middle">
                                                    <del>U${{ $tour->precioPublicado }}.00</del><br>U${{ $fecha->precio }}
                                                </td>
                                                <td class="align-middle"><a href="" class="btnReserva">Book</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div id="hotels" style="padding-top: 4rem">
                            <h3>Hotels:</h3>
                            @foreach ($tour->hoteles as $hotel)
                                <div class="row mt-3">
                                    <div class="col-5">
                                        <img src="{{ asset($hotel->img) }}" width="100%" alt="">
                                    </div>
                                    <div class="col-7">
                                        <h5>{{ $hotel->nombre }}</h5>
                                        <p><i class="fa fa-map-marker"></i> {{ $hotel->ubicacion }}</p>
                                        <p class="card-text">{{ $hotel->descripcion }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div id="importante" style="padding-top: 4rem">
                            <h3>Essential trip info:</h3>
                            <p>
                                {!! $tour->importante !!}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            const bookBtn = document.getElementById('bookBtn');
            const bookPopup = document.getElementById('bookPopup');
            const closeBtn = document.getElementById('closeBtn');
            bookBtn.addEventListener('click', () => {
                bookPopup.style.display = 'flex';
            });
            closeBtn.addEventListener('click', () => {
                bookPopup.style.display = 'none';
            });
            bookPopup.addEventListener('click', (event) => {
                if (!event.target.closest('.popup-content')) {
                    bookPopup.style.display = 'none';
                }
            });
        </script>
    </div>
@endsection
