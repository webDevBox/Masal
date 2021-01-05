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
        <h2 class="text-center mt-3"> Edit <strong>{{ $template->name }} </strong> Template </h2>
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="width: 500px;">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" style="width: 500px;">{{ Session::get('error') }}</p>
            @endif
         
        </div>
        <!-- END General Data Title -->
        
        <!-- General Data Content -->
        <div class=" col-md-6 offset-md-3">
            <form action="{{route('templateeditor')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12 col-sm-12" style="display: none">
                        <input type="text" value="{{ $template->id }}" name="id" class="form-control" id="Shop Name">
                        </div>
                <div class="form-group col-md-12 col-sm-12">
                <label for=""> Template Subject <span style="color: red;">*</span></label>
                <input type="text" value="{{ $template->subject }}" name="subject" class="form-control" id="Shop Name" required>
                @if ($errors->has('subject')) <p style="color:red;">{{ $errors->first('subject') }}</p> @endif 
                </div>
                <div class="form-group col-md-12 col-sm-12">
                <label for="">Template Message <span style="color: red;">*</span></label>
                <textarea name="message" id="" class="form-control ckeditor" rows="5" required>{{  $template->message }}</textarea>
                @if ($errors->has('message')) <p style="color:red;">{{ $errors->first('message') }}</p> @endif 
                </div>
                
                <div class="form-group col-md-12 col-sm-12">
                    <label for="">Template Status<span style="color: red;">*</span></label>
                <select class="form-control" name="status">
                    <option @if($template->status == 1) selected @endif value="1"> Active </option>
                    <option @if($template->status == 2) selected @endif value="2"> In Active </option>
                </select>
                    @if ($errors->has('status')) <p style="color:red;">{{ $errors->first('status') }}</p> @endif 
                    
                    </div>
                
                
                
                </div>
                <center>
                <input type="submit" name="update" value="UPDATE" class="btn btn-primary mb-2"> 
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