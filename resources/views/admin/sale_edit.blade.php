@extends('layout.admin')
@section('content')
    

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    <div class="content-header row">
    </div>
    
    <div class="row" style="margin-top: 50px;">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 offset-lg-3 offset-md-3" style="background-color: rgb(253, 253, 253);  box-shadow: 5px 5px 5px 5px #c0bcbc;">
        <!-- General Data Block -->
        <div class="block">
        <!-- General Data Title -->
        <div class="block-title">
        <h2 class="text-center mt-3"> Edit <b>{{$sale->name}}</b> Tag  </h2>
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="width: 500px;">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" style="width: 500px;">{{ Session::get('error') }}</p>
            @endif
         
        </div>
        <!-- END General Data Title -->
        
        <!-- General Data Content -->
        <div class=" col-md-6 offset-md-3" style=" margin-top: 30px;">
            <form action="{{route('update_sale',array('id'=>$sale->id))}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-md-12 control-label" for="product-name">Name</label>
                    <div class="col-md-12">
                        <input type="text" id="product-name" name="tag" class="form-control" value="{{$sale->name}}">
                        @if ($errors->has('tag')) <p style="color:red;">{{ $errors->first('tag') }}</p> @endif 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 control-label" for="product-name">Background Color</label>
                    <div class="col-md-12">
                        <input type="color" id="product-name" name="color" class="form-control" value="{{$sale->color}}">
                        @if ($errors->has('color')) <p style="color:red;">{{ $errors->first('color') }}</p> @endif 
                    </div>
                </div>
                <center>
                <div class="form-group btn-group">
                    
                        <a href="{{ route('sale_tag') }}" class="btn btn-sm btn-success"><i class="fa fa-ban" aria-hidden="true"></i> Back</a> 
                            <button type="submit" name="update" value="UPDATE" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button> 
                        
                </div>
            </center>
                </form>
        </div>
        <!-- END General Data Content -->
        </div>
        <!-- END General Data Block -->
        </div>
        
        </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>

@endsection