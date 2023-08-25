@extends('adminlte::page')

@section('title', 'Employes Management System | Create')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row my-5">
                <div class="col-md-6 mx-auto">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                        Ajouter un nouvel employé
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{ route('employes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nomComplet" class="form-label fw-bold">nomComplet</label>
                            <input type="text" name="nomComplet" value='{{old("nomComplet")}}' placeholder="nomComplet" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="cin">CIN</label>
                            <input type="text" name="cin" value="{{old("cin")}}" placeholder="cin" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="hire_date">Embauché depuis</label>
                            <input type="date" class="form-control" value="{{old("hire_date")}}" placeholder="Hiring Date" name="hire_date" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="phone">Telephone</label>
                            <input type="text" class="form-control" value="{{old("phone")}}" placeholder="Telephone" name="phone" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="address">Addresse</label>
                            <input type="text" class="form-control" value="{{old("address")}}" placeholder="Address" name="address" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="city">la ville</label>
                            <input type="text" class="form-control" value="{{old("city")}}" placeholder="ville" name="city" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="Idservice" class="form-label fw-bold">Service</label></br>

                            <select class="custom-select" name="Idservice" id="Idservice">
                                <option value="">Select service</option>
                                @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->titre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection