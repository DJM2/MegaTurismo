<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="icon" href="{{ asset('img/icono-mega-turismo.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row info align-items-center">
            <div class="col-lg-6 text-center">
                <span class="infoMail">info@megaturismo.com</span> <span class="responsive">|</span> <span
                    class="infoMail2">reserve@megatusimo.com</span>
            </div>
            <div class="col-lg-6 redesContent">
                <span class="fa fa-whatsapp redes"></span>
                <span class="fa fa-pinterest redes"></span>
                <span class="fa fa-tripadvisor redes"></span>
                <span class=" fa fa-instagram redes"></span>
                <span class="fa fa-facebook redes"></span>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('img/logo-mega-turismo.png') }}" width="90px" alt="" id="logo-image">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle-split" href="#" id="dropdownDestinations"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Destinations <span
                                class="fa fa-caret-down caret"></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownDestinations">
                            <a class="dropdown-item" href="#">Page 1</a>
                            <a class="dropdown-item" href="#">Page 2</a>
                            <a class="dropdown-item" href="#">Page 3</a>
                            <a class="dropdown-item" href="#">Page 4</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('packages')}}">Peru Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('adventures')}}">Peru Adventure</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('gastronomy')}}">Peru Gastronomy</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('spiritual')}}">Spiritual</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('blogen')}}">Blog</a></li>
                </ul>
                <form action="#" class="searchMenu">
                    <input type="text" placeholder="Search">
                    <button class="fa fa-search " type="submit">
                    </button>
            </div>
            </form>
        </div>
        </div>
    </nav>

    {{-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light sticky-top" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand logo-scroll" href="index.html">
                <img src="{{ asset('img/logo-mega-turismo.png') }}" width="90px" alt="" id="logo-image">
            </a>
            <form action="#" class="searchform order-sm-start order-lg-last">
                <div class="form-group d-flex">
                    <button type="submit" placeholder="" class="form-control search"><span
                            class="fa fa-search"></span></button>
                </div>
            </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse navMega">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Destinations</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="#">Page 1</a>
                            <a class="dropdown-item" href="#">Page 2</a>
                            <a class="dropdown-item" href="#">Page 3</a>
                            <a class="dropdown-item" href="#">Page 4</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Peru Packages</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Peru Adventure </a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Peru Gastronomy</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Spiritual</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav> --}}

    @yield('contenido')

    <div class="container-fluid bg-dark">
        <div class="container">
            <div class="row links">
                <div class="col-lg-3">
                    <img src="{{ asset('img/logo-mega-turismo-blanco.png') }}" width="120px"
                        alt="Logo Mega Turismo blanco" loading="lazy">
                    <ul class="mt-3">
                        <li><a href="">● About Us</a></li>
                        <li><a href="">● Terms And Conditions</a></li>
                        <li><a href="">● Contact Us</a></li>
                        <li><a href="">● Reviews</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Perú Tours</h4>
                    <ul>
                        <li><span>➤</span><a href="">Cusco 4 dias</a></li>
                        <li><span>➤</span><a href="">Peru for 9 days</a></li>
                        <li><span>➤</span><a href="">Peru opackage 6 days</a> </li>
                        <li><span>➤</span><a href="">Peru and Machu Picchu</a> </li>
                        <li><span>➤</span><a href="">Peru for 9 days</a> </li>
                        <li><span>➤</span><a href="">Peru opackage 6 days</a> </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Inca trail Tours</h4>
                    <ul>
                        <li><span class="flechaPie">➤</span><a href="">Cusco 4 dias</a> </li>
                        <li><span class="flechaPie">➤</span><a href="">Peru for 9 days</a> </li>
                        <li><span class="flechaPie">➤</span><a href="">Peru opackage 6 days</a> </li>
                        <li><span class="flechaPie">➤</span><a href="">Peru and Machu Picchu</a> </li>
                        <li><span class="flechaPie">➤</span><a href="">Cusco 4 dias</a> </li>
                        <li><span class="flechaPie">➤</span><a href="">Peru for 9 days</a> </li>
                    </ul>
                </div>
                <div class="col-lg-3 sociales">
                    <h4>Follow Us</h4>
                    <a href=""><span class="fa fa-whatsapp redes"></span></a>
                    <a href=""><span class="fa fa-pinterest redes"></span></a>
                    <a href=""><span class="fa fa-tripadvisor redes"></span></a>
                    <a href=""><span class=" fa fa-instagram redes"></span></a>
                    <a href=""><span class="fa fa-facebook redes"></span></a>
                    <h4 class="mt-3">Contact Us</h4>
                    <ul class="contact">
                        <li> <a href=""><i class="fa fa-envelope"></i> info@megaturismo.com </a> </li>
                        <li> <a href=""><i class="fa fa-whatsapp"></i> +51 958 986 458 </a> </li>
                        <li> <a href=""><i class="fa fa-map-marker"></i> Dirección A4-2, Cusco - Perú</a> </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center derechos">
                    <p>Todos los derechos reservados © | MegaTurismo 2023 | Creado por <a href="#"
                            class="djm2">DJM2</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 160) {
                $('#logo-image').attr('src', '{{ asset('img/logo-mega-turismo-2.png') }}')
                    .css({
                        'width': '100px',
                        'transition': 'width 0.6s'
                    });
            } else {
                $('#logo-image').attr('src', '{{ asset('img/logo-mega-turismo.png') }}')
                    .css({
                        'width': '90px',
                        'transition': 'width 0.6s'
                    });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>
