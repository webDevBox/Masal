@extends('layout.retailer')
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

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="card  text-center" >
<div class="card-body pb-50  ">
<h3 style="margin-top: 20px; color:#7367f0;"  >Total  <strong>Orders</strong></h3> 
<h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > {{$total}} </h2>
<!-- <div id="statistics-order-chart"></div> -->
</div>
</div>
</div>
@php
$price=0;
$extra_price=0;
@endphp
@foreach ($payment as $item)
@php
$product_id=$item->productId;
$product= \App\products::where('id',$product_id)->first();
$rate=$product->wholesalePrice;
$quantity=$item->quantity;
if($item->extra != null)
{
$extra=$item->extra;
$addition= \App\additional::where('additional',$extra)->first();
$extra_price=$addition->price;
}
$price=$price+($rate*$quantity)+($extra_price*$quantity);

@endphp


@endforeach
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="card  text-center " >
<div class="card-body pb-50">
<h3 style="margin-top: 20px; color:#7367f0;" >Total <strong>Payment </strong> </h3> 
<h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > ${{$price}} </h2>
</div>
</div>
</div>

</div>
<div class="block full">
<!-- All Orders Title -->
<div class="block-title">

<h2><strong>All</strong> Orders</h2>
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
</div>
<!-- END All Orders Title -->

<!-- All Orders Content -->
<div class="table-responsive">
<table id="ecom-orders" class="table  table-bordered table-striped table-vcenter">
<thead >
<tr>
<th  class=" bg-light-primary text-center" style="width: 100px;">ID</th>
<th class="bg-light-primary text-center"  style="width: 100px;">Products</th>
<th class="text-center bg-light-primary">Price</th>
<th class="text-center bg-light-primary">Status</th>
<th class="text-center bg-light-primary">Extra</th>
<th class="text-center bg-light-primary" style="width: 50px;">Quantity</th>
<th class="text-center bg-light-primary">Total</th>
<th class="text-center bg-light-primary">Submitted</th>
<th class="text-center bg-light-primary">Action </th>
</tr>
</thead>
<tbody>
@foreach ($payment as $row)
@php
$extra_price=0;
if($row->extra != null)
{
$additional=$row->extra;
$extra= \App\additional::where('additional',$additional)->first();
$extra_price=$extra->price;
}

$product_id=$row->productId;
$product= \App\products::where('id',$product_id)->first();
$rate=$product->wholesalePrice;
$quantity=$row->quantity;

$price=($rate*$quantity)+($extra_price*$quantity);
$pro_name=$product->name;
@endphp
<tr>
<td class="text-center"><strong>{{$row->id}}</strong></td>
<td class="text-center">{{$pro_name}}</td>
<td class="text-center"><strong>${{$product->wholesalePrice}}</strong></td>
<td class="text-center"><span class="label label-warning">{{$row->status}}</span></td>
<td class="text-center">
@if($row->extra != null)
{{$row->extra}}
@else
No Extra
@endif
</td>
<td class="text-center" style="width: 50px;">{{$row->quantity}}</td>
<td class="text-center">${{$price}}</td>
<td class="text-center">{{$row->created_at}}</td>
<td class="text-center">
<div class="btn-group btn-group-xs">
{{-- <a href="{{route('retailer_edit_order', array('id' => $row->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a> --}}


@if($row->cancle_order_request == 0)
@if($row->payment == 'Done')
@if($row->status == 'completed')
<p> Order Completed </p> 
@else 
<a href="{{route('retailer_del_order', array('id' => $row->id))}}" data-toggle="tooltip" title="Cancellation Requests " class="btn btn-xs btn-danger">
<i class="fa fa-times"></i></a>
@endif
@else
<a href="{{route('checkout')}}" data-toggle="tooltip" title="Saved in Cart" class="btn btn-xs btn-primary"><i class="fa fa-shopping-cart"></i></a>
@endif
@elseif($row->cancle_order_request == 2)
<p> Your Request is Approved </p> 
@elseif($row->cancle_order_request == 3)
<p> Your Request is Rejected </p>  
@else
<p> Your Request is Pending </p>   
@endif



</div>
</td>
</tr>

@endforeach


</tbody>
</table>
</div>
<!-- END All Orders Content -->
</div>  
</section>
<!-- Dashboard Ecommerce ends -->

</div>
</div>
</div>

@endsection