@extends('layouts.master-educa')
@section('title') Details de stage @endsection
@section('content')
@component('components.breadcrumb')                
    @slot('title') Stage @endslot
    @slot('li_1') Page @endslot
    @slot('li_2')Details de stage @endslot
@endcomponent 
<!-- Start row -->                
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="product-detail">
                            
                            @if($errors->any() && session()->has('operation') && session()->get('operation') =="encadrer")
                            @foreach($errors->all() as $error)
                                <div class="col-6-auto">
                                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                </div>
                            @endforeach
                        @endif
                            <div class="row">
                                <div class="col-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @php 
                                        $count = 0;
                                        @endphp
                                        @foreach($stage->etudiants as $etudiant)

                                      @php
                                      $count++;
                                                try {
                                                   //code...
                                                   $path= $etudiant->user->docFiles->where('type','profileImg')->first()->path;
                                               } catch (\Throwable $th) {

                                             $path= null;
                                               }


                                                @endphp

                                        <a class="nav-link {{($count==1)?' active':''}}" id="product-{{$count}}-tab" data-toggle="pill" href="#product-{{$count}}" role="tab">
                                            <img src="{{($path==null)?URL::asset('/assets/images/users/avatar-3.jpg'):url("file_storage/$path")}}" data-zoom="{{($path==null)?URL::asset('/assets/images/users/avatar-3.jpg'):url("file_storage/$path")}}"  class="img-fluid mx-auto d-block tab-img rounded">
                                        </a>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="col-md-8 col-9">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        @php 
                                        $count = 0;
                                        @endphp
                                        @foreach($stage->etudiants as $etudiant)
                                        
                                      @php
                                      $count++;
                                                try {
                                                   //code...
                                                   $path= $etudiant->user->docFiles->where('type','profileImg')->first()->path;
                                               } catch (\Throwable $th) {

                                             $path= null;
                                               }


                                                @endphp
                                        
                                        <div class="tab-pane fade {{($count==1)?'show active':''}}  " id="product-{{$count}}" role="tabpanel">
                                            <div class="product-img">
                                                <img src="{{($path==null)?URL::asset('/assets/images/users/avatar-3.jpg'):url("file_storage/$path")}}" alt="" class="img-fluid mx-auto d-block" data-zoom="{{($path==null)?URL::asset('/assets/images/users/avatar-3.jpg'):url("file_storage/$path")}}">
                                            </div>
                                        </div>
                                    @endforeach
                                        
                                        
                                    </div>
                                    @if(Auth::user()->hasRole('Professeur') && $stage->encadrant_id == null)
                                    <div class="row text-center mt-2">
                                        <div class="col-sm-6">
                                            <form action="{{ route('professeurs.encadrerStages') }}"  method="POST">
                                                @csrf
                                              
                                                    <input type="hidden" value="{{$stage->id}}" name="stages_id" id="idStages">
                                                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light mt-2 mr-1">
                                                        <i class="mdi mdi-check mr-2"></i> Encadrer
                                                    </button>
                                            </form>
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="{{route('stages.index')}}" class="btn btn-light btn-block waves-effect  mt-2 waves-light">
                                                <i class="mdi mdi-arrow mr-2"></i>Annuler
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end product img -->
                    </div>
                    <div class="col-xl-7">
                        <div class="mt-4 mt-xl-3">
                            <a href="#" class="text-primary">Sujet</a>
                            <h5 class="mt-1 mb-3">{{$stage->sujet}}</h5>

                            <div class="d-inline-flex">
                                <div class="text-muted">Entreprise : {{$stage->entreprise->acronyme}} </div>
                            </div>
                            
                            <h5 class="mt-2 font-size-14 " >Encadrant Pedagogique : @if($stage->encadrant)<a class="" target="_blank" href="{{route('professeurs.show',$stage->encadrant->id)}}">{{$stage->encadrant->user->firstname}} {{$stage->encadrant->user->lastname}}   <i class="mdi mdi-open-in-new text-primary mr-1 align-middle font-size-16 "></i></a>@else <span class="bg-danger badge me-5" style="color:white; font-size : 16px;">SANS</span> @endif</h5>
                            <hr class="my-4">

                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        

                                        <h5 class="font-size-14">Etudiant(s) :</h5>
                                        @foreach ($stage->etudiants as $etudiant)
                                        <ul class="list-unstyled product-desc-list">
                                            <li><a target="_blank" href="{{route('etudiants.show',$etudiant->id)}}"><i class="fas fa-user text-primary mr-1 align-middle font-size-16"></i>{{$etudiant->user->lastname}} {{$etudiant->user->firstname}}  <i class="mdi mdi-open-in-new text-primary mr-1 align-middle font-size-16 "></i></a></li>
                                            <li><i class="mdi mdi-barcode text-primary mr-1 align-middle font-size-16"></i>{{$etudiant->apogee}}</li>
                                            <li><i class="mdi mdi-email text-primary mr-1 align-middle font-size-16"></i>{{$etudiant->user->email}}</li>
                                            <li><i class="fas fa-graduation-cap text-primary mr-1 align-middle font-size-16"></i>{{$etudiant->diplome}}</li>
                                        </ul>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div>
                                    <h5 class="font-size-14">Encadrant Professionnel :</h5>
                                    <ul class="list-unstyled product-desc-list">
                                        <li><i class="fas fa-user text-primary mr-1 align-middle font-size-16"></i>{{$stage->encadrant_prof_nom}} {{$stage->encadrant_prof_prenom}}</li>
                                        <li><i class="mdi mdi-phone text-primary mr-1 align-middle font-size-16"></i>{{$stage->encadrant_prof_tel}}</li>
                                        <li><i class="mdi mdi-email text-primary mr-1 align-middle font-size-16"></i>{{$stage->encadrant_prof_email}}</li>
                                        </ul>
                                </div>
                            </div>
                            </div>

                 
                            
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="mt-4">
                    <h5 class="font-size-14 mb-3">Plus d'informations </h5>
                    <div class="product-desc">
                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="desc-tab" data-toggle="tab" href="#desc" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="specifi-tab" data-toggle="tab" href="#specifi" role="tab">Documents</a>
                            </li>
                        </ul>
                        <div class="tab-content border border-top-0 p-4">
                            <div class="tab-pane fade" id="desc" role="tabpanel">
                                <div>
                                    {{$stage->description}}
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="specifi" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 400px;">Rapport</th>
                                                <td>
                                                    @foreach ($stage->rapports as $rapport)
                                                    <a href="{{ url('/download/'.$rapport->docFile->path)}}" target="_blank">
                                                        <button class="btn"><i class="fa fa-download"></i> Download File</button>
                                                    </a>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fiches d'evaluation</th>
                                                <td>@foreach ($stage->ficheEvaluations as $ficheEvaluation)
                                                    <a href="{{ url('/download/'.$ficheEvaluation->docFile->path)}}" target="_blank">
                                                        <button class="btn"><i class="fa fa-download"></i> Download File</button>
                                                    </a>
                                                    @endforeach</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Attestations</th>
                                                <td>@foreach ($stage->attestations as $attestation)
                                                    <a href="{{ url('/download/'.$attestation->docFile->path)}}" target="_blank">
                                                        <button class="btn"><i class="fa fa-download"></i> Download File</button>
                                                    </a>
                                                    @endforeach</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Presentation</th>
                                                <td>@foreach ($stage->presentations as $presentation)
                                                    <a href="{{ url('/download/'.$presentation->docFile->path)}}" target="_blank">
                                                        <button class="btn"><i class="fa fa-download"></i> Download File</button>
                                                    </a>
                                                    @endforeach</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->
@endsection