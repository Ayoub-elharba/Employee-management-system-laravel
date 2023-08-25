@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Employes List')

@section('content_header')
@stop

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                @include('layouts.alert')
            </div>
        </div>
        <div class="card my-3">
            <div class="card-header" style="background-color: red; color:white;">
                <h3 class="text-center text-uppercase">
                    Conges
                </h3>
            </div>
            <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>nomComplet</th>
                            <th>cin</th>
                            <th>duree</th>
                            <th>Dernier conge pris</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employes as $key => $employe)
                        <tr>
                            <td>{{$key+=1}}</td>
                            <td>{{$employe->nomComplet}}</td>
                            <td>{{$employe->cin}}</td>
                            <td>{{$employe->duree}}</td>
                            <td>{{$employe->dataDepart}}</td>

                            <td class="d-flex justify-content-center align-items-center">
                                <a href="{{route('vacance_show',$employe->employID)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-print"></i>
                                </a>

                                <a href="{{route('conges.show',$employe->employID)}}" class="btn btn-sm btn-success  mx-2">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{route('conges.edit',$employe->id)}}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- <form id="{{$employe->id}}" action="{{route("conges.destroy",$employe->id)}}" method="post">
                                    @csrf
                                    @method("DELETE")

                                    <button onclick="deleteAd" ({{$employe->id}})" type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'
            ]
        });
    });
</script>
@if(session()->has("success"))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: "{{session()->get('success')}}",
        showConfirmButton: false,
        timer: 3500
    });
</script>
@endif
<script>
    function deleteAd(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger mr-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(id).submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your ad is safe :)',
                    'error'
                )
            }
        })
    }
</script>
@stop