<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
<meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
<meta name="author" content="PIXINVENT">
<title>Masal Australia</title>
<link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.png ')}}">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
<!-- END: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-chat.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-chat-list.css')}}">
<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css')}}">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-ecommerce.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
<!-- END: Page CSS-->
<script src="https://cdn.jsdelivr.net/jsbarcode/3.3.20/JsBarcode.all.min.js"></script>

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
<!-- END: Custom CSS-->
<script src="https://use.fontawesome.com/d4bd60efc3.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .fake{
        opacity: 0;
    }
</style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
<div class="navbar-container d-flex content">
<div class="bookmark-wrapper d-flex align-items-center">
    <ul  class="nav navbar-nav align-items-center ml-auto">
    <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="user-nav d-sm-flex d-none"><span class="avatar"><img class="round" 
            @if(Auth::user()->logo != null) src="{{ asset('images/'.Auth::user()->logo)}}" @else src="{{ asset('images/logos/abc.png') }}" @endif
              alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span></div>
        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span><span class="user-status">Admin</span></div>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user"><a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user-o mr-50" aria-hidden="true"></i>Profile</a>
        <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-power-off mr-50" aria-hidden="true"></i> Logout</a>
        </div>
        </li>
    </ul>
</div>
<ul class="nav navbar-nav align-items-center ml-auto">
 

<li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="fa fa-search" aria-hidden="true"></i></a>
<div class="search-input">
<div class="search-input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
<form action="{{ route('admin_searcher') }}" method="post" class="search_form">
    @csrf
<input class="form-control input" name="data" type="text" placeholder="Explore Masal..." tabindex="-1" data-search="search">
</form>
<div class="search-input-close"><i class="fa fa-times" aria-hidden="true"></i></div>
</div>
</li>
@php
$id=Auth::user()->id;
$chat= \App\chatModel::where('marker',1)->where('receiver',$id)->count();
$newUser= \App\User::where('status',0)->count();
$unread= \App\feedback::where('status',0)->count();
$calcle=\App\retailerOrder::where('cancle_order_request',1)->count();
$note=$chat + $newUser + $unread + $calcle;
@endphp
<li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"> <i class="fa fa-bell" style="color: #7367F0;" aria-hidden="true"></i>
@if($note > 0) <span class="badge badge-pill badge-danger badge-up">{{ $note }}</span> @endif </a>
<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
@if($chat > 0)
<li class="dropdown-menu-header">
<div class="dropdown-header d-flex">
<h4 class="notification-title mb-0 mr-auto">Chats</h4>
<div class="badge badge-pill badge-light-primary">{{ $chat }} New</div>
</div>
</li>
<li class="scrollable-container media-list">
<a class="d-flex" href="{{ route('adminChat') }}">
<div class="media d-flex align-items-start">
<div class="media-left">
<div class=""><img src="{{ asset('app-assets/images/portrait/small/chat.png')}}" alt="avatar" width="32" height="32"></div>
</div>
<div class="media-body">
<p class="media-heading"><span class="font-weight-bolder">Chat Modals</span>
</div>
</div>
</a>
</li>
<hr>
@endif

@if($calcle > 0)

<li class="dropdown-menu-header">
    <div class="dropdown-header d-flex">
    <h4 class="notification-title mb-0 mr-auto">Order Cancellation Request</h4>
    <div class="badge badge-pill badge-light-primary">{{ $calcle }} New</div>
    </div>
    </li>
    <li class="scrollable-container media-list">
    <a class="d-flex" href="{{ route('order') }}">
    <div class="media d-flex align-items-start">
    <div class="media-left">
    <div class=""><img src="{{ asset('app-assets/images/portrait/small/new.png')}}" alt="avatar" width="32" height="32"></div>
    </div>
    <div class="media-body">
    <p class="media-heading"><span class="font-weight-bolder"> Orders Page </span>
    </div>
    </div>
    </a>
    </li>
    <hr>
    @endif



@if($newUser > 0)

