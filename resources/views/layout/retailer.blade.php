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
<title>Retailer Masal</title>
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
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-ecommerce.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
<!-- END: Page CSS-->
<script src="https://use.fontawesome.com/d4bd60efc3.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- BEGIN: Custom CSS-->

{{-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"> --}}

<!-- END: Custom CSS-->
<style>
.dropdown:hover .dropdown-content {display: block;}

</style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static bg-light-primary  menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
<div class="navbar-container d-flex content">
<div class="bookmark-wrapper d-flex align-items-center">
    <ul class="nav navbar-nav d-xl-none">
        <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
    </ul>
    <ul  class="nav navbar-nav align-items-center ml-auto">
        <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex d-none"><span class="avatar"><img class="round" 
                @if(Auth::user()->logo != null) src="{{ asset('images/'.Auth::user()->logo)}}" @else src="{{ asset('images/logos/abc.png') }}" @endif
                  alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span></div>
            <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span><span class="user-status">Admin</span></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user"><a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user-o" aria-hidden="true"></i>Profile</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('retailerlogout') }}"><i class="fa fa-power-off " aria-hidden="true"></i> Logout</a>
            </div>
            </li>
    </ul>
</div>
<ul class="nav navbar-nav align-items-center ml-auto">


<li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="fa fa-search" aria-hidden="true"></i></a>
<div class="search-input">
<div class="search-input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
<input class="form-control input" type="text" placeholder="Explore Masal..." tabindex="-1" data-search="search">
<div class="search-input-close"><i class="fa fa-times" aria-hidden="true"></i></div>
<ul class="search-list search-list-main"></ul>
</div>
</li>


@php

  $id=Auth::user()->id;

  $quantity=0;

  $items= \App\retailerOrder::where('RetailerId',$id)->where('payment','none')->get();

  foreach ($items as $item) {

       $quantity=$quantity+$item->quantity;

  }

@endphp

<li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" @if($quantity > 0) href="{{route('checkout')}}" @endif><i class="fa fa-shopping-cart" aria-hidden="true"></i>
    @if($quantity > 0) <span class="badge badge-pill badge-danger badge-up">{{ $quantity }}</span> @endif </a></li>


<li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="fa fa-bell" aria-hidden="true"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>
<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
<li class="dropdown-menu-header">
<div class="dropdown-header d-flex">
<h4 class="notification-title mb-0 mr-auto">Notifications</h4>
<div class="badge badge-pill badge-light-primary">6 New</div>
</div>
</li>
</ul>
</li>

</ul>
</div>
</nav>
<ul class="main-search-list-defaultlist d-none">
<li class="d-flex align-items-center"><a href="javascript:void(0);">
<h6 class="section-label mt-75 mb-0">Files</h6>
</a></li>
<li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
<div class="d-flex">
<div class="mr-75"><img src="{{ asset('app-assets/images/icons/xls.png')}}" alt="png" height="32"></div>
<div class="search-data">
<p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
</div>
</div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
</a></li>
<li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
<div class="d-flex">
<div class="mr-75"><img src="{{ asset('app-assets/images/icons/jpg.png')}}" alt="png" height="32"></div>
<div class="search-data">
<p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
</div>
</div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
</a></li>
<li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
<div class="d-flex">
<div class="mr-75"><img src="{{ asset('app-assets/images/icons/pdf.png')}}" alt="png" height="32"></div>
<div class="search-data">
<p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
</div>
</div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
</a></li>
<li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
<div class="d-flex">
<div class="mr-75"><img src="{{ asset('app-assets/images/icons/doc.png')}}" alt="png" height="32"></div>
<div class="search-data">
<p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
</div>
</div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
</a></li>
<li class="d-flex align-items-center"><a href="javascript:void(0);">
<h6 class="section-label mt-75 mb-0">Members</h6>
</a></li>
<li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
<div class="d-flex align-items-center">
<div class="avatar mr-75"><img src="{{ asset('app-assets/images/portrait/small/avatar-s-8.jpg')}}" alt="png" height="32"></div>
<div class="search-data">
<p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
</div>
</div>
</a></li>
<li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
<div class="d-flex align-items-center">
<div class="avatar mr-75"><img src="{{ asset('app-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="png" height="32"></div>
<div class="search-data">
<p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
</div>
</div>
</a></li>
<li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
<div class="d-flex align-items-center">
<div class="avatar mr-75"><img src="{{ asset('app-assets/images/portrait/small/avatar-s-14.jpg')}}" alt="png" height="32"></div>
<div class="search-data">
<p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
</div>
</div>
</a></li>
<li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
<div class="d-flex align-items-center">
<div class="avatar mr-75"><img src="{{ asset('app-assets/images/portrait/small/avatar-s-6.jpg')}}" alt="png" height="32"></div>
<div class="search-data">
<p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
</div>
</div>
</a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
<li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
<div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div>
</a></li>
</ul>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
<div class="navbar-header">
<ul class="nav navbar-nav flex-row">
<li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('retailerdash') }}">
  
     <span class="brand-logo">
        <img src="{{ asset('app-assets/images/logo/logo.png')}}" > 
</span> 
<h2 class="brand-text">Masal</h2>
</a></li>
<li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
</ul>
</div>
<div class="shadow-bottom"></div>
<div class="main-menu-content">
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('retailerdash') }}"><i class="fa fa-home" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span></a></li>
<li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span>
</li>
<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('orders') }}"><i class="fa fa-envelope" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Email">Orders</span></a>
</li>
<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('collection') }}"><i class="fa fa-bar-chart" style="color:  #6610F2;"></i><span class="menu-title text-truncate" data-i18n="Chat">Collections</span></a>
</li>
<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('upload_real') }}"><i class="fa fa-upload" style="color:  #6610F2;"></i><span class="menu-title text-truncate" data-i18n="Todo">Masal Weddings</span></a>
</li>
<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('chat') }}"><i class="fa fa-comments" style="color: #8c4fec;" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Calendar">Chat</span></a>
</li>








</ul>
</div>
</div>

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
</body>
<!-- END: Body-->

</html>