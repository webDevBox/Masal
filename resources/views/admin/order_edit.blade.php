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
    
        <div class="block">
            <!-- Products Title -->
            <div class="block-title">
                <h2><i class="fa fa-shopping-cart"></i> <strong>Order Edit</strong></h2>
                @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
                    {{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                    {{ Session::get('error') }}</p>
                @endif
                @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
                @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
                @if ($errors->has('quantity')) <p style="color:red;">{{ $errors->first('quantity') }}</p> @endif 
                @if ($errors->has('color')) <p style="color:red;">{{ $errors->first('color') }}</p> @endif 
                @if ($errors->has('size')) <p style="color:red;">{{ $errors->first('size') }}</p> @endif 
                @if ($errors->has('status')) <p style="color:red;">{{ $errors->first('status') }}</p> @endif 
                 </div>


             <div class="table-responsive">
                            <table class="table table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center">Order Id</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Product Color</th>
                                        <th class="text-center">Product Size</th>
                                        <th class="text-center">Order Status</th>
                                        <th class="text-center">Cancellation Requests </th>
                                        <th class="text-center">Product Quantity</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $row)
                                    @php
                                    $product_id=$row->productId;
                                    $product= \App\products::find($product_id);
                                    $colors = json_decode($product->colour);
                                    $sizes = json_decode($product->size);
                                    @endphp
                                    
                                    <tr>
                                        <form action="{{ route('update_order')}}" method="POST">
                                            @csrf
                                            <input type="text" style="display: none;" value="{{ $row->id }}" name="id" id="">
                                        <td class="text-center">OID.{{$row->id}}</td>
                                        <td class="text-center" style="width: 300px;">{{$product->name}}</td>
                                        <td class="text-center">

                                            <select name="color" class="form-control" id="color{{$row->id}}">
                                                @foreach ($colors as $color)
                                                <option value="{{$color}}" @if($row->colour == $color) selected
                                                    @endif>{{$color}}</option>
                                                @endforeach
                                            </select>

                                        </td>


                                        <td class="text-center">
                                            <select name="size" class="form-control" id="size{{$row->id}}">
                                                @foreach ($sizes as $size)
                                                <option value="{{$size}}" @if($row->sizes == $size) selected
                                                    @endif>{{$size}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        
                                        <td class="col-md-1 text-center">
                                            <select name="status" class="form-control" id="status{{$row->id}}">


                                                    <option value="processing" @if($row->status == 'processing') selected
                                                    @endif>Processing</option>

                                                <option value="completed" @if($row->status == 'completed') selected
                                                    @endif>Completed</option>

                                                <option value="canceled" @if($row->status == 'canceled') selected
                                                    @endif>Canceled</option>


                                            </select>

                                        </td>

                                        <td class="text-center"> @if($row->cancle_order_request == 1)<span class="bg-warning text-dark">Requested</span>
                                        @elseif($row->cancle_order_request == 2) <p> Order Canceled Request is Accpted </p> @elseif($row->cancle_order_request == 3)
                                        <p> Order Canceled Request is Rejected </p>  @else <p> No Request </p> @endif </td>
                                        <td class="text-center"> <input type="number" min="1" class="form-control" value="{{$row->quantity}}" name="quantity"> </td>
                                       
                                        <td class="text-center"> <button type="submit" class="btn btn-success"> Update </button> </td>
                                            </form>
                                    </tr>
                                
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{ $order->links() }}
            <!-- END Products Content -->
        </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>

@endsection