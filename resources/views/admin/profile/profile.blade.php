@extends('layouts.master-educa')
@section('title')
    Profile
@endsection
@section('css')
 <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@component('components.breadcrumb')
    @slot('title') E-Stage @endslot
    @slot('li_1') Admin @endslot
    @slot('li_2') Profile @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="product-detail">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                            <div class="product-img">

                                                @php
                                                try {
                                                   //code...
                                                   $path= $admin->user->docFiles->where('type','profileImg')->first()->path;
                                               } catch (\Throwable $th) {

                                             $path= null;
                                               }


                                                @endphp

                                                <img src="{{($path==null)?URL::asset('/assets/images/users/avatar-3.jpg'):url("file_storage/$path")}}" alt="" class="img-fluid mx-auto d-block" data-zoom="assets/images/product/img-1.png">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end product img -->
                    </div>
                    <div class="col-xl-9">
                        <div class="mt-4 mt-xl-3">

                              
                            @if($admin->user->id == Auth::id())
                            <button class=" btn btn-outline-success waves-effect waves-light btn-edit" type="button"
                                       ><i
                                            class="mdi mdi-account-edit mr-2 align-middle"></i>modifier votre profile</button>
                          @else

                          <button class=" btn btn-outline-primary waves-effect waves-light btn-message" type="button"
                          ><i
                               class="mdi mdi-message mr-2 align-middle"></i>Contacter</button>
            
                          @endif

                            <h5 class="mt-3 mb-3">@if($admin!=null) {{Str::upper($admin->user->lastname) }} {{$admin->user->firstname}}@endif  <span class="text-muted" >(Admin)</span></h5>
                            <h6 class="mt-3 text-muted "> <i class="mdi mdi-email mr-1 align-middle"></i> {{($admin==null)?'NaN':$admin->user->email}} </h6>
                             
                


                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->
@if($admin->user->id == Auth::id())
@include('admin.profile.edit')
@else
@include('admin.profile.message')
@endif
@endsection
@section('script')
@if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="update")
        <script>$('#editModal').modal('toggle');</script>
    @endif
<script>

                  
    
function getName(e, elementCourant){
            var name=e.target.files[0].name;
            $(elementCourant).siblings('label').html(name);
        }

$('.btn-edit').on('click', function () {
    $("#editModal").modal('show');
});

$('.btn-message').on('click', function () {
    $("#messageModal").modal('show');
});
</script>
@endsection