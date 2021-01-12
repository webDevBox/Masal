@extends('layout.web')
@section('content')

<div class="main-content" id="main" role="main">
<div class="common-cmp">

<section class="container">
<div class="row clearfix">
<div class="col-xs-12 text-center">
<h1>Become A Retailer </h1>
</div>
</div>
<div class="row clearfix " style="margin-top: 20px;" >
<div class="text-center">
<h1 data-custom-submit-success></h1>
<h1 class="error" data-custom-submit-error></h1>
<h3 data-custom-submit-always></h3>
<br />
</div>
<div class="col-md-offset-2 col-md-8  col-xs-12 custom-form-holder">

    <form action="#" method="POST">
        @csrf
        <div class="row">
        <div class="form-group col-md-12 col-sm-12">
        <label for="">Name of Contact <span style="color: red;">*</span></label>
        <input type="text" value="{{ old('contact') }}" name="contact" class="custom-form-control" id="Shop Name" placeholder="Contact Name" required>
        @if ($errors->has('contact')) <p style="color:red;">{{ $errors->first('contact') }}</p> @endif 
        </div>
        <div class="form-group col-md-12 col-sm-12">
        <label for="">Email <span style="color: red;">*</span></label>
        <input type="email" value="{{ old('email') }}" name="email" class="custom-form-control" id="Shop Name" placeholder="Your Email" required>
        @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif 
        </div>
        
        
        <div class="form-group col-md-12 col-sm-12">
        <label for="">Business Phone Number<span style="color: red;">*</span></label>
        <input type="tel" name="phone" value="{{ old('phone') }}" class="custom-form-control" id="Shop Name" placeholder="Your Phone Number" required>
        @if ($errors->has('phone')) <p style="color:red;">{{ $errors->first('phone') }}</p> @endif 
        
        </div>
        <div class="form-group col-md-12 col-sm-12">
        <label for="">Business Address  <span style="color: red;">*</span></label>
        <input type="text" name="address" value="{{ old('address') }}" class="custom-form-control" id="Shop Name" placeholder="Your Location" required>
        @if ($errors->has('address')) <p style="color:red;">{{ $errors->first('address') }}</p> @endif 
        
        </div>
        
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Country <span style="color: red;">*</span></label>
            <select class="custom-form-control" name="country" id="country_top" required>
                <option selected disabled>Select Country</option>
                    @if(count($countries) > 0)
                            @foreach ($countries as $row)
                                <option value="{{$row->id}}"> {{$row->name}} </option>
                            @endforeach
                    @endif
                </select>
            @if ($errors->has('country')) <p style="color:red;">{{ $errors->first('country') }}</p> @endif 
            
            </div>
            
            <div class="form-group col-md-12 col-sm-12">
            <label for="">State <span style="color: red;">*</span></label>
                <select class="custom-form-control" name="state" id="state_top" >
                    <option selected disabled>Select State</option>
                </select>
            @if ($errors->has('state')) <p style="color:red;">{{ $errors->first('state') }}</p> @endif 
            
            </div>
        
        <div class="form-group col-md-12 col-sm-12">
        <label for="">City <span style="color: red;">*</span></label>
        <input type="text" value="{{ old('city') }}" name="city" class="custom-form-control" id="Shop Name" placeholder="Your City" required>
        @if ($errors->has('city')) <p style="color:red;">{{ $errors->first('city') }}</p> @endif 
        </div>
        
        <div class="form-group col-md-12 col-sm-12">
        <label for="">Postcode <span style="color: red;">*</span></label>
        <input type="text" value="{{ old('post') }}" name="post" class="custom-form-control" id="Shop Name" placeholder="Your Postcode" required>
        @if ($errors->has('post')) <p style="color:red;">{{ $errors->first('post') }}</p> @endif 
        </div>
        
        <div class="form-group col-md-12 col-sm-12">
        <label for="">Business Registration Number<span style="color: red;">*</span></label>
        <input type="number" value="{{ old('registration') }}" name="registration" class="custom-form-control" id="Shop Name" placeholder="Your Unique Registration Number" required>
        @if ($errors->has('registration')) <p style="color:red;">{{ $errors->first('registration') }}</p> @endif 
        
        </div>
        
        <div class="form-group col-md-12 col-sm-12">
        <label for="">Website <span style="color: red;">*</span></label>
        <input type="text" value="{{ old('website') }}" name="website" class="custom-form-control" id="Shop Name" placeholder="Your Website" required>
        @if ($errors->has('website')) <p style="color:red;">{{ $errors->first('website') }}</p> @endif 
        
        </div>
        <div class="form-group col-md-12 col-sm-12">
        <label for="">Facebook <span style="color: red;">*</span></label>
        <input type="text" value="{{ old('facebook') }}" name="facebook" class="custom-form-control" id="Shop Name" placeholder="Your Facebook Link" required>
        @if ($errors->has('facebook')) <p style="color:red;">{{ $errors->first('facebook') }}</p> @endif 
        
        </div>
        <div class="form-group col-md-12 col-sm-12">
        <label for="">Instagram <span style="color: red;">*</span></label>
        <input type="text" value="{{ old('Instagram') }}" name="Instagram" class="custom-form-control" id="Shop Name" placeholder="Your Instagram Link" required>
        @if ($errors->has('Instagram')) <p style="color:red;">{{ $errors->first('Instagram') }}</p> @endif 
        
        </div>
        
        
        </div>
        <div class=" submit-button-holder text-center">
            <button class="btn btn-success" type="submit">SUBMIT</button>
        </div>
        </form>

</div>
</div>
</section>
</div>

</div>




@endsection