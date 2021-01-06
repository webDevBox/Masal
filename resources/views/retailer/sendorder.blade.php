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
    <h1 class="grey2 text-center"><span class="grey">—</span> Product Details  <span class="grey">—</span></h1>
    @if(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    @endif
    @if(Session::has('error'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    <div class="nicdark_space20"></div>
    
    <div class="row">   
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
    <div class="grid grid_6">
    <div class=" nicdark_activity">    
        <h3 class="text-center">{{$product->name}}</h3>   
        
        
        <section class="section-product" data-product-id="473">
            <div class="container">
                <div class="row">
                    <div class="product-bio">
                        <div class="product-detailed clearfix iblock-fix">
                            <div class="product-info product-visual">
                                <div class="product-media">
                                    <div class="product-views clearfix" data-property="parent">
                                        <div class="product-view overviews common-videolist">
                    
                                            <div class="list-item">
                                                <div class="overview" data-lazy-background style="background-image: url(../../%27https_/dy9ihb9itgy3g.cloudfront.net/products/2508/y118jkt/y118jkt_f_d.740.html)">
                                                    <a class="MagicZoom overview-media" data-options="textClickZoomHint: Click to zoom" aria-hidden="true">
                                                        <img style="width:250px; height:400px; " data-lazy="https://dy9ihb9itgy3g.cloudfront.net/products/2508/y118jkt/new2.jpeg" src="{{ asset('images/'.$product->image1) }}" alt="Masal Style #Y118JKT"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
    </div>
    </div>
    
    <div class="row">
    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
        
    <div class="nicdark_archive1 nicdark_border_grey" style="margin-left: 10px">
    <img id="image_1" style="width:60px; height:80px; cursor:pointer;" alt=""  src="dy9ihb9itgy3g.cloudfront.net/products/2508/y118jkt/new2.jpeg">
    </div>
    </div>
    
    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
    
    <div class="nicdark_archive1 nicdark_border_grey">
    
    
    </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4" style="visibility: hidden;"></div>
    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
        
    <div class="nicdark_archive1 nicdark_border_grey">
    
    
    </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4" style="visibility: hidden;"></div>
    </div>
    
    
    <div class="row" style="margin-top: 10px;">
    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
    
    <div class="nicdark_archive1 nicdark_border_grey" style="margin-left: 10px">
    
    
    </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4" style="visibility: hidden;"></div>
    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
    
    <div class="nicdark_archive1 nicdark_border_grey">
    
    
    </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4" style="visibility: hidden;"></div>
    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
        
    <div class="nicdark_archive1 nicdark_border_grey">
    
    
    </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4" style="visibility: hidden;"></div>
    </div>
    </div>
    
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="margin-top: 5px;">
    <h1>${{$product->wholesalePrice}}</h1>
    <h3 class="mt-2">Description<h3> 
  
        <a class="btn btn-primary mt-2" href="{{ asset('images/products/chart.pdf') }}" style="color: white;" download="Size Chart"> Size Chart </a>
        <p style="text-align: justify;" class="mt-2">
   @php
       echo $product->description;
    @endphp</p>
    <h1 class="text-center mt-3"> Place Order </h1>   
    <form action="{{route('sendorder')}}" method="POST">
    @csrf
    <div class="row">
    <div class="form-group col-md-12 col-sm-12" style="display: none">
    <input type="number" name="pId" value="{{$product->id}}">
    </div>
    @php
    $sizes = json_decode($product->size);
    @endphp
    <div class="form-group col-md-12 col-sm-12">
    <h3> Choose Size: <span style="font-size: 30px" id="sizer"></span></h3>
    <br>
    <input type="text" style="display: none;" name="size" id="sizer_choose">
    @foreach ($sizes as $size)
    <button type="button" class="btn badge badge-glow btn-primary size_press" value="{{$size}}"> {{$size}}</button>
    @endforeach
    @if ($errors->has('size')) <p style="color:red;">{{ $errors->first('size') }}</p> @endif 

    </div>
    <div class="form-group col-md-12 col-sm-12 mt-2">
    <h3>Choose Colour: <span style="font-size: 30px" id="colourer"></span> </h3>
    <br>
    @php
    $colors = json_decode($product->colour);
    @endphp
    @foreach ($colors as $color)
    <button type="button" class="btn badge badge-glow btn-primary color_press" value="{{$color}}"> {{$color}}</button>

    @endforeach    
    
    <input type="text" style="display:none;" name="color" id="colour_choose">
    @if ($errors->has('color')) <p style="color:red;">{{ $errors->first('color') }}</p> @endif 
    </div>
    <input style="display: none" id="product_price" type="text" value="{{$product->wholesalePrice}}">
    
    <div class="form-group col-md-3 col-sm-3 mt-3">
    <h3> Quantity </h3>
    <div class="input-group">
      <div class="input-group-btn">
        <button type="button" id="down" class="btn btn-danger"> <i class="fa fa-minus" aria-hidden="true"></i> </button>
        </div>
     <input type="text" name="quantity" id="myNumber" class="form-control input-number" value="1" />
    <div class="input-group-btn">
    <button id="up" type="button" class="btn btn-success"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
    </div>
    </div>
    
    <h5 style="font-weight: bold;" class="mt-1">Price: <span style="font-weight: normal;"> $</span><span id="pricer" style="font-weight: normal;">{{$product->wholesalePrice}} </span> </h5>
</div>


    @if($product->extra != null)
    @php
    $extras = json_decode($product->extra);
    @endphp
    <div class="form-group col-md-12 col-sm-12 mt-2">
    <h3> Extra Changes: <span style="font-size: 30px" id="extra"></span> </h3>
    <p style="color:red;"> You have to pay extra amount for this </p>
    <br>
    <input type="text" style="display:none;" name="extra" id="extra_choose">
    @foreach ($extras as $extra)
    @php
    $picker= \App\additional::where('additional',$extra)->first();
    $price=$picker->price;
    @endphp
    <button type="button" class="btn badge badge-glow btn-primary extra_press" value="{{$extra}}"> {{$extra}} <div class="mt-1">${{$price}}</div></button>

    @endforeach
    @if ($errors->has('extra')) <p style="color:red;">{{ $errors->first('extra') }}</p> @endif 
    </div>
    @endif
    
    
    
    <div class="form-group col-md-12 col-sm-12 mt-2">
        <h3>Order Details </h3>
    <textarea id="lolo" class="form-control" name="detail" rows="3" placeholder="(Optional)"></textarea>
    </div>
    <div class="form-group col-md-12 col-sm-12" style="display: none">
    <input type="number" name="product" value="{{$product->id}}">
    </div>
    <div class="form-group col-md-12 col-sm-12" style="display: none">
    <input type="number" name="user" value="{{Auth::user()->id}}">
    </div>
     <input type="submit" name="cart" value="Add to Cart" class="btn btn-primary d-block mx-auto"> 
    </form>
    </div>
    </div>
    
    
    </div>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>


    <script>
        
$("#up").click(function() {
var max=1000;
document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
if (document.getElementById("myNumber").value >= parseInt(max)) {
document.getElementById("myNumber").value = max;
}

});
$("#down").click(function() {
var min=1;
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
if(quantity >= 1)
{
    $("#down").removeAttr("disabled")
}
});

$("#down").click(function(){
var price=$("#product_price").val();
var quantity=$("#myNumber").val();
var finaler=price*quantity;
$("#pricer").html(finaler);
if(quantity == 1)
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

