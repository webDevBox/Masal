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
    <div class="row text-center" id="block_card">
        <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10">
            <h1 class="text-center"> @if($status != 1) All @endif Products  @if($status == 1) of {{$cat_product}} @endif </h1>
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
          </div>
          <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
            <form action="" method="POST">
                @csrf
                <select name="category" class="form-control" id="category">
                <option selected disabled>Select Category</option>
                 <option value="all"> All Products</option> 
                @foreach ($category as $item)
                <option @if($send == $item->id) selected @endif value="{{$item->id}}"> {{$item->name}} </option>
                @endforeach    
                </select> 
            </form>
            </div>

            @if(count($products) > 0)
            @foreach($products as $row)
                <div class="col-sm-6 col-xs-12 col-md-4 col-lg-4" style="margin-top: 10px;">              
                <div class="nicdark_archive1 nicdark_border_grey badge badge-glow badge-primary">
                
                    <a  href="{{route('retailerorder',array('id'=>$row->id))}}">
                <img style="width: 320px; height:400px;" alt="Product Image" src="{{ asset('images/'.$row->image1) }}">
                </a>
                <div class="nicdark_textevidence center">
                <div class="nicdark_margin20 " style="margin-top: 30px;"> 
                    <div class="chat-info flex-grow-1">
                        <p class="card-text text-truncate">
                            <a href="{{route('retailerorder',array('id'=>$row->id))}}" >  {{$row->name}} </a>
                        </p>
                    </div>
                   
                    <h6> <a  href="{{route('retailerorder',array('id'=>$row->id))}}" > Style# {{$row->styleNumber}} </a> </h6>
                    <a href="{{route('retailerorder',array('id'=>$row->id))}}" class=" btn btn-success mb-2">ORDER NOW</a>
                </div>
                </div>
                
                </div>
                </div>
            @endforeach
            @else
            <h3> No Product to show </h3>
            @endif
       
           
        </div>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>
    <script>
        $('#category').change(function()
        {
            this.form.submit();
           
        });
    </script>
   
@endsection