@extends('layout.admin_pager')

@section('content')
    
<div class="app-content content ">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper">
   <div class="content-header row">
   </div>
   
   <div class="row" style="margin-top: 50px;">
       <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 offset-lg-1 offset-md-1" style="background-color: rgb(253, 253, 253);  box-shadow: 5px 5px 5px 5px #c0bcbc;">
       <!-- General Data Block -->
       <div class="block">
       <!-- General Data Title -->
       <div class="block-title">
       <h2 class="text-center mt-3"> <strong>Edit</strong> Footer </h2>
           @if(Session::has('success'))
           <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="width: 500px;">{{ Session::get('success') }}</p>
           @endif
           @if(Session::has('error'))
           <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" style="width: 500px;">{{ Session::get('error') }}</p>
           @endif
        
       </div>
            <div class="row">
               <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

               </div>

               <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                  <h4 class="white pencil">{{$home->h1}} 
                     <a href="#" data-toggle="modal" data-target="#1st">
                        <i style="display:none; font-size: 25px; color:black;" class="fa fa-pencil editor"></i>
                      </a> </h4>
                      <div class="modal fade" id="1st" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Size</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{route('add_size')}}" method="POST">
                            @csrf
                        <div class="row">
                       
                        <div class="form-group">
                        <label class="col-md-12 control-label"> Enter New Size <span style="color: red"> * </span></label>
                        <div class="col-md-12">
                        <input type="text" placeholder="Enter Size" name="size" class="form-control" required>
                        </div>
                        </div>
                    
                        </div>
                        <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
                        <input type="submit" name="sendsize" value="Submit" class="btn btn-primary"> 
                        </form>
                        </div>
                        </div>
                        </div>
                     </div>

                 
               </div>

               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

               </div>

               <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

               </div>

               <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

               </div>

            </div>
       </div>
       <!-- END General Data Block -->
       </div>
       
       </div>
       
   </section>
   <!-- Dashboard Ecommerce ends -->
   
   </div>
   </div>


   <script>
      $('.pencil').mouseenter(function()
      {
         $('.editor').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil').mouseleave(function()
      {
         $('.editor').attr('style','display:none; font-size: 25px; color:black;')
      });
  
  
      $('.pencil1').mouseenter(function()
      {
         $('.editor1').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil1').mouseleave(function()
      {
         $('.editor1').attr('style','display:none; font-size: 25px; color:black;')
      });
  
      $('.pencil2').mouseenter(function()
      {
         $('.editor2').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil2').mouseleave(function()
      {
         $('.editor2').attr('style','display:none; font-size: 25px; color:black;')
      });
  
      $('.pencil3').mouseenter(function()
      {
         $('.editor3').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil3').mouseleave(function()
      {
         $('.editor3').attr('style','display:none; font-size: 25px; color:black;')
      });
  
  
      $('.pencil4').mouseenter(function()
      {
         $('.editor4').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil4').mouseleave(function()
      {
         $('.editor4').attr('style','display:none; font-size: 25px; color:black;')
      });
  
  
      $('.pencil5').mouseenter(function()
      {
         $('.editor5').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil5').mouseleave(function()
      {
         $('.editor5').attr('style','display:none; font-size: 25px; color:black;')
      });
  
      $('.pencil6').mouseenter(function()
      {
         $('.editor6').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil6').mouseleave(function()
      {
         $('.editor6').attr('style','display:none; font-size: 25px; color:black;')
      });
  
      $('.pencil7').mouseenter(function()
      {
         $('.editor7').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil7').mouseleave(function()
      {
         $('.editor7').attr('style','display:none; font-size: 25px; color:black;')
      });
  
  
      $('.pencil8').mouseenter(function()
      {
         $('.editor8').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil8').mouseleave(function()
      {
         $('.editor8').attr('style','display:none; font-size: 25px; color:black;')
      });
  
  
  
      $('.pencil9').mouseenter(function()
      {
         $('.editor9').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil9').mouseleave(function()
      {
         $('.editor9').attr('style','display:none; font-size: 25px; color:black;')
      });
  
  
      $('.pencil10').mouseenter(function()
      {
         $('.editor10').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil10').mouseleave(function()
      {
         $('.editor10').attr('style','display:none; font-size: 25px; color:black;')
      });
  
  
      $('.pencil11').mouseenter(function()
      {
         $('.editor11').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil11').mouseleave(function()
      {
         $('.editor11').attr('style','display:none; font-size: 25px; color:black;')
      });
  
  
      $('.pencil12').mouseenter(function()
      {
         $('.editor12').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil12').mouseleave(function()
      {
         $('.editor12').attr('style','display:none; font-size: 25px; color:black;')
      });
  
  
      $('.pencil13').mouseenter(function()
      {
         $('.editor13').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil13').mouseleave(function()
      {
         $('.editor13').attr('style','display:none; font-size: 25px; color:black;')
      });
  
  
      $('.pencil14').mouseenter(function()
      {
         $('.editor14').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil14').mouseleave(function()
      {
         $('.editor14').attr('style','display:none; font-size: 25px; color:black;')
      });
  
  
      $('.pencil15').mouseenter(function()
      {
         $('.editor15').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil15').mouseleave(function()
      {
         $('.editor15').attr('style','display:none; font-size: 25px; color:black;')
      });
  
      $('.pencil16').mouseenter(function()
      {
         $('.editor16').attr('style','font-size: 25px; color:black;')
      });
      $('.pencil16').mouseleave(function()
      {
         $('.editor16').attr('style','display:none; font-size: 25px; color:black;')
      });
    
  
  </script>


@endsection