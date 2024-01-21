@extends('layouts.master-educa')
@section('title')Messanger @endsection
@section('css')

<style type="text/css">
      
    /* width */
     ::-webkit-scrollbar {
         width: 7px;
     }
     /* Track */
     ::-webkit-scrollbar-track {
         background: #f1f1f1;
     }
     /* Handle */
     ::-webkit-scrollbar-thumb {
         background: #a7a7a7;
     }
     /* Handle on hover */
     ::-webkit-scrollbar-thumb:hover {
         background: #929292;
     }
     ul {
         margin: 0;
         padding: 0;
     }
     li {
         list-style: none;
     }
     .user-wrapper, .message-wrapper {
         border: 1px solid #dddddd;
         overflow-y: auto;
     }
     .user-wrapper {
         height: 600px;
     }
     
     .user.active {
         background: #eeeeee;
     }
     .user {
         background-color: #ffffff;
         top: 5px;
         cursor: pointer;
         padding: 5px 0;
         position: relative;
     }
     .user:hover {
        background-color: #f2f2f2;
     }
     .user:last-child {
         margin-bottom: 0;
     }
     .name{
        font-weight: 900;
     }
     .pending {
         position: absolute;
         left: 13px;
         top: 9px;
         background: #b600ff;
         margin: 0;
         border-radius: 50%;
         width: 18px;
         height: 18px;
         line-height: 18px;
         padding-left: 5px;
         color: #ffffff;
         font-size: 12px;
     }
     .media-left {
         margin: 0 10px;
     }
     .media-left img {
         width: 54px;
         height: 54px;
         border-radius: 64px;
     }
     .media-body p {
         margin: 6px 0;
     }
     .message-wrapper {
         padding: 10px;
         height: 536px;
         background: #efeae2;
     }
     .messages .message {
         margin-bottom: 15px;
     }
     .messages .message:last-child {
         margin-bottom: 0;
     }
     .received, .sent {
         width: 45%;
         padding: 3px 10px;
         border-radius: 10px;
     }
     .received {
         background: #ffffff;
     }
     .sent {
         background: #16a389;
         float: right;
         color: #ffffff;
         text-align: right;
     }
     .message p {
         margin: 5px 0;
     }
     .sent .date {
         color: #ffffff;;
         font-size: 12px;
     }
     .received .date {
         color: #494848;
         font-size: 12px;
     }
     input[type=text] {
         width: 100%;
         padding: 12px 20px;
         margin: 15px 0 0 0;
         display: inline-block;
         border-radius: 4px;
         box-sizing: border-box;
         outline: none;
         border: 1px solid #cccccc;
     }
     input[type=text]:focus {
         border: 1px solid #aaaaaa;
     }
     .dt{
         float: right;
         padding-right: 20px;
         padding-top: 5px;
         color: #777777;
         font-size: 12px;
     }

     

</style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users">
                        @foreach($users as $user)
                            <li class="user" id="{{ $user->id }}">
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

                               
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{($path==null)?URL::asset('/assets/images/users/avatar-3.jpg'):url("file_storage/$path")}}" alt="" >
            
                                    </div>

                                    <div class="media-body">
                                       <p class="name">{{ $user->firstname }} {{ $user->lastname }} <span class="dt"></span>
                                        <p class="email">{{ $user->email }}</p>
                                    </div>
                                    
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-8" id="messages">

            </div>
        </div>
    </div>
@endsection
@section('script')

<script src="https://js.pusher.com/5.1/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

 var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
        // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        

            // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('4027fe981f2a214af229', {
      cluster: 'ap2',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
     //alert(JSON.stringify(data));
      if (my_id == data.from) {
                //$('#' + data.to).click();
            } else if (my_id == data.to) {
            if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());
                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }
        });




        $('.user').click(function () {
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();


            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "message/" + receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                    $('#messages').html(data);
                    scrollToBottomFunc();
    
                }
            });
        });

        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();
            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); // while pressed enter text box will be empty
                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "message", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {
                        $('.messages').append("<li class='message clearfix'>  <div class='sent' > <p style='text-align: start;'>"+ message+"</p> <p class='date'>Just Now</p> </div> </li>");
                    
                           
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                       
                        scrollToBottomFunc();
                        }
                })
            }
        });
});

     // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
   
</script>
@endsection