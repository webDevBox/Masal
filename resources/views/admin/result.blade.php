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
      
        <div class="row text-center" >
            <div class=" col-lg-12 col-md-12  col-sm-12  col-xs-12">
               
        <button  onclick="myFunction()" class="btn btn-primary" >Retailer</button>  
        <button  onclick="order()" class="btn btn-primary mx-1" >Order</button>  
        <button  onclick="product()" class="btn btn-primary" >Product</button>
    
             </div>
        </div>

       
    
        <div id="myDIV" class="block full bg-light-primary row " style=" padding: 50px;">
            <div class="col-md-12 col-lg-12">
                                  
            <!-- All Products Title -->
            <div class="block-title">
                <h2><strong>Retailer</strong> List </h2>
                </div>
                <!-- END All Products Title -->
                
                <!-- All Products Content -->
                <div class="table-responsive">
                <table id="ecom-products" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                <th class="text-center">Retailer Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Registration #</th>
                <th class="text-center">Country</th>
                <th class="text-center">State</th>
                <th class="text-center">City</th>
                <th class="text-center">Postcode</th>
                <th class="text-center">Added</th>
                </tr>
                </thead>
                <tbody>
                        
                   @foreach ($retailer as $item)
                <tr>
                <td class="text-center">{{ $item->name }}	</td>
                <td class="text-center"><strong>{{ $item->email }}	</strong></td>
                <td class="text-center"><strong>{{ $item->registrationNumber }}	</strong></td>
                <td class="text-center"><strong>{{ $item->country }}	</strong></td>
                <td class="text-center"><strong>{{ $item->state }}	</strong></td>
                <td class="text-center"><strong>{{ $item->city }}	</strong></td>
                <td class="text-center"><strong>{{ $item->post }}	</strong></td>
                <td class="hidden-xs text-center">{{ $item->created_at }} </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>


            <div id="order" class="block full bg-light-primary" style="display: none; padding: 50px;">
               
                <!-- Company Table Card -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               
                    <div class="block-title ">
                        <h2><strong>All</strong> Orders</h2>
                          </div>
                <div class="block full">
                   
                    <div class="table-responsive">
                        <table id="ecom-orders" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <tr>
                                <th class="text-center">Order Id</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Product Style#</th>
                                <th class="text-center">Colors</th>
                                <th class="text-center">Sizes</th>
                                <th class="text-center">QTY</th>
                                <th class="text-center">Extra</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Unit Price</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Order Date & Time</th>
                            </tr>
                        </tr>
                        </thead>
                        <tbody>

                            @if(count($orders) > 0)
                            @foreach ($orders as $order)
                            @php
                            $extra=0;
                                $product_id=$order->productId;
                                $product= \App\products::find($product_id);
                                if($order->extra != null)
                                {
                                $additional= \App\additional::where('additional',$order->extra)->first();
                                $exprice=$additional->price;
                                $extra=$order->quantity*$exprice;
                                }
                                $price=$order->quantity*$product->wholesalePrice;
                                if($order->extra != null)
                                {
                                    $price=$price+$extra;
                                }
                            @endphp
                            <tr>
                                <td class="text-center">OID.{{$order->id}}</td>
                                <td class="text-center" style="width: 300px;">{{$product->name}}</td>
                                <td class="text-center">{{$product->styleNumber}}</td>
                                <td class="text-center">{{$order->colour}}</td>
                                <td class="text-center">{{$order->sizes}}</td>
                                <td class="text-center">{{$order->quantity}}</td>
                                <td class="text-center">
                                @if($order->extra != null)
                                {{$order->extra}}
                                @else
                                No Extra
                                @endif
                                </td>
                                
                                <td class="text-center">{{$order->status}}</td>
                                <td class="text-center">${{$product->wholesalePrice}}</td>
                                <td class="text-center">${{$price}}</td>
                                <td class="text-center">{{$order->created_at}}</td>
                            </tr>
                            @endforeach
                            @else
                            @foreach ($retailer as $item)
                            @php
                                $order=0;
                                if(count($retailer) > 0)
                                {
                                $order=\App\retailerOrder::where('RetailerId',$item->id)->where('payment','Done')->get();
                                }
                            @endphp
                              @if(count($order) > 0)
                              @foreach ($order as $row)
                                @php
                                $extra=0;
                                    $product_id=$row->productId;
                                    $product= \App\products::find($product_id);
                                    if($row->extra != null)
                                    {
                                    $additional= \App\additional::where('additional',$row->extra)->first();
                                    $exprice=$additional->price;
                                    $extra=$row->quantity*$exprice;
                                    }
                                    $price=$row->quantity*$product->wholesalePrice;
                                    if($row->extra != null)
                                    {
                                        $price=$price+$extra;
                                    }
                                @endphp
                            <tr>
                                <td class="text-center">OID.{{$row->id}}</td>
                                <td class="text-center" style="width: 300px;">{{$product->name}}</td>
                                <td class="text-center">{{$product->styleNumber}}</td>
                                <td class="text-center">{{$row->colour}}</td>
                                <td class="text-center">{{$row->sizes}}</td>
                                <td class="text-center">{{$row->quantity}}</td>
                                <td class="text-center">
                                @if($row->extra != null)
                                {{$row->extra}}
                                @else
                                No Extra
                                @endif
                                </td>
                                <td class="text-center">{{$row->status}}</td>
                                <td class="text-center">${{$product->wholesalePrice}}</td>
                                <td class="text-center">${{$price}}</td>
                                <td class="text-center">{{$row->created_at}}</td>
                            </tr>
                            @endforeach
                            @endif
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
            
            
                <div id="product" class="row match-height bg-light-primary " style="display: none; padding: 50px;">
                    <div  class="col-md-3 " style="margin-bottom: 10px;">
                        <h2><strong>All Products</strong></h2>
                    </div>
                    <div class="col-md-12">
        
                    <table id="ecom-products" class="table table-hover table-bordered table-striped">
                
                        <thead>
                
                            <tr>
                
                                <th class="text-center" style="width: 70px;">ID</th>
                
                                <th class="text-center">Product Name</th>
                
                                <th class="text-center">Style Number</th>
                
                                <th class="text-center">WholeSale Price</th>
                
                                <th class="text-center">Retailer Price</th>
                
                                <th class="text-center">Stock</th>
                
                                <th class="text-center">Status</th>
                
                                <th class="text-center">Tag</th>
                
                                <th class="text-center">Added</th>
                
                            </tr>
                
                        </thead>
                
                        <tbody>
                
                            @if(count($inter) > 0)

                            @foreach($inter as $row)
                
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
                            </tr>
                
                            @endforeach
                
                            @else
                
                            <p>No Product stored</p>
                
                            @endif


                        </tbody>
                
                    </table>
                
                </div>
                
                </div>
            
            
            <!-- END All Products Content -->
           
    </section>
    <!-- Dashboard Ecommerce ends -->
    </div>
    <script>
        function myFunction() {
             var y = document.getElementById("order");
                 y.style.display = "none";
              var z = document.getElementById("product");
                z.style.display = "none";
        
          var x = document.getElementById("myDIV");
            x.style.display = "block";
          
        }
        
        function order(){
          var x = document.getElementById("myDIV");
            x.style.display = "none";
           var z = document.getElementById("product");
            z.style.display = "none";
        
            var y = document.getElementById("order");
            y.style.display = "block";
            
         }
        
        
        function product(){
          var x = document.getElementById("myDIV");
            x.style.display = "none";
           var y = document.getElementById("order");
                 y.style.display = "none";
           
            var z = document.getElementById("product");
            z.style.display = "block";
         }
        
        </script>
@endsection