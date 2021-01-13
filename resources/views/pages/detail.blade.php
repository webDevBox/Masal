@extends('layout.web')
@section('content')

<section class="section-header section-header-alt" id="section-designers-header">
    <div class="container">
    <div class="row">
    <div class="header">
    <h2>
        {{$detail->name}}
    </h2>
    </div>
    </div>
    </div>
    </section>
   
    <div class="row" style="margin-top: 10px;">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
           <center> <img id="main_image" src="{{ asset('images/'.$detail->image1) }}" style="width:400px; height: 600px;" alt=""> </center>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: center">
            <h3>Style: {{$detail->styleNumber}} </h3>
            <div class="row" style="margin-top: 10px;">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <img id="image_1" alt="" style="height:250px; width:150px; margin-top:10px; cursor:pointer;"  src="{{ asset('images/'.$detail->image1) }}">
                </div>
                @if($detail->image2 != null)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <img id="image_2" alt="" style="height:250px; width:150px; margin-top:10px; cursor:pointer;"  src="{{ asset('images/'.$detail->image2) }}">
                </div>
                @endif
                @if($detail->image3 != null)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 ">
                    <img id="image_3" alt="" style="height:250px; width:150px; margin-top:10px; cursor:pointer;"  src="{{ asset('images/'.$detail->image3) }}">
                </div>
                @endif
                @if($detail->image4 != null)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 ">
                    <img id="image_4" alt="" style="height:250px; width:150px; margin-top:10px; cursor:pointer;"  src="{{ asset('images/'.$detail->image4) }}">
                </div>
                @endif
                @if($detail->image5 != null)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 ">
                    <img id="image_5" alt="" style="height:250px; width:150px; margin-top:10px; cursor:pointer;"  src="{{ asset('images/'.$detail->image5) }}">
                </div>
                @endif
                @if($detail->image6 != null)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 ">
                    <img id="image_6" alt="" style="height:250px; width:150px; margin-top:10px; cursor:pointer;"  src="{{ asset('images/'.$detail->image6) }}">
                </div>
                @endif
            </div>

            <h3 class="text-center" style="margin-top: 10px;">Product Details</h3>
            <a class="btn btn-success" href="{{ asset('images/products/chart.pdf') }}" style="margin-top: 10px;" download="Size Chart"> Size Chart </a>  <br>
               @php
                   echo $detail->description;
               @endphp 
        </div>
    </div>


@endsection