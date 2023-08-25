@extends('adminlte::page')

@section('title', 'Employes Management System | '.$employe->nomComplet)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                        ATTESTATION DE TRAVAIL

                    </h3>
                </div>
                <div class="card-body">
                    <p class="lead">
                        Nous soussignés société Marsa maroc domiciliée à Safi attestons par la présente que <b>{{$employe->nomComplet}}</b>, Immatriculé à la marsa maroc sous le numéro
                        <b>{{$employe->id}} </b> , est employé au sein de notre société en qualité de <b> {{$services->titre}}</b>.
                    </p>
                    <p class="lead">
                        Et ce depuis le <b>{{$employe->hire_date}}</b>.
                    </p>
                    <p class="lead">
                        La présente attestation lui est délivrée à sa demande pour servir et valoir ce que de droit.
                    </p>
                    <p class="lead">
                        Fait à safi, Le : <b>
                            {{ date('Y-m-d')}}
                        </b>
                    </p>
                    <p class="lead">
                        Signature
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