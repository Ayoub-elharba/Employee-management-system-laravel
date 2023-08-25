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
                        Ajouter un nouvel attestation </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{ route('attestations.store') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group mb-3">
                            <label for="Idemploye" class="form-label fw-bold">employe</label></br>

                            <select class="custom-select" name="Idemploye" id="Idemploye">
                                <option value="">Select employe</option>
                                @foreach($employes as $employe)
                                <option value="{{$employe->id}}">{{$employe->nomComplet}}</option>
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