@extends('layouts.app')
@section('title', __('Welcome'))
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="{{asset('css/app.css')}}">

<body>

    @guest
    <div class="wrapper">
        <div class="one">
            <div class="container">
                <a href="#" class="btn-neon">
                    <span id="span1"></span>
                    <span id="span2"></span>
                    <span id="span3"></span>
                    <span id="span4"></span>
                    <div class="card">
                        <img src="{{ url('img/DOTA_2_GF.jpg') }}" alt="">
                    </div>
                </a>
            </div>
        </div>
        <div class="two">
            <div class="container">
                <a href="#" class="btn-neon">
                    <span id="span1"></span>
                    <span id="span2"></span>
                    <span id="span3"></span>
                    <span id="span4"></span>
                    <div class="card">
                        <img src="{{ url('img/CALL_DUTY_GF.jpg') }}" alt="">
                    </div>
                </a>
            </div>
        </div>
        <div class="three">
        <div class="row">
                        <a href="https://discord.gg/NvZEDuNr" class="btn btn-primary btn-lg" role="button"
                            aria-disabled="true" style="BORDER: 0px; background-color: transparent">
                            <img class="card-img-top" src="{{ url('img/discord.png') }}" width="50" height="50"
                                alt="Discord">
                        </a>
                    </div>
                    <br>
                    <div class="row">
                        <a href="https://www.instagram.com/gamerfest.ec/?hl=es-la" class="btn btn-primary btn-lg"
                            role="button" aria-disabled="true" style="BORDER: 0px; background-color: transparent">
                            <img class="card-img-top" src="{{ url('img/instagram.png') }}" width="50" height="50"
                                alt="Instagram">
                        </a>

                    </div>
                    <br>
                    <div class="row">
                        <a href="https://www.facebook.com/gamerfest.ec" class="btn btn-primary btn-lg" role="button"
                            aria-disabled="true" style="BORDER: 0px; background-color: transparent">
                            <img class="card-img-top" src="{{ url('img/facebook.png') }}" width="50" height="50"
                                alt="Facebook">
                        </a>
                    </div>

        </div>
        <div class="four">
            <div class="container">
                <a href="#" class="btn-neon">
                    <span id="span1"></span>
                    <span id="span2"></span>
                    <span id="span3"></span>
                    <span id="span4"></span>
                    <div class="card">
                        <img src="{{ url('img/VALORANT_GF.jpg') }}" alt="">
                    </div>
                </a>
            </div>
        </div>
        <div class="five">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ url('img/JUGAD_GF.avif') }}" height="300"
                                    alt="Primer juego">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ url('img/FALL_GF.jpg') }}" height="300"
                                    alt="Segundo juego">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ url('img/MARIO_GF.avif') }}" height="300"
                                    alt="Tercer juego">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
        </div>
        <div class="six">
            <div class="container">
                <div class="card text-white bg-dark mb-3" style="width: 44rem; ">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.2120238450116!2d-78.58828638569456!3d-0.9988702992713584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d4639e3fb9755f%3A0x22fe7f63301b5fee!2sESPE%20-%20Campus%20Belisario%20Quevedo!5e0!3m2!1ses!2sec!4v1669608261033!5m2!1ses!2sec"
                        width="700" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="card-body">
                        <h3 class="card-text">Ubicacion del Gamer Fest</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card text-white bg-dark mb-3">

<div class="row">
    <div class="col-sm-1">
   
    </div>
    <div class="col-sm-3">
        <br>
        <h3>Soporte:</h3>
            <h4>WhatsApp: +593 991984909 </h4>
            <h4>Correo: davela5@espe.edu.ec</h4>
    </div>
    <div class="col-sm-4">
        <br>
       
            
    
    </div>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-2">

    </div>

</div>
</div>
    @else
    Hi {{ Auth::user()->name }}, Welcome back to {{ config('app.name', 'Laravel') }}.
    @endif

    @endsection
</body>