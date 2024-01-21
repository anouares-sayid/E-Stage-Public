@extends('layouts.master-educa')
@section('title') Documents @endsection
@section('css')

<link href="{{ URL::asset('/assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />

<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('title') E-Stage @endslot
@slot('li_1') Liste @endslot
@slot('li_2') Documents @endslot
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
                    <button class="btn btn-primary waves-effect waves-light" id="ajoutButton" data-toggle="modal"><i
                            class="mdi mdi-plus mr-1"></i>Ajouter</button>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table mt-4">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th style="width: 85.0781px;">Type</th>
                                <th>Commentaire</th>
                                <th>Stage id</th>
                                <th>Version</th>
                                <th>Download</th>
                                <th>Date de creation</th>
                                <th>Date de modification</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                            <tr>
                                <td>doc_{{$document->id}}</td>
                                @if($document->attestation_id != null)

                                <td>Attestation</td>
                                <td>{{$document->attestation->commentaire}}</td>
                                <td>stage_{{$document->attestation->stage->id}}</td>
                                <td><span class="bg-danger badge me-5"
                                        style="color:white; font-size : 16px;">sans</span></td>


                                @elseif($document->presentation_id != null)
                                <td>Presentation</td>
                                <td>{{$document->presentation->commentaire}}</td>
                                <td>stage_{{$document->presentation->stage->id}}</td>
                                <td><span class="bg-danger badge me-5"
                                        style="color:white; font-size : 16px;">sans</span></td>

                                @elseif($document->rapport_id != null)
                                <td>Rapport</td>
                                <td>{{$document->rapport->commentaire}}</td>
                                <td>stage_{{$document->rapport->stage->id}}</td>
                                <td><span class="bg-success badge me-5"
                                        style="color:white; font-size : 16px;">{{($document->rapport->version =="firstV")?'Premier Version':'Dernier Version'}}</span></td>

                                @elseif($document->fiche_evaluation_id != null) <td>Fiche d'evaluation</td>
                                <td>{{$document->ficheEvaluation->commentaire}}</td>
                                <td>stage_{{$document->ficheEvaluation->stage->id}}</td>
                                <td><span class="bg-danger badge me-5"
                                        style="color:white; font-size : 16px;">sans</span></td>

                                @endif
                                <td> <a href="{{ url('/download/'.$document->path)}}" target="_blank">
                                    <button class="btn"><i class="fa fa-download"></i> Download File</button>
                                </a></td>
                                <td>{{$document->created_at}}</td>
                                <td>{{$document->updated_at}}</td>
                                <td>
                                    <form action="{{ route('documents.destroy', $document->id) }}" method="POST">
                                        <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" style="width: 45%;"  class="btn btn-info p-1  btn-edit" type="button"
                                            data-route="{{route('documents.edit', $document->id)}}"><i
                                                class="mdi mdi-22px mdi-file-document-edit-outline"></i></button>
                                        @csrf
                                        @method('DELETE')
                                        <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer" style="width: 45%;" class="btn btn-danger p-1 " name="archive" type="submit"><i
                                                class="mdi mdi-22px mdi-delete"></i> </button>
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
@include('etudiant.documents.edit')
@include('etudiant.documents.add')
@endsection
@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js')}}"></script>

<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js')}}"></script>

@if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="store")
<script>
    $('#ajoutModal').modal('toggle');   
</script>
@endif
@if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="update")
<script>
    $('#editModal').modal('toggle');
</script>
@endif
<script>
    $(document).ready(function(){
            $('.btn-edit').on('click',function(event){
            
               
                $('#divM').toggle(1000);

            });
        });

        $('.btn-edit').on('click', function () {
            var route = $(this).data('route');
            $.ajax({
                url: route,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    docFile = response['docFile']
                    documentt = response['document']
                    $('#commentaire').val(documentt['commentaire']);
                    $('option[value='+response['docType']+']').attr('selected', 'selected');
                    $('option[value='+documentt['version']+']').attr('selected', 'selected');
                    $('#stage_'+documentt['stage_id']).attr('selected', 'selected');
                    $("#docFile").siblings('label').html(docFile['path'].substr(5,9)+'....'+docFile['path'].substr(35));
       
                    $("#editForm").attr("action",response['route']);
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
        $('#ajoutEntrepriseButton').on('click', function(e){
             e.preventDefault();
            $("#ajoutEntrepriseModal").modal('show');
        });

        function getName(e, elementCourant){
            var name=e.target.files[0].name;
            $(elementCourant).siblings('label').html(name);
        }


$('#fileTypeSelect').on('change', function(e){
   
       ($('#fileTypeSelect')[0].value == 'rapport')?$('#rapportVersionDiv').show():$('#rapportVersionDiv').hide();
      
    });


    $('#editFileTypeSelect').on('change', function(e){
   
        ($('#editFileTypeSelect')[0].value == 'rapport')?$('#editRapportVersionDiv').show():$('#editRapportVersionDiv').hide();

});
    
     
</script>
@endsection