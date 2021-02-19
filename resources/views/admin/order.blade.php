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
           
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <a href="{{route('dater',array('status'=>'today'))}}">
                <div class="card  text-center " >
                <div class="card-body pb-50">
                <h3 style="margin-top: 20px; color:#7367f0;" >Order <strong>Today </strong> </h3> 
                <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > {{ $todayOrder }} </h2>
                </div>
                </div>
            </a>
            </div>
        
    
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <a href="{{route('dater',array('status'=>'month'))}}">
                <div class="card  text-center " >
                <div class="card-body pb-50">
                <h3 style="margin-top: 20px; color:#7367f0;" >Order This<strong> Month </strong> </h3> 
                <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > {{ $monthOrder }} </h2>
                </div>
                </div>
            </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <a href="{{route('dater',array('status'=>'last'))}}">
                <div class="card  text-center " >
                <div class="card-body pb-50">
                <h3 style="margin-top: 20px; color:#7367f0;" >Order Last <strong>Month </strong> </h3> 
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
        <div class="block full">
            <!-- All Orders Title -->
            <div class="block-title">
            <h2 class="ml-3"><strong>All</strong> Orders</h2>
           
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
            @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
            @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif    
                     </div>
            <!-- END All Orders Title -->
            
            <!-- All Orders Content -->
            <table id="ecom-orders" class="table table-bordered table-striped table-vcenter">
            <thead>
            <tr> 
            <th class="text-center">Retailer  ID</th>
            <th class="text-center">Retailer Name</th>
            <th class="text-center"># of Orders</th>
            <th class="text-center">Cancellation Requests</th>
            <th class="text-center">Value</th>
            <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $counter=0;
                @endphp
                @if(count($orders) > 0)
                @foreach($orders as $order)
                    @php
                        $cancle=\App\retailerOrder::where('cancle_order_request',1)->where('payment','Done')->where('status','processing')->where('RetailerId',$order->id)->count();
                        $total_price=0;
                        $counter++;
                    @endphp
                    @if(count($order->orders) > 0)
                        @foreach($order->orders as $single_order)
                            @php
                                $extra=0;
                                $product = \App\products::find($single_order->productId);
                                if($single_order->extra != null)
                                {
                                    $addition=\App\additional::where('additional',$single_order->extra)->first();
                                    $extra_price=$addition->price;
                                    $extra=$extra_price*$single_order->quantity;
                                }
                                $total_price = $total_price + ($product->wholesalePrice * $single_order->quantity)+$extra;
                            @endphp
                        @endforeach
                    @endif
                    <tr>
                        {{-- <td class="text-center"><strong>ORD.{{$order->id}}</strong></td> --}}
                        <td class="text-center">
                            <a href="{{route('retailerOrderView',array('id' => $order->id))}}" data-toggle="tooltip" title="View" > {{$order->id}} </a> </td>
                        <td class="text-center">
                            <a href="{{route('retailerOrderView',array('id' => $order->id))}}" data-toggle="tooltip" title="View" >{{$order->businessName}} </a></td>
                        <td class="text-center">
                            <a href="{{route('retailerOrderView',array('id' => $order->id))}}" data-toggle="tooltip" title="View" >{{$order->orders_count}} </a></td>
                        <td class="text-center"> {{ $cancle }} </td>
                        <td class="text-center"><a href="{{route('retailerOrderView',array('id' => $order->id))}}" data-toggle="tooltip" title="View" >${{$total_price}}</a></td>
                        <td class="text-center">
                        <div class="btn-group btn-group-xs">
                        <a href="{{route('retailerOrderEdit',array('id' => $order->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                        <a href="{{route('retailerOrderView',array('id' => $order->id))}}" data-toggle="tooltip" title="View" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                        <a href="{{route('retailerOrderDel',array('id' => $order->id))}}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
                        </div>
                        </td>
                        </tr>
                    @endforeach
                @endif
                   
            </tbody>
            </table>
            <!-- END All Orders Content -->
            </div>
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