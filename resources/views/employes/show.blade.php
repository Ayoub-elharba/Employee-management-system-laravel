@extends('adminlte::page')

@section('title', 'Employes Management System | '.$employe->nomComplet)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5" style="background-color:#F8F8FF;">
                <div style="background-color: red;" class="card-header text-center p-3">
                    <h3 class="text-white" style="font-family: 'Courier New', Courier, monospace; font-weight:400;">
                        Profile : {{$employe->nomComplet}}
                    </h3>
                </div>
                <div class="card-body">

                </div>
                <hr>
                <div class="form-group mb-3">
                    <label for="fullname" class="form-label fw-bold" style="color: red;"> nom et prenom</label>
                    <div class="border border-info rounded p-2">
                        {{$employe->nomComplet}}
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="fullname" class="form-label fw-bold" style="color: red;">Cin</label>
                    <div class="border border-info rounded p-2">
                        {{$employe->cin}}
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="fullname" class="form-label fw-bold" style="color: red;">Embauché depuis</label>
                    <div class="border border-info rounded p-2">
                        {{$employe->hire_date}}
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="fullname" class="form-label fw-bold" style="color: red;">telephone</label>
                    <div class="border border-info rounded p-2">
                        {{$employe->phone}}
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="fullname" class="form-label fw-bold" style="color: red;">Adresse</label>
                    <div class="border border-info rounded p-2">
                        {{$employe->address}}
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="fullname" class="form-label fw-bold" style="color: red;">la ville</label>
                    <div class="border border-info rounded p-2">
                        {{$employe->city}}
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="fullname" class="form-label fw-bold" style="color: red;">division</label>
                    <div class="border border-info rounded p-2">
                        {{$divisions->nomD}}
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="fullname" class="form-label fw-bold" style="color: red;">service</label>
                    <div class="border border-info rounded p-2">
                        {{$services->titre}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection