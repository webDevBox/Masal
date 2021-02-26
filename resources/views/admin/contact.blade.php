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
   <div class="container">
    <h1 class="text-center">Edit Contact Us Page</h1>
    @if(Session::has('success'))

    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    
    @endif
    
    @if(Session::has('error'))
    
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    
    @endif
    @if ($errors->has('name'))<p style="color:red;">{{ $errors->first('name') }}</p>@endif
    @if ($errors->has('title'))<p style="color:red;">{{ $errors->first('title') }}</p>@endif
    @if ($errors->has('key'))<p style="color:red;">{{ $errors->first('key') }}</p>@endif
         <form action="{{ route('contact_date') }}" method="post">
           @csrf
           <div class="row container">
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <label> Enter Page Name </label>
              <input type="text" name="name" value="{{ $home->name }}" class="form-control" required>
             </div>
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <label> Enter Page Title </label>
           <input type="text" name="title" value="{{ $home->title }}" class="form-control mx-auto" required>
             </div>
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <label> Enter Page Keywords </label>
           <input type="text" name="key" value="{{ $home->keyword }}" class="form-control" required>
             </div>
          </div>
          <center><input type="submit" name="submit" value="Submit" class="btn btn-primary my-2"> </center>
         </form>


   </div>

 
   </div>
   </div>
   </div>
   <script>
      $('.pencil').mouseenter(function()
      {
         $('.editor').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil').mouseleave(function()
      {
         $('.editor').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
  
      $('.pencil1').mouseenter(function()
      {
         $('.editor1').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil1').mouseleave(function()
      {
         $('.editor1').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
      $('.pencil2').mouseenter(function()
      {
         $('.editor2').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil2').mouseleave(function()
      {
         $('.editor2').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
      $('.pencil3').mouseenter(function()
      {
         $('.editor3').attr('style','font-size: 45px; color:#7367F0;')
      });
      $('.pencil3').mouseleave(function()
      {
         $('.editor3').attr('style','display:none; font-size: 45px; color:#7367F0;')
      });
  
  
      $('.pencil4').mouseenter(function()
      {
         $('.editor4').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil4').mouseleave(function()
      {
         $('.editor4').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
  
      $('.pencil5').mouseenter(function()
      {
         $('.editor5').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil5').mouseleave(function()
      {
         $('.editor5').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
      $('.pencil6').mouseenter(function()
      {
         $('.editor6').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil6').mouseleave(function()
      {
         $('.editor6').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
      $('.pencil7').mouseenter(function()
      {
         $('.editor7').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil7').mouseleave(function()
      {
         $('.editor7').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
  
      $('.pencil8').mouseenter(function()
      {
         $('.editor8').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil8').mouseleave(function()
      {
         $('.editor8').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
  
  
      $('.pencil9').mouseenter(function()
      {
         $('.editor9').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil9').mouseleave(function()
      {
         $('.editor9').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
  
      $('.pencil10').mouseenter(function()
      {
         $('.editor10').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil10').mouseleave(function()
      {
         $('.editor10').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
  
      $('.pencil11').mouseenter(function()
      {
         $('.editor11').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil11').mouseleave(function()
      {
         $('.editor11').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
  
      $('.pencil12').mouseenter(function()
      {
         $('.editor12').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil12').mouseleave(function()
      {
         $('.editor12').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
  
      $('.pencil13').mouseenter(function()
      {
         $('.editor13').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil13').mouseleave(function()
      {
         $('.editor13').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
  
      $('.pencil14').mouseenter(function()
      {
         $('.editor14').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil14').mouseleave(function()
      {
         $('.editor14').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
  
      $('.pencil15').mouseenter(function()
      {
         $('.editor15').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil15').mouseleave(function()
      {
         $('.editor15').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
  
      $('.pencil16').mouseenter(function()
      {
         $('.editor16').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil16').mouseleave(function()
      {
         $('.editor16').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
     
     
      $('.pencil17').mouseenter(function()
      {
         $('.editor17').attr('style','font-size: 25px; color:#7367F0;')
      });
      $('.pencil17').mouseleave(function()
      {
         $('.editor17').attr('style','display:none; font-size: 25px; color:#7367F0;')
      });
    
  
  </script>


@endsection