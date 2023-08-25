@extends('layouts.main')

@section('title')
Système de gestion des employés
@endsection
@section('content')
<footer class="container p-4 rounded">
    <div class="d-lg-flex justify-content-between">
        <div>
            <p style="font-weight: bold; font-size:x-large"> <span style="color:red">M</span>arsa Maroc </p>
        </div>
        <div class="copyright" style="color:black; font-weight:700">
            <p>© 2023 Marsa_Maroc, Tout droits réservés |<a href="https://ma.linkedin.com/in/ayoub-elharba-a8b759231?trk=public_profile_browsemap" target="_blank">Créer par Ayoub Elharba</a></p>
        </div>
        <div>


        </div>
    </div>

    <div class="container my-5 p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-3">

                    <h2 class="text-danger"> Bienvenu </h2>
                    <hr>
                    @guest
                    <a href="{{route('login')}}" class="btn btn-outline-danger ">Login</a>
                    @endguest
                    @auth
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="logout_link">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-outline-danger text- mx-3">
                                        {{ __('Logout') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="home_page_link">
                            <a href="{{route('home')}}" class="btn btn-outline-primary">Home</a>
                        </div>
                    </div>
                    @endauth
                    <hr>
                    <h1 style="text-align: center;">Please login</h1>
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('vendor/adminlte/dist/img/Marsa-Maroc.png')}}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('vendor/adminlte/dist/img/Marsa-Marocjpg.jpg')}}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('vendor/adminlte/dist/img/Marsa-Marocjpg.jpg')}}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>


                </div>
            </div>
        </div>
    </div>

    @endsection