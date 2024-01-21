<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a style="text-align:center;" href="{{url('index')}}" class="logo logo-dark">
                    <span class="logo-sm" style="margin-left:-8px;">
                        <img src="{{ URL::asset('/assets/images/Icon-180x180.png')}}" alt="" height="35">
                    </span>
                    <span class="logo-lg">
                        <img  src="{{ URL::asset('/assets/images/logo-topBar.png')}}" height="35">
                    </span>
                </a>

                <a  style="text-align:center;" href="{{url('index')}}" class="logo logo-light">
                    <span class="logo-sm" style="margin-left:-8px;">
                        <img src="{{ URL::asset('/assets/images/Icon-180x180.png')}}" alt="" height="35">
                    </span>
                    <span class="logo-lg">
                        <img  src="{{ URL::asset('/assets/images/logo-topBar.png')}}" height="35">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

        </div>



        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <a type="button" href="{{route('logout')}}" style="padding-top: 1.47em;"
                    class="btn btn-sm btn-link  header-item noti-icon waves-effect">
                    <i class="ri-shut-down-line align-middle mr-1 text-danger"></i>
                </a>
            </div>


            @php
            if(Auth::user()->hasRole('Super Admin')){
            $route = route('admins.profile');
           
            }elseif(Auth::user()->hasRole('Professeur')){
            $route = route('professeurs.profile');

            }elseif(Auth::user()->hasRole('User')){
            $route = route('etudiants.profile');
            }else{
            $route ='#';
            }


            $img = Auth::user()->docFiles->where('type','profileImg')->first();
            $path= ($img==null)?null:$img->path;

            @endphp
            <div class="dropdown d-lg-inline-block ml-1">

                <a type="button" href="{{$route}}" style="padding-top: 1.20em;" aria-haspopup="true"
                    class="btn header-item waves-effect" aria-expanded="false"><img
                        class="rounded-circle header-profile-user me-1" src="{{($path==null)?URL::asset('/assets/images/users/avatar-3.jpg'):url("file_storage/$path")}}"
                        alt="Header Avatar">
                </a>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="header-item noti-icon right-bar-toggle waves-effect btn btn-none">
                    <i class="ri-settings-2-line"></i></button>
            </div>

        </div>
</header>