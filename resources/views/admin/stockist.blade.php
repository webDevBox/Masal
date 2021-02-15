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
    
        <div class="block full">
            <!-- All Products Title -->
            <div class="block-title">
            
            <h2><strong>Retailer</strong> List </h2>
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="width: 500px;">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" style="width: 500px;">{{ Session::get('error') }}</p>
            @endif
            </div>
            <!-- END All Products Title -->
            
            <!-- All Products Content -->
            <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
            <thead>
            <tr>
                <th class="text-center">Retailer Name</th>
                <th class="text-center">Business Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Registration #</th>
                <th class="text-center">Country</th>
                <th class="text-center">State</th>
                <th class="text-center">City</th>
                <th class="text-center">Postcode</th>
                <th class="text-center">Status</th>
                <th class="text-center">Added</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
                @if(count($stokist) > 0)
                @foreach ($stokist as $row)
            <tr>
            <td class="text-center">{{$row->name}}</td>
            <td class="text-center">{{$row->businessName}}</td>
            <td class="text-center"><strong>{{$row->email}}</strong></td>
            <td class="text-center"><strong>{{$row->registrationNumber}}</strong></td>
            <td class="text-center"><strong>{{$row->country}}</strong></td>
            <td class="text-center"><strong>{{$row->state}}</strong></td>
            <td class="text-center"><strong>{{$row->city}}</strong></td>
            <td class="text-center"><strong>{{$row->post}}</strong></td>
            <td class="text-center">
            <span class="label label-success">
                @if($row->status == 1)
            Active
            @endif
            @if($row->status == 2)
            Rejected
            @endif
            @if($row->status == 3)
            In Active
            @endif
            </span>
            </td>
            <td class="hidden-xs text-center">{{$row->created_at}}</td>
            <td class="text-center">
            <div class="btn-group btn-group-xs">
            <a href="{{route('stokistedit',array('id' => $row->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
            @if($row->status == 1 || $row->status == 2)
            <a href="{{route('stokistdelete',array('id' => $row->id))}}" data-toggle="tooltip" title="In Active" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
            @else
            <a href="{{route('stokistdelete',array('id' => $row->id))}}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
            @endif
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