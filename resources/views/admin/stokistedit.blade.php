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
    <section class="nicdark_section">
    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">
    <h1 class="text-center"><span class="grey">—</span> Edit Retailer  <span class="grey">—</span></h1>
    @if(Session::has('success'))
    <p class="alert text-center {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    @endif
    @if(Session::has('error'))
    <p class="alert text-center {{ Session::get('alert-class', 'alert-danger') }}" >{{ Session::get('error') }}</p>
    @endif
    <div class="nicdark_space20"></div>
    
    <form action="{{route('stokisteditor')}}" method="POST" style="width: 50%; margin-left:25%;">
    @csrf
    <div class="row">
        <div class="form-group col-md-12 col-sm-12" style="display: none">
            <input type="text" value="{{ $Stokist->id }}" name="id" class="form-control" id="Shop Name">
            </div>
    <div class="form-group col-md-12 col-sm-12">
    <label for="">Name of Contact <span style="color: red;">*</span></label>
    <input type="text" value="{{ $Stokist->name }}" name="name" class="form-control" id="Shop Name" placeholder="Contact Name" required>
    @if ($errors->has('contact')) <p style="color:red;">{{ $errors->first('contact') }}</p> @endif 
    </div>
    <div class="form-group col-md-12 col-sm-12">
    <label for="">Email <span style="color: red;">*</span></label>
    <input type="email" value="{{  $Stokist->email }}" name="email" class="form-control" id="Shop Name" placeholder="Your Email" required>
    @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif 
    </div>
    
    <div class="form-group col-md-12 col-sm-12">
    <label for="">Business Phone Number<span style="color: red;">*</span></label>
    <input type="tel" name="phone" value="{{  $Stokist->phone }}" class="form-control" id="Shop Name" placeholder="Your Phone Number" required>
    @if ($errors->has('phone')) <p style="color:red;">{{ $errors->first('phone') }}</p> @endif 
    
    </div>
    <div class="form-group col-md-12 col-sm-12">
    <label for="">Business Address  <span style="color: red;">*</span></label>
    <input type="text" name="address" value="{{  $Stokist->address }}" class="form-control" id="Shop Name" placeholder="Your Location" required>
    @if ($errors->has('address')) <p style="color:red;">{{ $errors->first('address') }}</p> @endif 
    
    </div>
    
    <div class="form-group col-md-12 col-sm-12">
    <label for="">Country <span style="color: red;">*</span></label>
    <input type="text" name="country" value="{{  $Stokist->country }}" class="form-control" id="Shop Name" placeholder="Your Country" required>
    @if ($errors->has('country')) <p style="color:red;">{{ $errors->first('country') }}</p> @endif 
    
    </div>
    
    <div class="form-group col-md-12 col-sm-12">
    <label for="">State <span style="color: red;">*</span></label>
    <input type="text" name="state" value="{{  $Stokist->state }}" class="form-control" id="Shop Name" placeholder="Your State" required>
    @if ($errors->has('state')) <p style="color:red;">{{ $errors->first('state') }}</p> @endif 
    
    </div>
    
    <div class="form-group col-md-12 col-sm-12">
    <label for="">City <span style="color: red;">*</span></label>
    <input type="text" name="city" value="{{  $Stokist->city }}" class="form-control" id="Shop Name" placeholder="Your City" required>
    @if ($errors->has('emcityail')) <p style="color:red;">{{ $errors->first('city') }}</p> @endif 
    
    </div>
    <div class="form-group col-md-12 col-sm-12">
    <label for="">Business Registration Number<span style="color: red;">*</span></label>
    <input type="number" value="{{  $Stokist->registrationNumber }}" name="registrationNumber" class="form-control" id="Shop Name" placeholder="Your Unique Registration Number" required>
    @if ($errors->has('registration')) <p style="color:red;">{{ $errors->first('registration') }}</p> @endif 
    
    </div>
    
    
    <div class="form-group col-md-12 col-sm-12">
        <label for="">Account Status<span style="color: red;">*</span></label>
    <select class="form-control" name="status">
        <option @if($Stokist->status == 1) selected @endif value="1"> Approved </option>
        <option @if($Stokist->status == 2) selected @endif value="2"> Rejected </option>
        <option @if($Stokist->status == 3) selected @endif value="3"> Deleted </option>
    </select>
        @if ($errors->has('status')) <p style="color:red;">{{ $errors->first('status') }}</p> @endif 
        
        </div>
    
    <div class="form-group col-md-12 col-sm-12">
    <label for="">Website <span style="color: red;">*</span></label>
    <input type="text" value="{{  $Stokist->website }}" name="website" class="form-control" id="Shop Name" placeholder="Your Website" required>
    @if ($errors->has('website')) <p style="color:red;">{{ $errors->first('website') }}</p> @endif 
    
    </div>
    <div class="form-group col-md-12 col-sm-12">
    <label for="">Facebook <span style="color: red;">*</span></label>
    <input type="text" value="{{  $Stokist->facebook }}" name="facebook" class="form-control" id="Shop Name" placeholder="Your Facebook Link" required>
    @if ($errors->has('facebook')) <p style="color:red;">{{ $errors->first('facebook') }}</p> @endif 
    
    </div>
    <div class="form-group col-md-12 col-sm-12">
    <label for="">Instagram <span style="color: red;">*</span></label>
    <input type="text" value="{{ $Stokist->instagram }}" name="Instagram" class="form-control" id="Shop Name" placeholder="Your Instagram Link" required>
    @if ($errors->has('Instagram')) <p style="color:red;">{{ $errors->first('Instagram') }}</p> @endif 
    
    </div>
    
    
    </div>
    <center>
    <input type="submit" name="update" value="UPDATE" class="btn btn-primary"> 
    </center>  
    </form>
  
    
    
    </div>
    <!--end nicdark_container-->
    
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>

@endsection