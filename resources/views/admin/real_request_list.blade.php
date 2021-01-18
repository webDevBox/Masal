@extends('layout.admin')
@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
    <!-- All Products Block -->
    <div class="block full">
    <!-- All Products Title -->
    <div class="block-title">
    <h2><strong>Retailer</strong> List </h2>
    @if(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    @endif
    @if(Session::has('error'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    </div>
    <!-- END All Products Title -->
    
    <!-- All Products Content -->
    <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
    <thead>
    <tr>
    <th class="text-center">Retailer Name</th>
    <th class="text-center">Email</th>
    <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
        @if(count($retailer) > 0)
        @foreach ($retailer as $row)
            
       
    <tr>
    <td class="text-center">{{$row->name}}</td>
    <td class="text-center"><strong>{{$row->email}}</strong></td>
    <td class="text-center">
    <div class="btn-group btn-group-xs">
    
    <a href="{{route('weds',array('id' => $row->id))}}" data-toggle="tooltip" title="Weddings" class="btn btn-xs btn-primary"><i class="fa fa-braille"></i></a>
    
    </div>
    </td>
    </tr>
    @endforeach
    @endif
    </tbody>
    </table>
    <!-- END All Products Content -->
    </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>

@endsection