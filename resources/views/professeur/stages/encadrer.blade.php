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
                                <th>Status</th>
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
                                    <td>@if ($stage->is_valid) <span class="bg-success badge me-5" style="color:white; font-size : 16px;">Validé</span> @else<span class="bg-soft-dark badge me-5" style="color:white; font-size : 16px;">Pas Encore Validé</span>@endif </td>
                                    <td>
                                        <div class="row" style="
                                        flex-wrap: unset;
                                        margin-right: 0px;
                                        margin-left: 0px;">
                                         <div class="col-md-4 col-4">
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Afficher"  style="width: 100%;" class="btn btn-info p-1" href="{{route('stages.show', $stage->id)}}" ><i class="mdi mdi-22px mdi-eye"></i></a>
                                         </div>
                                            <div class="col-md-4 col-4">
                                        <form action="{{ route('professeurs.retirerStage') }}" method="POST">
                                             @csrf
                                             <input type="hidden" name="stage_id" value="{{$stage->id}}">
                                            <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Retirer" style="width: 100%;" class="btn btn-danger p-1 " name="retirerStage" type="submit"  ><i class="mdi mdi-22px mdi-delete"></i></button>
                                        </form></div> <div class="col-md-4 col-4">
                                            @if ($stage->is_valid) <form action="{{ route('professeurs.unvaliderStage') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="stage_id" value="{{$stage->id}}">
                                               <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Unvalider"  style="width: 100%;" class="btn btn-warning p-1 " name="unvaliderStage" type="submit"  ><i class="mdi mdi-16px mdi-minus-circle"></i>   </button>
                                           </form> @else <form action="{{ route('professeurs.validerStage') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="stage_id" value="{{$stage->id}}">
                                           <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Valider"  style="width: 100%;" class="btn btn-success p-1 " name="validerStage" type="submit"  ><i class="mdi mdi-16px mdi-check"></i>   </button>
                                       </form> @endif 
                                        
                                            </div>
                                        </div>
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

<script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>

<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js')}}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js')}}"></script>

 
   
@endsection
