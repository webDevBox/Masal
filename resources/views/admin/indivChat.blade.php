@php
    use Carbon\Carbon;
@endphp
@extends('layout.admin')
@section('content')
    <div class="app-content content chat-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content card">
                        <div class="chat-fixed-search">
                            <div class="d-flex align-items-center w-100">
                                <div class="sidebar-profile-toggle">
                                    <div class="avatar avatar-border">
                                        <img  @if(Auth::user()->logo != null) src="{{ asset('images/'.Auth::user()->logo)}}" @else src="{{ asset('images/logos/abc.png') }}" @endif
                                         alt="user_avatar" height="42" width="42" />
                                        <span class="avatar-status-online"></span>
                                    </div>
                                </div>
                                <div class="input-group input-group-merge ml-1 w-100">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text round"><i data-feather="search" class="text-muted"></i></span>
                                    </div>
                                    <input type="text" class="form-control round" id="chat-search" placeholder="Search For Retailers" aria-label="Search..." aria-describedby="chat-search" />
                                </div>
                            </div>
                        </div>
                       
                        <div id="users-list" class="chat-user-list-wrapper list-group">
                            <h4 class="chat-list-title">Retailers</h4>
                            <ul class="chat-users-list chat-list media-list">

                                @if(count($stokist) > 0)
                                    @foreach ($stokist as $row)
                                    @php
                                    $remain=0;
                                    $message= '';
                                    $id=Auth::user()->id;
                                    $sender=$row->id;
                                    $remain = \App\chatModel::where('marker',1)->where('senderId',$sender)->count();
                                    $chat = \App\chatModel::whereIn('status',[0,1])->whereIn('senderId',[$row->id, $id])->whereIn('receiver', [$row->id, $id])->get();
                                    $time=0;
                                    if(count($chat) > 0)
                                    {
                                        foreach ($chat as $key) {
                                            if($key->message != null)
                                            {
                                                $message = $key->message;
                                            }
                                            else {
                                                $message = 'photo';
                                            }
                                            if($key->message != null && $key->file != null)
                                            {
                                                $message = 'both';
                                            }
                                            
                                            $time=$key->created_at;
                                        }
                                    }
                                    else {
                                        $message='Star Chat..';
                                    }
                                @endphp



                                <a href="{{route('start_chat',array('id' => $row->id))}}">
                                <li>
                                    <span class="avatar">

                                        @if($row->logo != null)
                                        <img src="{{ asset('images/'.$row->logo) }}" style="width: 50px; height:50px; border-radius: 50%;" alt="Toolbar svg" />
                                        @else
                                        <img src="{{ asset('images/logos/abc.png') }}" style="width: 50px; height:50px; border-radius: 50%;" alt="Toolbar svg" />
                                        @endif

                                        <span @if($row->log == 0) class="avatar-status-offline" @elseif($row->log == 1) class="avatar-status-online" @endif></span>
                                    </span>
                                    <div class="chat-info flex-grow-1">
                                        <h5 class="mb-0">{{ $row->name }}</h5>
                                        <p class="card-text text-truncate">
                                            @if($message == 'photo') <i class="fa fa-camera" aria-hidden="true"></i> Photo 
                                            @elseif($message == 'both') <i class="fa fa-camera" aria-hidden="true"></i> {{ $key->message }}
                                            @else {{ $message }} @endif 
                                        </p>
                                    </div>
                                    @if($message != 'Star Chat..')
                                    <div class="chat-meta">
                                        <small class="float-right mb-25 chat-time">{{ Carbon::parse($time)->format('H:i') }}</small>
                                        @if($remain > 0)
                                        <span class="badge badge-danger badge-pill float-right">{{ $remain }}</span>
                                        @endif
                                    </div>
                                    @endif
                                </li>
                            </a>

                                @endforeach
                                @endif



                            </ul>
                        </div>
                        <!-- Sidebar Users end -->
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
            <div class="content-right">
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
                                                @if($user->logo != null)
                                                <img src="{{ asset('images/'.$user->logo) }}" style="width: 50px; height:50px; border-radius: 50%;" alt="Toolbar svg" />
                                                @else
                                                <img src="{{ asset('images/logos/abc.png') }}" style="width: 50px; height:50px; border-radius: 50%;" alt="Toolbar svg" />
                                                @endif
                                                @if(isset($user))
                                                <span @if($user->log == 0) class="avatar-status-offline" @elseif($user->log == 1) class="avatar-status-online" @endif></span>
                                                @endif
                                            </div>
                                            <h6 class="mb-0">@if(isset($name)) {{ $name}} @endif</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                           
                                            <div class="dropdown">
                                                <button class="btn-icon btn btn-transparent hide-arrow btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="chat-header-actions">
                                                    <a class="dropdown-item" href="{{route('del_admin_chat',array('id' => $user->id))}}">Clear Chat</a>
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
                                            @foreach ($msg as $item) 
                                            @php
                                            $counter++;
                                            $mime=\App\User::find($item->senderId);
                                            @endphp
                                             @if($item->status == 0 || $item->status == 1)
                                            <div @if($item->senderId == Auth::user()->id) class="chat" @else class="chat chat-left" @endif>
                                                <div class="chat" @if($counter == count($msg)) id="last_one" @endif>
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
                            

                            <form class="chat-app-form" action="{{route('adminSendMessage')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <input type="text" name="id" class="form-control d-none" value="{{$retailer}}" required readonly>
                                    
                                <div class="input-group input-group-merge mr-1 form-send-message">
                                    
                                    <input type="text" class="form-control message" name="message" placeholder="Type your message to text" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <label for="attach-doc" class="attachment-icon mb-0">
                                                <i class="fa fa-paperclip cursor-pointer" aria-hidden="true"></i>
                                                <input type="file" name="attachment" id="attach-doc" class="image" hidden /> </label></span>
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
    <!-- END: Content-->
    <script>
       $("#div1").animate({ scrollTop: $('#div1').prop("scrollHeight")}, 500);
    </script>
    <script>

        $('.bulk').click(function()
        {
            var image =$(this).attr('src');
           $('.img_load').attr('src',image);
           $('.img_down').attr('href',image);
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