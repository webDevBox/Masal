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
            
            <h2><strong>Retailer</strong> Requests </h2>
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="width: 500px;">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" style="width: 500px;">{{ Session::get('error') }}</p>
            @endif
            </div>
            <!-- END All Products Title -->
            
            <!-- All Products Content -->
            <div class="table-responsive">
                <table class="table table-bordered">
            <thead>
            <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Retailer Name</th>
            <th class="text-center">Business Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Postcode</th>
            <th class="text-center">Address</th>
            <th class="text-center">Country</th>
            <th class="text-center">State</th>
            <th class="text-center">City</th>
            <th class="text-center">Registration#</th>
            <th class="text-center">Website</th>
            <th class="text-center">Added</th>
            <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            
            @if(count($stokist) > 0)
            @foreach ($stokist as $row)
            <tr>
            <td class="text-center"><strong>PID.{{$row->id}}</strong></td>
            <td class="text-center">{{$row->name}}</td>
            <td class="text-center">{{$row->businessName}}</td>
            <td class="text-center">{{$row->email}}</td>
            <td class="text-center">{{$row->phone}}</td>
            <td class="text-center">{{$row->post}}</td>
            <td class="text-center" style="width: 150px;">{{$row->address}}</td>
            <td class="text-center">{{$row->country}}</td>
            <td class="text-center">{{$row->state}}</td>
            <td class="text-center">{{$row->city}}</td>
            <td class="text-center">{{$row->registrationNumber}}</td>
            <td class="text-center">{{$row->website}}</td>
            <td class="hidden-xs text-center">{{$row->created_at}}</td>
            <td class="text-center">
            <div class="btn-group btn-group-xs">
            <a href="{{route('stokistaccount',array('id' => $row->id, 'value'=>1))}}" data-toggle="tooltip" title="Accept" class="btn btn-primary"><i class="fa fa-check"></i></a>
            <a href="{{route('stokistaccount',array('id' => $row->id, 'value'=>2))}}" data-toggle="tooltip" title="Reject" class="btn btn-danger"><i class="fa fa-eject"></i></a>
            
            </div>
            </td>
            </tr>
            @endforeach
            @endif
            </tbody>
            </table>
            </div>
            <!-- END All Products Content -->
            </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>

@endsection