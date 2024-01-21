@extends('layouts.master-educa')
@section('title') Etudiants @endsection
@section('css')
  
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') E-Stage @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') Etudiants qui n’ont pas trouver un stage @endslot
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
                                <th>Apogee</th>
                                <th>Nom Complet</th>
                                <th >Diplome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($etudiants as $etudiant)
                                <tr>
                                    <td>{{$etudiant->apogee}}</td>
                                    <td>{{$etudiant->user->lastname}} {{$etudiant->user->firstname }} </td>
                                    <td>{{$etudiant->diplome}}</td>
                                   
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

<script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>

<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js')}}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js')}}"></script>

 
    
@endsection
