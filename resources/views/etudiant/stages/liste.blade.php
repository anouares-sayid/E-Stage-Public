@extends('layouts.master-educa')
@section('title') Stages @endsection
@section('css')
  
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
  
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') E-Stage @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') Stages @endslot
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
                                <th>id</th>
                                <th style="width: 85.0781px;">Sujet</th>
                                <th>Description</th>
                                <th>Encadrant</th>
                                <th style="width: 150px;">Groupe de stage</th>
                                <th>Entreprise</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stages as $stage)
                                <tr>
                                    <td>stage_{{$stage->id}}</td>
                                    <td>{{$stage->sujet}}</td>
                                    <td>{{$stage->description}}</td>
                                    <td style="text-align: center ;">@if($stage->encadrant){{$stage->encadrant->user->firstname}} {{$stage->encadrant->user->lastname}}@else <span class="bg-danger badge me-5" style="color:white; font-size : 16px;">sans</span> @endif</td>
                                    <td>@foreach ($stage->etudiants as $etu ) {{$etu->user->firstname}} {{$etu->user->lastname}} , @endforeach</td>
                                    <td>{{$stage->entreprise->acronyme}}</td>
                                  
                                    <td >
                                        <form action="{{ route('stages.destroy', $stage->id) }}" method="POST">
                                            <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"  class="btn btn-info p-1" href="{{route('stages.show', $stage->id)}}" ><i class="mdi mdi-22px mdi-eye"></i></a>
                                            <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier"   class="btn btn-info p-1  btn-edit" type="button" data-route="{{route('stages.edit', $stage->id)}}" ><i class="mdi mdi-22px mdi-file-document-edit-outline"></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer"   class="btn btn-danger p-1 " name="archive" type="submit"  ><i class="mdi mdi-22px mdi-delete"></i>   </button>
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
@include('etudiant.stages.edit')
@include('etudiant.stages.add')
@include('etudiant.entreprises.add')
@endsection
@section('script')

<script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>

<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js')}}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="store")
        <script>$('#ajoutModal').modal('toggle');   </script>
    @endif
    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="update")
        <script>$('#editModal').modal('toggle');</script>
    @endif
    <script>

$(document).ready(function(){
            $('.btn-edit').on('click',function(event){
            
               
                $('#divM').toggle(1000);
               // $('#etudiant').val(list);
                //$('#etudiant').select2(list);

            });
        });

        $('.btn-edit').on('click', function () {
            var route = $(this).data('route');
            $.ajax({
                url: route,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    stage = response.stage
                    etudiants = response.etudiants;
                    console.log(etudiants);
                     let list = [];
                   etudiants.forEach((etudiant) =>{ 
                          list.push(etudiant.id);
                    });
                    $('#sujet').val(stage.sujet);
                    $('#encadrant_prof_prenom').val(stage.encadrant_prof_prenom);
                    $('#encadrant_prof_tel').val(stage.encadrant_prof_tel);
                    $('#encadrant_prof_nom').val(stage.encadrant_prof_nom);
                    $('#encadrant_prof_email').val(stage.encadrant_prof_email);
                    $('#description').val(stage.description);
                    $('#entreprise_'+stage.entreprise_id).attr('selected','selected');
                    $('#etudiant').val(list);
                    $('#etudiant').select2(list);
                    $("#editForm").attr("action",response.route);
                    $("#editModal").modal('show');
                },
                error: function(response){ 
                    $("#editForm").attr("action",response.route);
                    $("#editModal").modal('show');
                    console.log(response.responseText);
                }
            })
        });
        $('#ajoutButton').on('click', function(){
            $("#ajoutModal").modal('show');
        });
        $('.ajoutEntrepriseButton').on('click', function(e){
             e.preventDefault();
            $("#ajoutEntrepriseModal").modal('show');
        });
    </script>
@endsection
