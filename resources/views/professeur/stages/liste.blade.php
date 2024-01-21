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
            <form action="{{ route('professeurs.encadrerStages') }}" id="encadrerStages" method="POST">
                @csrf
              
                    @if($errors->any() && session()->has('operation') && session()->get('operation') =="encadrer")
                        @foreach($errors->all() as $error)
                            <div class="col-6-auto">
                                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                            </div>
                        @endforeach
                    @endif
                    <input type="hidden" value="" name="stages_id" id="idStages">
                   
            </form>
        <div class="card">
            
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="table-responsive">
                    <div class="col-xl-2 offset-xl-10 offset-lg-9">
                        <button class="btn btn-primary waves-effect waves-light "  style="float: right;" onclick="Encadrer()"  ><i class=""></i>Encadrer</button>
                    </div>
                
                    <table id="datatable" class="table mt-4">
                        <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th style="width: 85.0781px;">Sujet</th>
                                <th>Description</th>
                                <th>Encadrant</th>
                                <th style="width: 150px;">Groupe de stage</th>
                                <th>Entreprise</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stages as $stage)
                                <tr class="stage-row"  data-id="{{$stage->id}}">
                                    <td>stage_{{$stage->id}}</td>
                                    <td>{{$stage->sujet}}</td>
                                    <td>{{$stage->description}}</td>
                                    <td style="text-align: center ;">@if($stage->encadrant){{$stage->encadrant->user->firstname}} {{$stage->encadrant->user->lastname}}@else <span class="bg-danger badge me-5" style="color:white; font-size : 16px;">sans</span> @endif</td>
                                    <td>@foreach ($stage->etudiants as $etu ) {{$etu->user->firstname}} {{$etu->user->lastname}} , @endforeach</td>
                                    <td>{{$stage->entreprise->acronyme}}</td>
                                  <td> 
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Afficher" style="width: 90%;" class="btn btn-info p-1" href="{{route('stages.show', $stage->id)}}" ><i class="mdi mdi-22px mdi-eye"></i></a>
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

  
<!-- Sweet Alerts js -->
<script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- Sweet alert init js-->
<script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js')}}"></script>


    <script>


let Stages = [];
let stagesRows = document.querySelectorAll('.stage-row');


function Encadrer(event){
    for(tr of stagesRows){
        if(tr.classList.contains("selected")){
            Stages.push(tr.getAttribute('data-id'));
           }
    }
    if(Stages.length === 0){
        //event.preventDefault();
        $("#idStages").val(Stages);
        Swal.fire({
            title: 'vous êtes sûr ?',
            text: "Vous devez sélectionnée au moins un stage",
            icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        }).then((result) => {
            
            if (result.isConfirmed) {
                console.log("Ok");
                console.log(Stages);
            }
        });
    }else{
        console.log(Stages);
        $("#idStages").val(Stages);
        $("#encadrerStages").submit();
    }
    Stages = [];
}
 $(document).ready(function() {
        var table = $('#datatable').DataTable( {
            dom: 'lBfrtip',
            select: {
                style: 'multi'
            },
            buttons: [{
                text: 'Select All On Page',
                action: function() {
                    table.rows({
                    page: 'current'
                    }).select();
                }
            }, 'selectNone'
            ],
            "aLengthMenu": [[15, 30, 60, -1], [15, 30, 60, "All"]],
            "iDisplayLength": 15,
            'bDestroy' : true
        } );
    } );
    </script>
@endsection
