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
    @slot('li_2') Stages Encadrés @endslot
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
           
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table mt-4">
                        <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th style="width: 85.0781px;">Sujet</th>
                                <th>Description</th>
                                <th style="width: 130px;">Groupe de stage</th>
                                <th>Entreprise</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stages as $stage)
                                <tr>
                                    <td>stage_{{$stage->id}}</td>
                                    <td>{{$stage->sujet}}</td>
                                    <td>{{$stage->description}}</td>
                                     <td>@foreach ($stage->etudiants as $etu ) {{$etu->user->firstname}} {{$etu->user->lastname}} , @endforeach</td>
                                    <td>{{$stage->entreprise->acronyme}}</td>
                                    <td>@if ($stage->note)<span class="bg-soft-success badge me-5" style="color:white; font-size : 16px;">{{$stage->note}}</span> @else <span class="bg-soft-danger badge me-5" style="color:white; font-size : 16px;">Pas Encore noté</span> @endif </td>
                                    <td>
                                        <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Noter" style="width: 90%;" class="btn btn-info p-1  btn-edit" type="button" data-route="{{route('stages.editNote', $stage->id)}}" ><i class="mdi mdi-22px mdi-file-document-edit-outline"></i></button>
                                           
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

@include('professeur.notes.edit')
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

                    $('#stage_id').val("stage_"+stage.id);
                    $('#note_stage').val(stage.note);
                    $("#editForm").attr("action",response.route);
                    $("#editModal").modal('show');
                },
                error: function(response){ 
                    console.log(response.responseText);
                }
            })
        });
        

    </script>
@endsection
