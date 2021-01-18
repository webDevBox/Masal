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
                                        <img src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="user_avatar" height="42" width="42" />
                                        <span class="avatar-status-online"></span>
                                    </div>
                                </div>
                                <div class="input-group input-group-merge ml-1 w-100">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text round"><i data-feather="search" class="text-muted"></i></span>
                                    </div>
                                    <input type="text" class="form-control round" id="chat-search" placeholder="Search or start a new chat" aria-label="Search..." aria-describedby="chat-search" />
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

                                        {{-- <img src="app-assets/images/portrait/small/avatar-s-3.jpg" height="42" width="42" /> --}}
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
                                    <div class="chat-meta">
                                        <small class="float-right mb-25 chat-time">{{ Carbon::parse($time)->format('H:i') }}</small>
                                        @if($remain > 0)
                                        <span class="badge badge-danger badge-pill float-right">{{ $remain }}</span>
                                        @endif
                                    </div>
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
                            <!-- To load Conversation -->
                            <div class="start-chat-area">
                                <div class="mb-1 start-chat-icon">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                </div>
                                <h4 class="sidebar-toggle start-chat-text">Start Conversation</h4>
                            </div>
                            <!--/ To load Conversation -->

                           
                        </section>
                        <!--/ Main chat area -->

                        <!-- User Chat profile right area -->
                        <div class="user-profile-sidebar">
                            <header class="user-profile-header">
                                <span class="close-icon">
                                    <i data-feather="x"></i>
                                </span>
                                <!-- User Profile image with name -->
                                <div class="header-profile-sidebar">
                                    <div class="avatar box-shadow-1 avatar-border avatar-xl">
                                        <img src="app-assets/images/portrait/small/avatar-s-7.jpg" alt="user_avatar" height="70" width="70" />
                                        <span class="avatar-status-busy avatar-status-lg"></span>
                                    </div>
                                    <h4 class="chat-user-name">Kristopher Candy</h4>
                                    <span class="user-post">UI/UX Designer 👩🏻‍💻</span>
                                </div>
                                <!--/ User Profile image with name -->
                            </header>
                            <div class="user-profile-sidebar-area">
                                <!-- About User -->
                                <h6 class="section-label mb-1">About</h6>
                                <p>Toffee caramels jelly-o tart gummi bears cake I love ice cream lollipop.</p>
                                <!-- About User -->
                                <!-- User's personal information -->
                                <div class="personal-info">
                                    <h6 class="section-label mb-1 mt-3">Personal Information</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-1">
                                            <i data-feather="mail" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">kristycandy@email.com</span>
                                        </li>
                                        <li class="mb-1">
                                            <i data-feather="phone-call" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">+1(123) 456 - 7890</span>
                                        </li>
                                        <li>
                                            <i data-feather="clock" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">Mon - Fri 10AM - 8PM</span>
                                        </li>
                                    </ul>
                                </div>
                                <!--/ User's personal information -->

                                <!-- User's Links -->
                                <div class="more-options">
                                    <h6 class="section-label mb-1 mt-3">Options</h6>
                                    <ul class="list-unstyled">
                                        <li class="cursor-pointer mb-1">
                                            <i data-feather="tag" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">Add Tag</span>
                                        </li>
                                        <li class="cursor-pointer mb-1">
                                            <i data-feather="star" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">Important Contact</span>
                                        </li>
                                        <li class="cursor-pointer mb-1">
                                            <i data-feather="image" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">Shared Media</span>
                                        </li>
                                        <li class="cursor-pointer mb-1">
                                            <i data-feather="trash" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">Delete Contact</span>
                                        </li>
                                        <li class="cursor-pointer">
                                            <i data-feather="slash" class="font-medium-2 mr-50"></i>
                                            <span class="align-middle">Block Contact</span>
                                        </li>
                                    </ul>
                                </div>
                                <!--/ User's Links -->
                            </div>
                        </div>
                        <!--/ User Chat profile right area -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

   @endsection