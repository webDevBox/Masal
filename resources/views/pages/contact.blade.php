@extends('layout.web')
@section('content')

<section class="section-showcase section-showcase-top">
<div class="container">
<div class="row">
<div class="showcase">
<div class="shocase-section showcase-header" >
<div class="list">

<div class="list-item">
<div class="header header-title">
    <h2  role="heading" aria-level="1">Contact Us</h2>
    @if(Session::has('success'))

    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    
    @endif
    
    @if(Session::has('error'))
    
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    
    @endif
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="contact-body auth-form section-block">
<div class="container">
<div class="row">

<div class=" col-md-push-1  col-md-5">

<div class="auth-container col-md-push-1  col-md-12">
<form action="{{route('feedback')}}" method="post">
@csrf
<input class="form-control" type="text" value="{{ old('name') }}" name="name" placeholder="FULL NAME" required>
@if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif 

<input class="form-control" style="margin-top:15px;" type="tel" value="{{ old('phone') }}" name="phone" placeholder="PHONE NUMBER" required>
@if ($errors->has('phone')) <p style="color:red;">{{ $errors->first('phone') }}</p> @endif 


<input class="form-control" style="margin-top:15px;" type="email" name="email" value="{{ old('email') }}" placeholder="EMAIL" required>
@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif 


<textarea rows="3" class="form-control" style="margin-top:15px;" name="message" placeholder="MESSAGE" required>{{ old('message') }}</textarea>
@if ($errors->has('message')) <p style="color:red;">{{ $errors->first('message') }}</p> @endif 


<input style="margin-top:15px;" type="submit" name="submit" value="SEND" class="btn btn-lg btn-block btn-success text-uppercase">
</form>          
</div>
</div>
<div class="col-md-push-1 col-md-6 " >
<iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53611.191472583756!2d-96.972951019373!3d32.879670153963815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864e82a0f7eb6ce5%3A0xaacb5daff67403a2!2sIrving%2C%20TX%2075039!5e0!3m2!1sen!2sus!4v1591555887970!5m2!1sen!2sus" frameborder="0" style="border:0; width: 90%; height: 470px;" allowfullscreen></iframe>
</div>
</div>
</div>
</section>

<script>
    $('#top_title').html('{{ $contact->title }}');
    $('#top_key').attr('content','{{ $contact->keyword }}');
</script>

@endsection