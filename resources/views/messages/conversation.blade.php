
 <li class="user">
    @php
    if($user->hasRole('Super Admin')){
    $route = route('admins.show',$user->admin->id);
     $role = "Admin";
    }elseif($user->hasRole('Professeur')){
    $route = route('professeurs.show',$user->professeur->id);
    $role = "Professeur";
    }elseif($user->hasRole('User')){
    $route = route('etudiants.show',$user->etudiant->id);
    $role = "Etudiant(e)";
    }else{
    $route ='#';
    $role = "";
    }

    @endphp
     <a href="{{$route}}">
    {{--will show unread count notification--}}
   {{-- @if($user->unread)
 <span class="pending">{{ $user->unread }}</span>
  @endif--}}
  @php
  try {
     //code...
     $path= $user->docFiles->where('type','profileImg')->first()->path;
 } catch (\Throwable $th) {

   $path= null;
 }


  @endphp

 
  <div class="media" >
      <div class="media-left">
          <img src="{{($path==null)?URL::asset('/assets/images/users/avatar-3.jpg'):url("file_storage/$path")}}" alt="" >

      </div>

      <div class="media-body" style="align-self: center;">
         <p class="name">{{ $user->firstname }} {{ $user->lastname }} <span class="text-muted">({{$role}})</span></p>
      </div>
      
  </div>
     </a>
</li>
<div class="message-wrapper">
    <ul class="messages">
        @foreach($messages as $message)
            <li class="message clearfix">
                {{--if message from id is equal to auth id then it is sent by logged in user --}}
                <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                    <p style="text-align: start;">{{ $message->message }}</p>
                    <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<div class="input-text">
    <input type="text" name="message" class="submit" placeholder="Type a message..">
</div>