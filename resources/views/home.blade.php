@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{\App\Models\Employe::count()}}</h3>
                <p>Employes</p>
            </div>
            <div class="icon  text-light">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{url('admin/employes')}}" class="small-box-footer">
                Plus d'informations <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-md-4 ">
        <div class="small-box" style="background:red;color:white">
            <div class="inner">
                <h3>{{\App\Models\Devision::count()}}</h3>
                <p>Divisions</p>
            </div>
            <div class="icon  text-light">
                <i class="fa fa-id-card"></i>
            </div>
            <a href="{{url('admin/divisions')}}" class="small-box-footer">
                Plus d'informations <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-md-4  text-light">
        <div class="small-box bg-orange ">
            <div class="inner text-light">
                <h3>{{\App\Models\Service::count()}}</h3>
                <p>Services</p>
            </div>
            <div class="icon text-light">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
            </div>
            <a href="{{url('admin/servicess')}}" class="small-box-footer">
                <span class="text-light"> Plus d'informations</span> <i class="fas fa-arrow-circle-right text-light"></i>
            </a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="small-box bg-warning">
            <div class="inner text-light">
                <h3>{{\App\Models\Conge::count()}}</h3>
                <p>Conges</p>
            </div>
            <div class="icon text-light">
                <i class="fa fa-file" aria-hidden="true"></i>
            </div>
            <a style="color:white;" href="{{url('admin/conges')}}" class="small-box-footer">
                <span class="text-light "> Plus d'informations</span> <i class="fas fa-arrow-circle-right text-light"></i>
            </a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="small-box bg-indigo">
            <div class="inner">
                <h3>{{\App\Models\Attestation::count()}}</h3>
                <p>attestation de travail</p>
            </div>
            <div class="icon">
                <i class="fa fa-file text-light" aria-hidden="true"></i>
            </div>
            <a href="{{url('admin/attestations')}}" class="small-box-footer">
                Plus d'informations <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

</div>
@stop

@section('css')

@stop

@section('js')

@stop

@section('footer')
<footer class="container p-4 rounded">
    <div class="d-lg-flex justify-content-between">
        <div>
            <p style="font-weight: bold; font-size:x-large"> <span style="color:red">M</span>arsa maroc </p>
        </div>
        <div class="copyright" style="color:black; font-weight:700">
            <p>© 2023 Marsa_Maroc, Tout droits réservés |<a href="https://ma.linkedin.com/in/ayoub-elharba-a8b759231?trk=public_profile_browsemap" target="_blank">Créer par Ayoub Elharba</a></p>
        </div>
        <div>


        </div>
    </div>
    @endsection