<li class="dropdown-menu-header">
    <div class="dropdown-header d-flex">
    <h4 class="notification-title mb-0 mr-auto">New User Request</h4>
    <div class="badge badge-pill badge-light-primary">{{ $newUser }} New</div>
    </div>
    </li>
    <li class="scrollable-container media-list">
    <a class="d-flex" href="{{ route('stockistsrequest') }}">
    <div class="media d-flex align-items-start">
    <div class="media-left">
    <div class=""><img src="{{ asset('app-assets/images/portrait/small/new.png')}}" alt="avatar" width="32" height="32"></div>
    </div>
    <div class="media-body">
    <p class="media-heading"><span class="font-weight-bolder"> Retailer Request Page </span>
    </div>
    </div>
    </a>
    </li>
    <hr>
    @endif


    @if($unread > 0)
    
    <li class="dropdown-menu-header">
    <div class="dropdown-header d-flex">
    <h4 class="notification-title mb-0 mr-auto">FeedBack</h4>
    <div class="badge badge-pill badge-light-primary">{{ $unread }} New</div>
    </div>
    </li>
    <li class="scrollable-container media-list">
    <a class="d-flex" href="{{route('contactReport')}}">
    <div class="media d-flex align-items-start">
    <div class="media-left">
    <div class=""><img src="{{ asset('app-assets/images/portrait/small/feed.png')}}" alt="avatar" width="32" height="32"></div>
    </div>
    <div class="media-body">
    <p class="media-heading">  <span class="font-weight-bolder">  FeedBack Page  </span>
    </div>
    </div>
    </a>
    </li>
    <hr>
    @endif


</ul>
</li>




</ul>
</div>
</nav>

<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
<div class="navbar-header">
<ul class="nav navbar-nav flex-row">
<li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('dashboard') }}">
  
     <span class="brand-logo">
        <img src="{{ asset('app-assets/images/logo/logo.png')}}" >      
<!-- <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
<defs>
<lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
<stop stop-color="#000000" offset="0%"></stop>
<stop stop-color="#FFFFFF" offset="100%"></stop>
</lineargradient>
<lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
<stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
<stop stop-color="#FFFFFF" offset="100%"></stop>
</lineargradient>
</defs>
<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<g id="Artboard" transform="translate(-400.000000, -178.000000)">
<g id="Group" transform="translate(400.000000, 178.000000)">
<path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
<path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
<polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
<polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
<polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
</g>
</g>
</g>
</svg> --></span> 
<h2 class="brand-text">Masal</h2>
</a></li>
<li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
</ul>
</div>
<div class="shadow-bottom"></div>
<div class="main-menu-content">
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i class="fa fa-home" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span></a></li>
<li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span>
</li>
<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('order') }}"><i class="fa fa-envelope" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Email">Orders</span></a>
</li>
<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('adminChat') }}"><i class="fa fa-comments" style="color: #8c4fec;" aria-hidden="true"></i>
    <span class="menu-title text-truncate" data-i18n="Chat">Chat</span></a>
</li>
<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('stockistsrequest') }}"><i class="fa fa-user-plus" style="color: #8c4fec;" aria-hidden="true"></i>
    <span class="menu-title text-truncate" data-i18n="Todo">Retailer Request</span></a>
</li>
<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('stockist') }}"><i class="fa fa-user-circle" style="color: #8c4fec;" aria-hidden="true"></i>
    <span class="menu-title text-truncate" data-i18n="Calendar">Manage Retailer</span></a>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="/product"><i class="fa fa-th-large" style="color: #8c4fec;" aria-hidden="true"></i>
    <span class="menu-title text-truncate" data-i18n="Calendar">Product</span></a>
</li>

