@extends('adminlte::page')

@section('title', 'Employes Management System | Update')

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
                        Modifier employe
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{ route('conges.update',$employe->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="nomComplet" class="form-label fw-bold">nomComplet</label>
                            <select class="custom-select" name="Idemploye" id="Idemploye" style="color:red;font-weight:bold;">
                                <option value="{{$employee->id}}">{{$employee->nomComplet}}</option>
                            </select>
                            <!-- <input type="text" name="Idemploye" id="Idemploye" style="color:red" value="{{$employee->id}}" disabled class="form-control"> -->

                        </div>
                        <div class=" form-group mb-3">
                            <label class="form-label fw-bold" for="cin">CIN</label>
                            <input type="text" style="color:red;font-weight:bold;" value="{{old('cin',$employee->cin)}}" disabled class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="cin">droit Conge</label>
                            <input type="text" name="droitConge" value="{{old('droitConge',$employe->droitConge)}}" placeholder="droit Conge" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="duree"> duree (jours)</label>
                            <input type="number" class="form-control" value="{{old('duree',$employe->duree)}}" placeholder="duree" name="duree" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="dataDepart">data Depart</label>
                            <input type="date" class="form-control" value="{{old('dataDepart',$employe->dataDepart)}}" placeholder="data Depart" name="dataDepart" required>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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