@extends('adminlte::page')

@section('title', 'Employes Management System | '.$employe->nomComplet)

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="container text-center">
                <div class="row" style="border: 1px solid black;">
                    <div class="col" style="border: 1px solid black; ">
                        <img style="width:100%; height:100px" src=" {{ asset('vendor/adminlte/dist/img/Marsa-Maroc.png')}}" alt="...">
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-12" style="border: 1px solid black;">
                                <p style="text-transform:Uppercase;padding-bottom:1%; font-size:20px;font-weight:600;">demande de conge administratif personnel</p>
                            </div>
                            <div class="col-3" style="border: 1px solid black;">
                                Document:
                            </div>
                            <div class="col-2" style="border: 1px solid black;">M </div>
                            <div class="col-2" style="border: 1px solid black;">A </div>
                            <div class="col-2" style="border: 1px solid black;">R </div>
                            <div class="col-2" style="border: 1px solid black;">S</div>
                            <div class="col-1" style="border: 1px solid black;">A</div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="card my-5">

                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark" style="text-transform:Uppercase;">
                        L'interesse
                    </h3>
                </div>
                <div class="card-body">
                    <p class="lead">
                        Nom et Prenom : <b> {{$employe->nomComplet}}</b>
                    </p>
                    <p class="lead">
                        Service: <b> {{$services->titre}}</b>
                    </p>
                    <p class="lead">
                        Division: <b> {{$divisions->nomD}}</b>
                    </p>
                    <p class="lead">
                        Type d'absence: <b> {{$employe->droitConge}}</b>
                    </p>
                    <p class="lead">
                        Derniere conge pris : <b> {{$employe->dataDepart}}</b>
                    </p>
                    <p class="lead">
                        Duree demandees : <b> {{$employe->duree}}</b>
                    </p>
                    <p class="lead">
                        Date de Depart souhaitee : <b> {{$employe->dataDepart}}</b>
                    </p>

                    <p class="m-5">
                        <?php $date = new DateTime('today') ?>
                        safi, le <b>
                            {{ date('Y-m-d')}}
                        </b>

                    </p>


                    <div class="card-header bg-white text-center p-3" style="border-top: 0.5px solid black;border-bottom: 0.5px solid black;">
                        <h3 class="text-dark">
                            <p style="text-transform:Uppercase;"> a remplire par le responsable</p>
                        </h3>
                    </div>
                    <div class="card-body">
                        <p class="lead">
                            Avis du responsable direct..............................................
                        </p>
                        <p class="lead">
                            Interimaire propose.....................................................
                        </p>
                        <p class="lead">
                            <b style="padding-left: 45%;"> Safi, le ________________</b>
                        </p>
                        <p class="lead">
                            <b>VISA CHEF DE SERVICE</b> <b style="padding-left: 35%;">CHEF DE DIVISION</b>
                        </p>
                        <a href="#" id="printPageButton" class="btn btn-sm btn-primary mb-3" onclick="document.getElementById('printPageButton').style.display = 'none';window.print();" class="btn btn-md btn-primary mr-2 mb-2">
                            <i class="fas fa-print"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection