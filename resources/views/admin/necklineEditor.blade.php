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
        <h2 class="text-center mt-3"> <strong>Edit</strong> Neckline </h2>
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
            <form action="{{route('neckline_edit_indb')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product-name">Name</label>
                    <div class="col-md-6">
                        <input type="text" id="product-name" name="cat_name" class="form-control" value="{{$category->name}}">
                        @if ($errors->has('cat_name')) <p style="color:red;">{{ $errors->first('cat_name') }}</p> @endif 
                    </div>
                </div>
                <div class="form-group" style="display: none;">
                    <div class="col-md-9">
                        <input type="text" id="product-name" name="cat_rename" class="form-control" value="{{$category->name}}">
                    </div>
                </div>
                <div class="form-group" style="display: none;">
                    <div class="col-md-9">
                        <input type="number" id="product-name" name="cat_id" class="form-control" value="{{$category->id}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Image</label>
                    <div class="col-md-4">
                        <img style="width: 200px; height:250px;" src="{{ asset('images/'.$category->image) }}"><br><br>
                            <input type="file" accept="image/*" id="product-status" class="btn btn-primary" name="cat_image" >
                            @if ($errors->has('cat_image')) <p style="color:red;">{{ $errors->first('cat_image') }}</p> @endif 
                
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" name="update" value="UPDATE" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                    </div>
                </div>
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