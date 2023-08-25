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
                        Ajouter un nouvel conge
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{ route('conges.store') }}" enctype="multipart/form-data">
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

                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="cin">Type d'absence</label>
                            <select class="custom-select" name="droitConge" id="droitConge">
                                <option value="">Select une Valeur</option>
                                <option value="Circoncision">Circoncision</option>
                                <option value="Deces d'un frere d'une soeur ou d'un ascendant">Deces d'un frere/ d'une soeur ou d'un ascendant</option>
                                <option value="deces du conjoint ou enfant">deces du conjoint ou enfant</option>
                                <option value="Demenagement">Demenagement</option>
                                <option value="Demenagement pour mutation geographique">Demenagement pour mutation geographique</option>
                                <option value="Hospitalisation apres Maladie Courte Duree">Hospitalisation apres Maladie Courte Duree</option>
                                <option value="Hospitalisation conjoint ou enfant">Hospitalisation conjoint ou enfant</option>
                                <option value="Maladie Courte Duree">Annuel</option>
                                <option value="Maladie Longue Duree">Maladie Longue Duree</option>
                                <option value="Mariage">Mariage</option>
                                <option value="Mariage d'un enfant">Mariage d'un enfant</option>
                                <option value="Maternite">Maternite</option>
                                <option value="Naissance">Naissance</option>
                                <option value="Pelerinage">Pelerinage</option>
                            </select>
                            <!-- <input type="text" name="droitConge" value="{{old("droitConge")}}" placeholder="droit Conge" class="form-control" required> -->
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="duree"> duree (jours)</label>
                            <input type="number" class="form-control" value="{{old("duree")}}" placeholder="duree" name="duree" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="dataDepart">data Depart</label>
                            <input type="date" class="form-control" value="{{old("dataDepart")}}" placeholder="data Depart" name="dataDepart" required>
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