@extends('layout.retailer')
@section('content')

<div class="app-content content chat-application">
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-area-wrapper">

<div class="content-right mx-auto d-block">
<div class="content-wrapper">
<div class="content-header row">
</div>
<div class="content-body">
<div class="body-content-overlay"></div>
<!-- Main chat area -->
<section class="chat-app-window">

<div class="active-chat">
<!-- Chat Header -->
<div class="chat-navbar">
<header class="chat-header">
<div class="d-flex align-items-center">
<div class="sidebar-toggle d-block d-lg-none mr-1">
    <i data-feather="menu" class="font-medium-5"></i>
</div>
<div class="avatar avatar-border m-0 mr-1">
    @if($admin->logo != null)
    <img src="{{ asset('images/'.$admin->logo) }}" style="width: 50px; height:50px; border-radius: 50%;" alt="Toolbar svg" />
    @else
    <img src="{{ asset('images/logos/abc.png') }}" style="width: 50px; height:50px; border-radius: 50%;" alt="Toolbar svg" />
    @endif
    @if(isset($admin))
    <span @if($admin->log == 0) class="avatar-status-offline" @elseif($admin->log == 1) class="avatar-status-online" @endif></span>
    @endif
</div>
<h6 class="mb-0"> {{ $admin->name}} </h6>
</div>
<div class="d-flex align-items-center">

<div class="dropdown">
    <button class="btn-icon btn btn-transparent hide-arrow btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="chat-header-actions">
        <a class="dropdown-item" href="{{route('retailer_chat_del')}}">Clear Chat</a>
    </div>
</div>
</div>
</header>
</div>
<!--/ Chat Header -->

<!-- User Chat messages -->

<div class="user-chats" id="div1">
<div class="chats">
@php
    $counter=0;
@endphp
@foreach ($chat as $item) 
@php
$counter++;
$mime=\App\User::find($item->senderId);
@endphp
    @if($item->status == 0 || $item->status == 2)
<div @if($item->senderId == Auth::user()->id) class="chat" @else class="chat chat-left" @endif>
    <div class="chat" @if($counter == count($chat)) id="last_one" @endif>
    <div class="chat-avatar">
        <span class="avatar box-shadow-1 cursor-pointer">
            @if($item->senderId == Auth::user()->id)

            @if(Auth::user()->logo != null)
            <img src="{{ asset('images/'.Auth::user()->logo) }}" style="width: 50px; height:50px; border-radius: 50%;" />
            @else
            <img src="{{ asset('images/logos/abc.png') }}" style="width: 50px; height:50px; border-radius: 50%;" />
            @endif

            @else

            @if($mime->logo != null)
            <img src="{{ asset('images/'.$mime->logo) }}" style="width: 50px; height:50px; border-radius: 50%;" />
            @else
            <img src="{{ asset('images/logos/abc.png') }}" style="width: 50px; height:50px; border-radius: 50%;" />
            @endif

            @endif
        </span>
    </div>
    <div class="chat-body">
        <div class="chat-content">
            <p>{{ $item->message }}</p>
            
            @if($item->file!=null)
            <a href="#image_larger" data-toggle="modal">  
                <img alt="" style="width: 100px; height: 100px; margin:10px;" class="zoomer bulk" src="{{ asset('images/'.$item->file) }}"> 
            </a>
            @endif
        </div>
    </div>
</div>
</div>
@endif
@endforeach
</div>
</div>


<form class="chat-app-form" action="{{route('send_message')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="input-group input-group-merge mr-1 form-send-message">
    
<input type="text" class="form-control message" name="message" placeholder="Type your message to text" />
<div class="input-group-append">
<span class="input-group-text">
<label for="attach-doc" class="attachment-icon mb-0">
    <i class="fa fa-paperclip cursor-pointer" aria-hidden="true"></i>
    <input type="file" accept="image/*" name="attachment" id="attach-doc" class="image"  hidden /> </label></span>
</div>
</div>
<img src="" id="blah" style="" class="p-1">
<button type="submit" class="btn btn-primary send">

<span class="d-none d-lg-block">Send</span>
</button>


</form>

<!--/ Active Chat -->
</section>
<!--/ Main chat area -->



</div>
</div>
</div>
</div>
</div>
<div id="image_larger" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<!-- Modal Header -->
<div class="modal-header text-center">
<h2 class="modal-title"><i class="fa fa-image"></i> Chat Image </h2>
<h4 class="text-center"> Click The Image Below to Download </h4>
</div>
<!-- END Modal Header -->

<!-- Modal Body -->
<div class="modal-body">
<a class="img_down" href="" download>
<img class="img_load" src="" alt="" style="width: 250px; height: 500px; margin:10px; margin-left:25%;">
</a>

</div>
<!-- END Modal Body -->
</div>
</div>
</div>



<script>

$('.bulk').click(function()
{
var image =$(this).attr('src');
$('.img_load').attr('src',image);
$('.img_down').attr('href',image);
});


</script>

<script>
$("#div1").animate({ scrollTop: $('#div1').prop("scrollHeight")}, 500);
</script>

<script>
$('.del_button').click(function()
{
var id=$(this).attr('id');
$('.del_me').attr('href','/del_me/'+id+'');
$('.del_every').attr('href','/del_every/'+id+'');
});
</script>



<script>
function readimg(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#blah').attr('src', e.target.result);
}

reader.readAsDataURL(input.files[0]);
}
}

$('#blah').attr('style','display:none;')

$(".image").change(function(){
$('#blah').attr('style','width: 100px; height:100px;')
readimg(this);
});
</script>

@endsection