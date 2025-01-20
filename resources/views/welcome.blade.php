@extends('usuario_final.inicio.home')

@section('inicio')

@include('layouts.partials.alert')

<header id="header">
    <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img height="65" class=""
                        src="{{ asset('assets/img/logo.png') }}" alt="logo"></a>

            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="scroll active"><a href="#home">Inicio</a></li>
                
                    <li><a class="getstarted scrollto" href="{{ route('reclamos-sugerencias.create') }}">Reclamos<i
                                class="bi bi-arrow-right"></i></a></li>
                    <li><a class="getstarted scrollto" href="{{ route('login') }}">Login<i
                                class="bi bi-arrow-right"></i></a></li>

                </ul>

            </div>

        </div><!--/.container-->

    </nav><!--/nav-->
</header><!--/header-->


<section class="demo-2">
    <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25"
                data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-1"></div>
                    <div class="slide-caption">
                        <h2>Incrementar el control integral y de transparencia en la gestión institucional</h2>

                    </div>
                </div>
            </div>

            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15"
                data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-2"></div>
                    <div class="slide-caption">
                        <h2> Responder de una manera efectiva las necesidades de nuestro país</h2>
                        <blockquote>
                            <p>Mejorando así la capacidad de patrullaje y la respuesta ante las situaciones de
                                emergencia.</p>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3"
                data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-3"></div>
                    <div class="slide-caption">
                        <h2>Incrementar la efectividad de la seguridad ciudadana y el orden público</h2>

                    </div>
                </div>
            </div>
        </div><!-- /sl-slider -->

        <nav id="nav-dots" class="nav-dots">
            <span class="nav-dot-current"></span>
            <span></span>
            <span></span>
        </nav>

    </div><!-- /slider-wrapper -->

</section><!--/#main-slider-->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text-center">
                &copy; 2025 - Sistema Gestión Flota Policial <a target="_blank" href=""
                    title="Free Bootstrap Themes and HTML Templates">Sub-Zona 7 - Loja</a>
            </div>

        </div>
    </div>
</footer>



@endsection