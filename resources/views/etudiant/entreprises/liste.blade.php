@extends('layouts.master-educa')
@section('title') Entreprises @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') E-Stage @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') Entreprises @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        @if( session()->has('success') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all mr-2"></i>
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            @endif
            @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="col-6-auto">
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                </div>
            @endforeach
           @endif

        <div class="card">
            <div class="row mb-2 mt-4">
                <div class="col-xl-2 offset-xl-10 offset-lg-9" style="padding-left: 4em;">
                    <button class="btn btn-primary waves-effect waves-light" id="ajoutButton"  data-toggle="modal"><i class="mdi mdi-plus mr-1"></i>Ajouter</button>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table mt-4">
                        <thead class="thead-light">
                            <tr>
                                <th >Acronyme</th>
                                <th>Ville</th>
                                <th>tel</th>
                                <th >Adresse</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entreprises as $entreprise)
                                <tr>
                                    <td>{{$entreprise->acronyme}}</td>
                                    <td>{{$entreprise->ville}}</td>
                                    <td>{{$entreprise->tel}}</td>
                                    <td>{{$entreprise->adresse}}</td>
                                  
                                    <td> 
                                        
                                        <form action="{{ route('entreprises.destroy', $entreprise->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-info p-1  btn-edit" type="button" data-route="{{route('entreprises.edit', $entreprise->id)}}" ><i class="mdi mdi-22px mdi-file-document-edit-outline"></i></button>
                                       
                                            <button class="btn btn-danger p-1 " name="archive" type="submit"  ><i class="mdi mdi-22px mdi-delete"></i>   </button>
                                        </form>
                                         
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div>
      
    </div>
</div>
@include('etudiant.entreprises.edit')
@include('etudiant.entreprises.add')
@endsection
@section('script')

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="store")
        <script>$('#ajoutEntrepriseModal').modal('toggle');   </script>
    @endif
    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="update")
        <script>$('#editModal').modal('toggle');</script>
    @endif
    <script>

      

        $('.btn-edit').on('click', function () {
            var route = $(this).data('route');
            $.ajax({
                url: route,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    $("#editForm").attr("action",response.route);
                    $("#acronyme").attr("value",response.entreprise.acronyme);
                    $("#adresse").html(response.entreprise.adresse);
                    $("#tel").attr("value",response.entreprise.tel);
                    $("#ville").attr("value",response.entreprise.ville);
                    $("#editModal").modal('show');
                },
                error: function(response){
                    console.log(response.responseText);
                }
            })
        });
        $('#ajoutButton').on('click', function(){
            $("#ajoutEntrepriseModal").modal('show');
        });
    </script>
@endsection
