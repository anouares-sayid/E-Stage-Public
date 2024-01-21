@if ((Auth::user()==null)?false:(Auth::user()->hasRole('User')))
    
<script>window.location = "/etudiant/profile";</script>
@elseif(Auth::user()->hasRole('Professeur'))
<script>window.location = "/professeur/profile";</script>  
@else
    {{-- si le cas d'un admin ou bien etudiant --}}
        
        @extends('layouts.master-educa')
        @section('title') Dashboard  @endsection
        @section('css')
        <!-- DataTables -->
        <link href="{{ URL::asset('/assets/libs/jquery-vectormap/jquery-vectormap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    @endsection
        @section('content')
@component('components.breadcrumb')
    @slot('title') Dashboard @endslot
    @slot('li_1') Admin @endslot
    @slot('li_2') Dashboard @endslot
@endcomponent

    <div class="row" style="
    -webkit-filter: blur(4px);
    -moz-filter: blur(4px);
    -o-filter: blur(4px);
    -ms-filter: blur(4px);
    filter: blur(4px);
">
        <div class="col-xl-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Nombre des Etudiants</p>
                                    <h4 class="mb-0">1452</h4>
                                </div>
                                <div class="text-primary">
                                    <i class="ri-stack-line font-size-24"></i>
                                </div>
                            </div>
                        </div>

                        <div class="card-body border-top py-3">
                            <div class="text-truncate">
                                <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                <span class="text-muted ml-2">From previous period</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Nombre des Candidatures</p>
                                    <h4 class="mb-0">38452</h4>
                                </div>
                                <div class="text-primary">
                                    <i class="ri-store-2-line font-size-24"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top py-3">
                            <div class="text-truncate">
                                <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i> 2.4% </span>
                                <span class="text-muted ml-2">From previous period</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Nombre des Proffeseurs</p>
                                    <h4 class="mb-0">30</h4>
                                </div>
                                <div class="text-primary">
                                    <i class="ri-briefcase-4-line font-size-24"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top py-3">
                            <div class="text-truncate">
                                <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i> 10% </span>
                                <span class="text-muted ml-2">From previous period</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="card">
                <div class="card-body">
                    <div class="float-right d-none d-md-inline-block">
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-sm btn-light">Today</button>
                            <button type="button" class="btn btn-sm btn-light active">Weekly</button>
                            <button type="button" class="btn btn-sm btn-light">Monthly</button>
                        </div>
                    </div>
                    <h4 class="card-title mb-4">Analyse des Notes</h4>
                    <div>
                        <div id="line-column-chart" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>

                <div class="card-body border-top text-center">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="d-inline-flex">
                                <h5 class="mr-2">16,253</h5>
                                <div class="text-success">
                                    <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                </div>
                            </div>
                            <p class="text-muted text-truncate mb-0">This month</p>
                        </div>

                        <div class="col-sm-4">
                            <div class="mt-4 mt-sm-0">
                                <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-primary font-size-10 mr-1"></i> This Year :</p>
                                <div class="d-inline-flex">
                                    <h5 class="mb-0 mr-2"> 14,254</h5>
                                    <div class="text-success">
                                        <i class="mdi mdi-menu-up font-size-14"> </i>2.1 %
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mt-4 mt-sm-0">
                                <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-success font-size-10 mr-1"></i> Previous Year :</p>
                                <div class="d-inline-flex">
                                    <h5 class="mb-0">17,254</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <select class="custom-select custom-select-sm">
                            <option selected>Apr</option>
                            <option value="1">Mar</option>
                            <option value="2">Feb</option>
                            <option value="3">Jan</option>
                        </select>
                    </div>
                    <h4 class="card-title mb-4">Admission par filière</h4>

                    <div id="donut-chart" class="apex-charts"></div>

                    <div class="row">
                        <div class="col-4">
                            <div class="text-center mt-4">
                                <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-primary font-size-10 mr-1"></i> GI</p>
                                <h5>42 %</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center mt-4">
                                <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-success font-size-10 mr-1"></i> GBI</p>
                                <h5>26 %</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center mt-4">
                                <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-warning font-size-10 mr-1"></i> TCC</p>
                                <h5>42 %</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>

                    <h4 class="card-title mb-4">Rapport des charges</h4>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <div class="mb-3">
                                        <div id="radialchart-1" class="apex-charts"></div>
                                    </div>

                                    <p class="text-muted text-truncate mb-2">Weekly </p>
                                    <h5 class="mb-0">2,523 MAD</h5>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mt-5 mt-sm-0">
                                    <div class="mb-3">
                                        <div id="radialchart-2" class="apex-charts"></div>
                                    </div>

                                    <p class="text-muted text-truncate mb-2">Monthly </p>
                                    <h5 class="mb-0">11,235 MAD</h5>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="centered" style=" position: absolute;
   top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align:center;
  font-weight:800;
"><h1 style="color: rgb(0, 83, 150);
font-family: 'Courier New', Courier, monospace;
font-size: 35px;
font-weight:800;">COMING SOON</h1>
    <hr style="margin: auto;
    width: 40%;
    color: rgb(0, 83, 150);
    font-family: 'Courier New', Courier, monospace;
    font-size: 25px;
    font-weight:800;">
    <p id="counter" style="color: #2196f3;
    font-family: 'Courier New', Courier, monospace;
    font-size: 28px;"></p></div>
    <!-- end row -->


    @endsection

    @section('script')
            <!-- plugin js -->
            <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

            <!-- jquery.vectormap map -->
            <script src="{{ URL::asset('/assets/libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>

            <!-- Responsive examples -->
            <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

            <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js')}}"></script>
   <script>
// Set the date we're counting down to
var countDownDate = new Date("July 7, 2022 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in an element with id="demo"
  document.getElementById("counter").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("counter").innerHTML = "EXPIRED";
  }
}, 1000);
       </script>
    @endsection

@endif
