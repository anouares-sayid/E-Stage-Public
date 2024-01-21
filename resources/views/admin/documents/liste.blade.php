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
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table mt-4">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th style="width: 85.0781px;">Type</th>
                                <th>Commentaire</th>
                                <th>Version</th>
                                <th>Stage id</th>
                                <th>Download</th>
                                <th>Date de creation</th>
                                <th>Date de modification</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                            <tr>
                                <td>doc_{{$document->id}}</td>
                                @if($document->attestation_id != null)

                                <td>Attestation</td>
                                <td>{{$document->attestation->commentaire}}</td>
                                
                                <td><span class="bg-danger badge me-5"
                                        style="color:white; font-size : 16px;">sans</span></td>

                                        <td>stage_{{$document->attestation->stage->id}}</td>
                                @elseif($document->presentation_id != null)
                                <td>Presentation</td>
                                <td>{{$document->presentation->commentaire}}</td>
                               
                                <td><span class="bg-danger badge me-5"
                                        style="color:white; font-size : 16px;">sans</span></td>
                                        <td>stage_{{$document->presentation->stage->id}}</td>
                                @elseif($document->rapport_id != null)
                                <td>Rapport</td>
                                <td>{{$document->rapport->commentaire}}</td>
                               
                                <td><span class="bg-success badge me-5"
                                        style="color:white; font-size : 16px;">{{($document->rapport->version =="firstV")?'Premier Version':'Dernier Version'}}</span></td>
                                        <td>stage_{{$document->rapport->stage->id}}</td>
                                @elseif($document->fiche_evaluation_id != null) <td>Fiche d'evaluation</td>
                                <td>{{$document->ficheEvaluation->commentaire}}</td>
                                <td><span class="bg-danger badge me-5"
                                        style="color:white; font-size : 16px;">sans</span></td>
                                        <td>stage_{{$document->ficheEvaluation->stage->id}}</td>
                               
                                @endif
                                <td> <a href="{{ url('/download/'.$document->path)}}" target="_blank">
                                    <button class="btn"><i class="fa fa-download"></i> Download File</button>
                                </a></td>
                                <td>{{$document->created_at}}</td>
                                <td>{{$document->updated_at}}</td>
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

<!-- Required datatable js -->
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js')}}"></script>

<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js')}}"></script>

@endsection