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
    
            <div class="row match-height">
            <!-- Bar Chart - Orders -->
           
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <a href="{{route('dater',array('status'=>'today'))}}">
            <div class="card  text-center " >
            <div class="card-body pb-50">
            <h3 style="margin-top: 20px; color:#7367f0;" >Today’s Orders</h3> 
            <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > {{ $todayOrder }} </h2>
            <!-- <div id="statistics-order-chart"></div> -->
            </div>
            </div>
        </a>
            </div>
        
    
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <a href="{{route('dater',array('status'=>'month'))}}">
                <div class="card  text-center " >
                <div class="card-body pb-50">
                <h3 style="margin-top: 20px; color:#7367f0;" >This Month’s Order</h3> 
                <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > {{ $monthOrder }} </h2>
                </div>
                </div>
            </a>
            </div>
    
    
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <a href="{{route('dater',array('status'=>'last'))}}">
                <div class="card  text-center " >
                <div class="card-body pb-50">
                <h3 style="margin-top: 20px;  color:#7367f0;" >Last Month’s Order</h3> 
                <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > {{ $lastmonthOrder }} </h2>
                </div>
                </div>
                </a>
            </div>
            </div>
    
    
    <div class="row match-height">
    <!-- Company Table Card -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card card-company-table">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th class="text-center" style="width: 100px;"/>ID</th> --}}
                        <th class="text-center">Retailer ID</th>
                        <th class="text-center">Customer Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Colour</th>
                        <th class="text-center">Sizes</th>
                        <th class="text-center">Value</th>
                        <th class="text-center">Action</th>
        
                        {{-- <th class="text-center">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if(count($dater) > 0)
                    @foreach($dater as $order)
        
                    @php
                    $total_price=0;
                    $customer=\App\User::where('id',$order->RetailerId)->first();
                    @endphp
        
        
        
                    @php
                    $product= \App\products::where('id',$order->productId)->first();
                    $total_price=$total_price+($product->wholesalePrice*$order->quantity);
        
                    @endphp
        
        
        
        
                    <tr>
                        {{-- <td class="text-center"><strong>ORD.{{$order->id}}</strong></td> --}}
                        <td class="text-center"> <a href="{{route('OrderView',array('id' => $order->id))}}"> {{$order->RetailerId}} </a> </td>
                        <td class="text-center"> <a href="{{route('OrderView',array('id' => $order->id))}}"> {{$customer->name}} </a> </td>
                        <td class="text-center"> <a href="{{route('OrderView',array('id' => $order->id))}}"> {{$order->quantity}} </a> </td>
                        <td class="text-center"> <a href="{{route('OrderView',array('id' => $order->id))}}"> {{$order->colour}} </a> </td>
                        <td class="text-center"> <a href="{{route('OrderView',array('id' => $order->id))}}"> {{$order->sizes}} </a> </td>
                        <td class="text-center"><a href="{{route('OrderView',array('id' => $order->id))}}"><strong>${{$total_price}}</strong> </a> </td>              
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="{{route('OrderEdit',array('id' => $order->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-primary" style="color: black;">
                                    <i class="fa fa-pencil"></i></a>
                                <a href="{{route('OrderView',array('id' => $order->id))}}" data-toggle="tooltip" title="Order Details" class="btn btn-xs btn-secondary" style="color:black;">
                                    <i class="fa fa-eye"></i></a>
                                <a href="{{route('retailerOrderDel',array('id' => $order->id))}}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
        </tr>
        
        @endforeach
        @endif
        </tbody>
        </table>
            </div>
    </div>
    </div>
    </div>
    
    </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>
  
@endsection