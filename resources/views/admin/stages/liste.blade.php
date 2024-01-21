@extends('layouts.master-educa')
@section('title') Stages @endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
<style>

    #datatable_wrapper > div.dt-buttons.btn-group.flex-wrap{
    
        float: left;    
    
    }
    #datatable_length{
        padding-bottom: 10px;
    }
    </style>
  
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
            
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="table-responsive">
                
                    <table id="datatable" class="table mt-4">
                        <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th style="width: 85.0781px;">Sujet</th>
                                <th>Description</th>
                                <th style="width: 150px;">Groupe de stage</th>
                                <th>Entreprise</th> 
                                <th>Encadrant</th>
                               <th> Actions</th>
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
                                    <td style="text-align: center ;">@if($stage->encadrant){{$stage->encadrant->user->firstname}} {{$stage->encadrant->user->lastname}}@else <span class="bg-danger badge me-5" style="color:white; font-size : 16px;">sans</span> @endif</td>
                                   <td> <a class="btn btn-info p-1" href="{{route('stages.show', $stage->id)}}" ><i class="mdi mdi-22px mdi-eye"></i></a>
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
@endsection
@section('script')

<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js')}}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js')}}"></script>


   
@endsection
