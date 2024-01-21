<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->

            <ul class="metismenu list-unstyled" id="side-menu">
                
               <li class="menu-title">Menu</li>
                @if(Auth::user()->hasRole('Super Admin'))
                
                <li>
                    <a href="javascript: void(0);"  class="has-arrow  waves-effect">
                        <i class="fas fa-briefcase"></i>
                        <span>Stages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        
                            <li><a href="{{route('stages.index')}}"><span>Liste</span></a></li>
                            <li><a href="{{route('stages.valid')}}"><span>Stages Validé</span></a></li>
                           
                    </ul>
                   
                </li>
                
               <li>
                <a href="javascript: void(0);"  class="has-arrow  waves-effect">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Etudiants</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    
                        <li><a href="{{route('etudiants.parProf')}}"><span>Par Encadrant</span></a></li>
                        <li><a href="{{route('etudiants.sansEncadr')}}"><span>Sans Encadrant</span></a></li>
                        <li><a href="{{route('etudiants.sansRapp')}}"><span>Sans Rapport</span></a></li>
                        <li><a href="{{route('etudiants.sansStage')}}"><span>Sans Stage</span></a></li>
                   
                </ul>
               
            </li>
                <li>
                    <a href="{{route('stages.notes')}}" class="waves-effect">
                        <i class="ri-file-edit-fill"></i>
                        <span>E-Notes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    </ul>
                </li>
                <li>
                    <a href="{{route('utilisateurs.getView')}}" class="waves-effect">
                        <i class="ri-user-fill"></i>
                        <span>@lang('translation.utilisateurs')</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('entreprises.index')}}" class="waves-effect">
                        <i class="ri-building-2-fill"></i>
                        <span>Entreprises</span>
                    </a>
                </li>
               @elseif(Auth::user()->hasRole('User'))
               <li>
                   <a href="{{route('stages.index')}}"  class=" waves-effect">
                       <i class="fas fa-briefcase"></i>
                       <span>Stages</span>
                   </a>
                   <ul class="sub-menu" aria-expanded="false">
                       
                   </ul>
               </li>
               @elseif(Auth::user()->hasRole('Professeur'))
               
              
               <li>
                   <a href="javascript: void(0);"  class="has-arrow  waves-effect">
                       <i class="fas fa-briefcase"></i>
                       <span>Stages</span>
                   </a>
                   <ul class="sub-menu" aria-expanded="false">
                       
                           <li><a href="{{route('stages.index')}}"><span>Stages</span></a></li>
                           <li><a href="{{route('stages.encadrer')}}"><span>Stages Encadré</span></a></li>
                      
                   </ul>
                  
               </li>
               <li>
                <a href="{{route('stages.notes')}}" class="waves-effect">
                    <i class="ri-file-edit-fill"></i>
                    <span>E-Notes</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                </ul>
               </li>
               @endif
               





                <li>
                    <a href="{{route('documents.index')}}" class="waves-effect">
                        <i class=" ri-file-copy-line"></i>
                        <span>E-Documents</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    </ul>
                </li>

                <li>
                    <a href="{{route('messages')}}" class="waves-effect">
                        <i class="ri-chat-voice-fill"></i>
                        <span>Messages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    </ul>
                </li>

                <li class="fixed-bottom" style="max-width: 240px;">
                    <a href="{{route('support')}}" class="waves-effect">
                        <i class="fas fa-headset"></i>
                        <span>Support</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    </ul>
                </li>

              

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
