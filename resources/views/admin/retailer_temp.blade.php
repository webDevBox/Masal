@extends('layout.admin')
@section('content')
    

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    <div class="content-header row">
    </div>



    <div class="nicdark_container nicdark_clearfix">
        <div class="grid grid_12">
        <h1 class="text-center"><span class="grey">—</span> Edit Template  <span class="grey">—</span></h1>
        @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif
        @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
        @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
        @if ($errors->has('subject')) <p style="color:red;">{{ $errors->first('subject') }}</p> @endif
        @if ($errors->has('message')) <p style="color:red;">{{ $errors->first('message') }}</p> @endif
        <div class="nicdark_space20"></div>
        
        <form action="{{route('temp_edit')}}" method="POST" style="width: 50%; margin-left:25%;">
        @csrf
        <div class="row">
            <div class="form-group col-md-12 col-sm-12" style="display: none">
                <input type="text" value="{{ $template->id }}" name="id" class="form-control" id="Shop Name">
                </div>
        <div class="form-group col-md-12 col-sm-12">
        <label for=""> Template Subject <span style="color: red;">*</span></label>
        <input type="text" value="{{ $template->subject }}" name="subject" class="form-control" id="Shop Name" placeholder="Contact Name" required>
        @if ($errors->has('subject')) <p style="color:red;">{{ $errors->first('subject') }}</p> @endif 
        </div>
        <div class="form-group col-md-12 col-sm-12">
        <label for="">Template Message <span style="color: red;">*</span></label>
        <textarea name="message" id="" class="form-control ckeditor" rows="5" required>{{  $template->message }}</textarea>
        @if ($errors->has('message')) <p style="color:red;">{{ $errors->first('message') }}</p> @endif 
        </div>
        
        </div>
        <center>
        <input type="submit" name="update" value="UPDATE" class="btn btn-primary"> 
        </center>  
        </form>
        </div>
        
        
        </div>





    
    
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>

@endsection