<li  class=" dropdown nav-item"><a class="d-flex align-items-center" href="#"><i class="fa fa-th" style="color: #8c4fec;" aria-hidden="true"></i>
    <span class="menu-title text-truncate" data-i18n="eCommerce">Product Assets</span></a>
    <ul class="menu-content dropdown-content">
    <li><a class="d-flex align-items-center" href="{{route('addProductPage')}}"><i class="fa fa-plus" style="color: #8c4fec;" aria-hidden="true"></i>
        <span class="menu-item" data-i18n="Shop">Add New Product</span></a>
    </li>
    <li><a class="d-flex align-items-center" href="{{route('size')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i>
        <span class="menu-item" data-i18n="Details">Manage Sizes</span></a>
    </li>
    <li><a class="d-flex align-items-center" href="{{route('addition')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i>
        <span class="menu-item" data-i18n="Wish List">Additional Changes</span></a>
    </li>
    <li><a class="d-flex align-items-center" href="{{route('sale_tag')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-item" data-i18n="Checkout">Sales Tag</span></a>
    </li>
    <li><a class="d-flex align-items-center" href="{{route('swatches')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i>
        <span class="menu-item" data-i18n="Wish List">Manage Swatches</span></a>
    </li>
    <li><a class="d-flex align-items-center" href="{{route('manageCategory')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i>
        <span class="menu-item" data-i18n="Wish List">Manage Category </span></a>
    </li>
    <li><a class="d-flex align-items-center" href="{{route('manageSilhouette')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i>
        <span class="menu-item" data-i18n="Wish List">Manage silhouette</span></a>
    </li>
    <li><a class="d-flex align-items-center" href="{{route('manageNeckline')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i>
        <span class="menu-item" data-i18n="Wish List">Manage Neckline</span></a>
    </li>
    <li><a class="d-flex align-items-center" href="{{route('manageFabric')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i>
        <span class="menu-item" data-i18n="Wish List">Manage Fabric</span></a>
    </li>
    <li><a class="d-flex align-items-center" href="{{route('manageSleeve')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i>
        <span class="menu-item" data-i18n="Wish List">Manage Sleeve</span></a>
    </li>
    <li><a class="d-flex align-items-center" href="{{ route('out_stock') }}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i>
        <span class="menu-item" data-i18n="Wish List">Out of Stock</span></a>
    </li>
    <li><a class="d-flex align-items-center" href="{{ route('top_sell') }}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i>
        <span class="menu-item" data-i18n="Wish List">Top Sells</span></a>
    </li>

    </ul>
    </li>

<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fa fa-hdd-o" style="color: #8c4fec;" aria-hidden="true"></i>
    <span class="menu-title text-truncate" data-i18n="eCommerce">Manage Content</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="{{route('manageHome')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-item" data-i18n="Shop"> Home Page</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{route('manageAbout')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-item" data-i18n="Shop"> About Us Page</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{route('manageContact')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-item" data-i18n="Shop"> Contact Us Page</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{route('manageFooter')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-item" data-i18n="Details">Footer</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{route('manageReal')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-item" data-i18n="Wish List">Admin Real Brides</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{route('email_templates')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-item" data-i18n="Checkout">Email Templates</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{route('real_request_list')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-item" data-i18n="Checkout">Real Brides Requests </span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{route('menu')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-item" data-i18n="Checkout">Menu Items</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{route('customPage')}}"><i class="fa fa-circle-thin" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-item" data-i18n="Checkout">Custom Page</span></a>
        </li>
        
        </ul>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="{{route('contactReport')}}"><i class="fa fa-flag-checkered" style="color: #8c4fec;" aria-hidden="true"></i>
    <span class="menu-title text-truncate" data-i18n="Pages">Contact Request</span></a>

</li>
</ul>

<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="margin-top:100%;">

    <li style="display: none;" id="last_nav"><a class="d-flex align-items-center" target="_blank" id="prev_page" href="#"><i class="fa fa-bandcamp" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-item" data-i18n="Checkout">Preview Page</span></a>
    </li>

</ul>

</div>
</div>
<!-- END: Main Menu-->

@yield('content')


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
<p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{ Carbon\Carbon::now()->year }}<span class="d-none d-sm-inline-block">, All rights Reserved</span></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{ asset('js/helpers/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js')}}"></script>
<script src="{{ asset('app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
<!-- END: Page JS-->

<script src="{{ asset('app-assets/js/scripts/pages/app-chat.js') }}"></script>
<!-- END: Page JS-->


<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>

{{-- <script>
        var len = $('.input').val().length;
        $(document).on('keypress',function(e) {
    if(e.which == 13 && len > 1) {
        $(".search_form").submit();
    }
});
       
</script> --}}


</body>
<!-- END: Body-->

</html>