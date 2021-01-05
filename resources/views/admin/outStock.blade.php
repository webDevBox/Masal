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
        
        
        
        
                <div class="row">
                    <div style="margin-right: 100px;" class="col-sm-12 col-md-3 col-xs-12 col-lg-3" style="margin-top: 20px;">
                        <h2> <strong>Out of Stock</strong> Products </h2>
                        @if(Session::has('success'))
                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                        @endif
                        @if(Session::has('error'))
                        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                        @endif
                    </div>
                </div>
                </div>
            <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
        
                <thead>
        
                    <tr>
        
                        <th class="text-center" style="width: 70px;"><strong>ID</strong></th>
        
                        <th class="text-center"><strong>Product Name</strong></th>
        
                        <th class="text-center"><strong>Style Number</strong></th>
        
                        <th class="text-center"><strong>WholeSale Price</strong></th>
        
                        <th class="text-center"><strong>Retailer Price</strong></th>
        
                        <th class="text-center"><strong>Stock</strong></th>
        
                        <th class="text-center"><strong>Status</strong></th>
        
                        <th class="text-center"><strong>Tag</strong></th>
        
                        <th class="text-center"><strong>Added</strong></th>
        
                        <th class="text-center"><strong>Action</strong></th>
        
                    </tr>
        
                </thead>
        
                <tbody>
                    @if(count($outer) > 0)

                    @foreach($outer as $row)
        
                    <tr>
        
                        <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> PID.{{$row->id}} </a> </td>
        
                        <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> {{$row->name}} </a> </td>
        
                        <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;">{{$row->styleNumber}} </a></td>
        
                        <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> ${{$row->wholesalePrice}} </a> </td>
        
                        <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> ${{$row->retailerPrice}} </a> </td>
        
                        <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> {{$row->stock}} </a> </td>
        
                        <td class="text-center">
                            <span class="label label-success"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> {{$row->status}} </a> </span>
                        </td>
                        <td class="text-center">
                            @php
                            $tag=\App\sale::where('name',$row->tag)->first();
                            if(!isset($tag))
                            {
                            $row->tag=null;
                            }
                            @endphp
                            <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;">
                                <span @if($row->tag != null) style="background: {{ $tag->color }}" @endif>
        
                                    @if($row->tag == null) No Tag @else {{$row->tag}} @endif</span>
                            </a>
                        </td>
                        <td class="text-center">{{$row->created_at}}</td>
        
                        <td class="text-center">
        
                            <div class="btn-group btn-group-xs">
        
                                <a href="{{route('edit_product', array('id' => $row->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
        
                                <a href="{{route('delete', array('id' => $row->id))}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
        
                            </div>
        
                        </td>
        
                    </tr>
        
                    @endforeach
        
                    @else
        
                    <p>No Product stored</p>
        
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