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
           
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <a href="#" data-toggle="modal" data-target="#exampleModal2">
            <div class="card  text-center " >
            <div class="card-body pb-50">
            <h3 style="margin-top: 20px;" >Add New <strong>Color</strong></h3> 
            <h2 class="font-weight-bolder mb-1" style="margin-top: 30px;" > <i class="fa fa-plus" aria-hidden="true"></i> </h2>
            <!-- <div id="statistics-order-chart"></div> -->
            </div>
            </div>
        </a>
            </div>
            </div>
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="width: 500px;">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" style="width: 500px;">{{ Session::get('error') }}</p>
            @endif 
            @if ($errors->has('swatch')) <p style="color:red; width:500px;">{{ $errors->first('swatch') }}</p> @endif
    
    
    <div class="row match-height">
    <!-- Company Table Card -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card card-company-table">
    <div class="card-body">
   
        <h1 class="text-center">{{$swatches->name}}</h1>

        @php
        $colors = json_decode($swatches->colour);
        @endphp

        @foreach($colors as $color)
        <button style="border:1px solid black;" type="button" class="btn"> {{ $color }} </button>
        @endforeach


    </div>
    </div>
    </div>
    
    </div>

    
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">New Color in {{$swatches->name}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <form action="{{route('swatch_color')}}" method="POST">
    @csrf
    <div class="row">
    
    <div class="form-group" style="display: none;">
    
    <input type="text" value="{{$swatches->id}}" name="id" class="form-control" required>
    
    </div>
    
    {{-- <div class="form-group">
    <label class="col-md-5 control-label"> Select New Colour <span style="color: red"> * </span></label>
    <div class="col-md-7">
    <input type="color" name="color[]" class="form-control" required>
    </div>
    </div> --}}
    
    <div class="col-md-12" id='TextBoxesGroup' style="margin-bottom:10px;">
        <div class="col-md-12" id="TextBoxDiv1" style="margin-bottom:10px;">
           
        </div>
    </div>


    <div class="col-md-12"><input type='button' class="btn btn-primary" value='Add Color Name Field' id='addColor'></div>
    {{-- <input type='button' class="btn btn-primary" value='Add Select Color Field' id='addButton'> --}}
    </div>
    <div class="modal-footer">
    <input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
    <input type="submit" name="sendswatch" value="Submit" class="btn btn-primary"> 
    </form>
    </div>
    </div>
    </div>
    </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>

    <script>
        $("#addColor").click(function () {
    var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TextBoxDiv');
    
    newTextBoxDiv.after().html('<label class="col-md-5 control-label"> Enter New Colour </label><div class="col-md-7"> <input type="text" placeholder="Enter Color Name" name="color[]" id="textbox" class="form-control" required> </div>');
    
    newTextBoxDiv.appendTo("#TextBoxesGroup");
    
    });
    </script>

    {{-- <script>
        $("#addButton").click(function () {
        var newTextBoxDiv = $(document.createElement('div'))
        .attr("id", 'TextBoxDiv');
        
        newTextBoxDiv.after().html('<label class="col-md-5 control-label"> Select New Colour </label><div class="col-md-7"> <input type="color" name="color[]" id="textbox" class="form-control" > </div>');
        
        newTextBoxDiv.appendTo("#TextBoxesGroup");
        
        });
        </script> --}}
        
        

@endsection