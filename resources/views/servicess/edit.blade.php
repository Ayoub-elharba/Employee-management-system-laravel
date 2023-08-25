@extends('adminlte::page')

@section('title', 'departements Management System | Update')

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
                        Modifier services
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{ route('servicess.update',$service->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="d_titre" class="form-label fw-bold">service</label>
                            <input type="text" name="d_titre" value="{{old('d_titre',$service->titre)}}" placeholder="nom service" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="d_titre" class="form-label fw-bold">nom Devision</label></br>

                            <select class="custom-select" name="d_divis" id="d_divis">
                                @foreach($Devisions as $Devision)
                                <option value="{{$Devision->id}}">{{$Devision->nomD}}</option>
                                @endforeach
                            </select>
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