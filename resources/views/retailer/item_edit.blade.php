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
    <!-- Quick Stats -->
    <div class="grid grid_12" id="blow">
    <h1 class="text-center mb-2"><span class="grey">—</span> {{$product->name}}  <span class="grey">—</span></h1>
    @if(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    @endif
    @if(Session::has('error'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    <div class="nicdark_space20"></div>
    
    <div class="row">   
        <div class="col-md-4 col-lg-4 col-sm-10 col-xs-10 mt-5">             
            <div class="nicdark_archive1 nicdark_border_grey img-magnifier-container">
            <img id="main_image" class="main_image mx-auto d-block" style="height:600px;" alt="" src="{{ asset('images/'.$product->image1) }}">
            </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-5">

                <h1 class="text-center">Price: ${{$product->wholesalePrice}}</h1>
                <h3 class="mt-2">Description<h3> 
              
                    <a class="btn btn-primary mt-2" href="{{ asset('images/products/chart.pdf') }}" style="color: white;" download="Size Chart"> Size Chart </a>
                    <p class="mt-2 text-justify">
               @php
                   echo $product->description;
                @endphp</p> 

                <h3 class="text-center mt-3">Other Images</h3>
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-2">
                        
                    <img id="image_1" style="width:60px; height:80px; cursor:pointer;" alt="" class="d-inline"  src="{{ asset('images/'.$product->image1) }}">
                    
                    </div>
                    
                    @if(isset($product->image2))
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-2">
                    
                    <img alt="" id="image_2" style="width:60px; height:80px; cursor:pointer;" class="d-inline" src="{{ asset('images/'.$product->image2) }}">
                    
                    </div>
                    @else
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-2" style="visibility: hidden;"></div>
                    @endif
                    @if(isset($product->image3))
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-2">
                    <img alt="" id="image_3" style="width:60px; height:80px; cursor:pointer;" class="d-inline" src="{{ asset('images/'.$product->image3) }}">
                    
                    </div>
                    @else
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-2" style="visibility: hidden;"></div>
                    @endif

                    @if(isset($product->image4))
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-2">
                    <img alt="" id="image_4" style="width:60px; height:80px; cursor:pointer;" class="d-inline" src="{{ asset('images/'.$product->image4) }}">
                    
                    </div>
                    @else
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-2" style="visibility: hidden;"></div>
                    @endif
                    
                    @if(isset($product->image5))
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-2">
                    <img alt="" id="image_5" style="width:60px; height:80px; cursor:pointer;" class="d-inline" src="{{ asset('images/'.$product->image5) }}">
                    
                    </div>
                    @else
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-2" style="visibility: hidden;"></div>
                    @endif
                    @if(isset($product->image6))
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-2">
                    <img alt="" id="image_6" style="width:60px; height:80px; cursor:pointer;" class="d-inline" src="{{ asset('images/'.$product->image6) }}">
                    
                    </div>
                    @else
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 mt-2" style="visibility: hidden;"></div>
                    @endif


                    </div>
            </div>
    
    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-5">
   <h2 class="text-center">Edit Your Order</h2>
   <form action="{{route('update_item')}}" method="POST">
    @csrf
    <div class="row">
    <div class="form-group col-md-12 col-sm-12" style="display: none">
    <input type="number" name="pId" value="{{$order->id}}">
    </div>
    
    @php
    $sizes = json_decode($product->size);
    @endphp
    <div class="form-group col-md-12 col-sm-12">
    <h3> Choose Size: <span style="font-size: 30px" id="sizer"></span> </h3>
    
    <br>
    <input type="text" style="display: none;" name="size" value="{{ $order->sizes }}" id="sizer_choose">
    @foreach ($sizes as $size)
    <button type="button" style="" id="" class="btn badge badge-glow btn-primary size_press" value="{{$size}}">{{$size}}</button>
    @endforeach
    
    @if ($errors->has('size')) <p style="color:red;">{{ $errors->first('size') }}</p> @endif 
    </div>
    
    @php
    $colors = json_decode($product->colour);
    @endphp
    <div class="form-group col-md-12 col-sm-12 mt-2">
    <h3>Choose Colour: <span style="font-size: 30px"  id="colourer"></span> </h3>
    <br>
    @foreach ($colors as $color)
    <button type="button" style="" id="" class="btn badge badge-glow btn-primary color_press" value="{{$color}}">{{$color}}</button>
    
    @endforeach
    <input type="text" style="display:none;" name="color" value="{{ $order->colour }}" id="colour_choose">
    @if ($errors->has('color')) <p style="color:red;">{{ $errors->first('color') }}</p> @endif 
    
    </div>
    <input style="display: none" id="product_price" type="text" value="{{$product->wholesalePrice}}">
    
    <div class="col-md-4 col-sm-4 col-xs-4 mt-3 mt-2">
    <h3> Quantity  </h3>
    <div class="input-group">
        <div class="input-group-btn">
    <button type="button" id="down" class="btn btn-danger"> <i class="fa fa-minus" aria-hidden="true"></i> </button>
    </div>
    <input type="text" name="quantity" id="myNumber" class="form-control input-number" value="{{ $order->quantity }}" />
    <div class="input-group-btn">
    <button id="up" type="button" class="btn btn-success"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
    </div>
    </div>
    
    <h5 style="font-weight: bold;" class="mt-1">Price: <span style="font-weight: normal;"> $</span><span id="pricer" style="font-weight: normal;">{{$product->wholesalePrice * $order->quantity}} </span> </h5>
    </div>
    
    
    
    
    @if($product->extra != null)
    @php
    $extras = json_decode($product->extra);
    @endphp
    <div class="form-group col-md-12 col-sm-12 mt-2">
    <h3> Extra Changes: <span style="font-size: 30px" id="extra"></span> </h3>
    <p style="color:red;"> You have to pay extra amount for this </p>
    <br>
    <input type="text" style="display:none;" name="extra" @if($order->extra != null) value="{{ $order->extra }}" @endif id="extra_choose">
    <button type="button" style="" id="" class="btn badge badge-glow btn-primary extra_press" value="No Extra"> No Extra  <div class="mt-1" style="visibility: hidden;">No Price</div></button>
    
    @foreach ($extras as $extra)
    @php
    $picker= \App\additional::where('additional',$extra)->first();
    $price=$picker->price;
    @endphp
    <button type="button" style="" id="" class="btn badge badge-glow btn-primary extra_press" value="{{$extra}}">{{$extra}} <div class="mt-1">${{$price}}</div> </button>
    
    @endforeach
    
    @if ($errors->has('extra')) <p style="color:red;">{{ $errors->first('extra') }}</p> @endif 
    </div>
    @endif
    
    
    
    <div class="form-group col-md-12 col-sm-12 mt-2">
    Order Detail
    <textarea id="lolo" class="form-control" name="detail" rows="3" placeholder="(Optional)" >@if($order->detail != null) {{ $order->detail }} @endif</textarea>
    </div>
    
     <input type="submit" name="cart" value="Update Cart" class="btn btn-primary d-block mx-auto"> 
    </form>
    </div>
    </div>
    
    
    </div>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>





<script>

    $("#image_2").click(function() {
    var temp=$('#image_2').attr('src');
    $('#main_image').attr('src',temp);
    
    
    });
    
    $("#image_1").click(function() {
    var temp=$('#image_1').attr('src');
    $('#main_image').attr('src',temp);
    
    
    });
    
    $("#image_3").click(function() {
    var temp=$('#image_3').attr('src');
    $('#main_image').attr('src',temp);
    
    
    });
    
    
    $("#image_4").click(function() {
    var temp=$('#image_4').attr('src');
    $('#main_image').attr('src',temp);
    
    
    });
    
    $("#image_5").click(function() {
    var temp=$('#image_5').attr('src');
    $('#main_image').attr('src',temp);
    
    
    });
    
    
    $("#image_6").click(function() {
    var temp=$('#image_6').attr('src');
    $('#main_image').attr('src',temp);
    
    
    });
    </script>

    <script>
    $("#up").click(function() {
    var max=1000;
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
    if (document.getElementById("myNumber").value >= parseInt(max)) {
    document.getElementById("myNumber").value = max;
    }
    
    });
    $("#down").click(function() {
    var min=0;
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
    if (document.getElementById("myNumber").value <= parseInt(min)) {
    document.getElementById("myNumber").value = min;
    }
    
    });
    
    
    $("#up").click(function(){
    var price=$("#product_price").val();
    var quantity=$("#myNumber").val();
    var finaler=price*quantity;
    $("#pricer").html(finaler);
    if(quantity > 0)
    {
        $("#down").removeAttr("disabled")
    }
    });
    
    $("#down").click(function(){
    var price=$("#product_price").val();
    var quantity=$("#myNumber").val();
    var finaler=price*quantity;
    $("#pricer").html(finaler);
    if(quantity == 0)
    {
        $("#down").attr('disabled','disabled');
    }
    
    });
    
    $("#myNumber").on("input",function()
    {
    var price=$("#product_price").val();
    var quantity=$("#myNumber").val();
    var finaler=price*quantity;
    $("#pricer").html(finaler);
    });
    
    
    var default_size=$("#sizer_choose").val();
    $("#sizer").html(default_size);
    
    var default_color=$("#colour_choose").val();
    $("#colourer").html(default_color);
    
    
    var default_extra=$("#extra_choose").val();
    $("#extra").html(default_extra);
    
    
    $(".color_press").click(function(){
    var color=$(this).val();
    $("#colour_choose").val(color);
    $("#colourer").html(color);
    });
    
    
    $(".size_press").click(function(){
    var size=$(this).val();
    $("#sizer_choose").val(size);
    $("#sizer").html(size);
    });
    
    $(".extra_press").click(function(){
    var extra=$(this).val();
    $("#extra_choose").val(extra);
    $("#extra").html(extra);
    });
    </script>

@endsection

