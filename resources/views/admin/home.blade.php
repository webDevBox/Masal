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
     <h1 class="text-center">Edit Home Page</h1>
    @if(Session::has('success'))

    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    
    @endif
    
    @if(Session::has('error'))
    
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    
    @endif
    @if ($errors->has('name'))<p style="color:red;">{{ $errors->first('name') }}</p>@endif
    @if ($errors->has('title'))<p style="color:red;">{{ $errors->first('title') }}</p>@endif
    @if ($errors->has('key'))<p style="color:red;">{{ $errors->first('key') }}</p>@endif
         <form action="{{ route('home_date') }}" method="post">
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
        
        
         <h1 style="font-size:xx-large;" class="white pencil11 text-center"><i><strong>{{ $home->name5 }}</strong> 
                                 
            <a href="#" data-toggle="modal" data-target="#myModal8">
              <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor11"></i>
            </a>
          </i></h1>

          <div class="modal fade" id="myModal8" role="dialog">
            <div class="modal-dialog">
            
              
              <div class="modal-content  ">
                <div class="modal-header ">
                    <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               
                </div>
                <div class="modal-body">
                  <form action="{{route('head5')}}" method="post" class="form-horizontal form-bordered">
                     @csrf
                     <fieldset>
                     <div class="form-group">
                     <label class="col-md-4 control-label">Enter Text</label>
                     <div class="col-md-8">
                     <input type="text" name="data" value="{{$home->name5}}" class="form-control">
                     </div>
                     </div>
                    
                    
                     <center>
                     <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
                     </center>
                     </form>
                </div>
                <div class="modal-footer white pencil2">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
              </div>
              
            </div>
          </div>
         
      
       <div class="row">

               <div class="col-md-6 my-auto "  >
                   <div style=" width: 500px; height: 450px; background-color: background-color: rgb(253, 253, 253);  box-shadow: 5px 5px 5px 5px #c0bcbc;" class="offset-md-3">
                       <div class="list-item text-center" style="padding: 60px;">
                           <div class="content-header">
                             <div class="header offset">
                               <h1 style="font-size:xx-large;" class="white pencil"><i><strong>{{ $home->name1 }}</strong> 
                                 
                                 <a href="#" data-toggle="modal" data-target="#myModal">
                                   <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor"></i>
                                 </a>
                               </i></h1>
                               <!-- modal-body Starts -->
                               <div class="modal fade" id="myModal" role="dialog">
                                   <div class="modal-dialog">
                                   
                                     
                                     <div class="modal-content  ">
                                       <div class="modal-header ">
                                           <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      
                                       </div>
                                       <div class="modal-body">
                                          <form action="{{route('head1')}}" method="post" class="form-horizontal form-bordered">
                                             @csrf
                                             <fieldset>
                                             <div class="form-group">
                                             <label class="col-md-4 control-label">Enter Text</label>
                                             <div class="col-md-8">
                                             <input type="text" name="data" value="{{$home->name1}}" class="form-control">
                                             </div>
                                             </div>
                                            
                                            
                                             <center>
                                             <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
                                             </center>
                                             </form>
                                       </div>
                                       <div class="modal-footer">
                                         <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                       </div>
                                     </div>
                                     
                                   </div>
                                 </div>
                               <!-- modal-body ends -->
                               <p style="line-height: 200%;" class="white pencil1"> 
                                 {{ $home->name2 }}
                                 <a href="#" data-toggle="modal" data-target="#myModal1">
                                   <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor1"></i>
                                 </a>
                               <!-- modal-body Starts -->
                               <div class="modal fade" id="myModal1" role="dialog">
                                   <div class="modal-dialog">
                                   
                                     
                                     <div class="modal-content  ">
                                       <div class="modal-header ">
                                           <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      
                                       </div>
                                       <div class="modal-body">
                                          <form action="{{route('head2')}}" method="post" class="form-horizontal form-bordered">
                                             @csrf
                                             <fieldset>
                                             <div class="form-group">
                                             <label class="col-md-4 control-label">Enter Text</label>
                                             <div class="col-md-8">
                                             <input type="text" name="data" value="{{$home->name2}}" class="form-control">
                                             </div>
                                             </div>
                                            
                                             <center>
                                             <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
                                             </center>
                                             </form>
                                       </div>
                                       <div class="modal-footer">
                                         <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                       </div>
                                     </div>
                                     
                                   </div>
                                 </div>
                               <!-- modal-body ends -->
                               </p>
                               <!-- modal-body Starts -->
                               <div class="modal fade" id="myModal2" role="dialog">
                                   <div class="modal-dialog">
                                   
                                     
                                     <div class="modal-content  ">
                                       <div class="modal-header ">
                                           <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      
                                       </div>
                                       <div class="modal-body">
                                           <div class="row">
                                  
                                               <div class="form-group">
                                               <label class="col-md-12 control-label"> Enter New Size <span style="color: red"> * </span></label>
                                               <div class="col-md-12">
                                               <input type="text" placeholder="Enter Size" name="size" class="form-control" required>
                                               </div>
                                               </div>
                                           
                                               </div>
                                       </div>
                                       <div class="modal-footer white pencil2">
                                         <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                       </div>
                                     </div>
                                     
                                   </div>
                                 </div>
                               <!-- modal-body ends -->
                             </div>
                           </div>
                         </div>
                   </div>
               </div>
               <div class="col-md-6 white pencil3">
                 
                   <a href="#" data-toggle="modal" data-target="#myModal3">
                       <img class="img-fluid" src="{{ asset('images/'.$home->image) }}" style="width: 80%; height: 600px;">
                       <i style="display:none; font-size: 45px; color:#7367F0;" class="fa fa-pencil editor3"></i>
                     </a>
                       <!-- modal-body Starts -->
                       <div class="modal fade" id="myModal3" role="dialog">
                           <div class="modal-dialog">
                           
                             
                             <div class="modal-content  ">
                               <div class="modal-header ">
                                   <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                               </div>
                               <div class="modal-body">
                                 <form action="{{route('head18')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                    @csrf
                                    <fieldset>
                                    <div class="form-group">
                                    <label class="col-md-4 control-label">Select Image</label>
                                    <div class="col-md-8">
                                    <input type="file" name="data" class="form-control">
                                    </div>
                                    </div>
                                   
                                   
                                    <center>
                                    <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
                                    </center>
                                    </form>
                               </div>
                               <div class="modal-footer white pencil2">
                                 <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                               </div>
                             </div>
                             
                           </div>
                         </div>
                       <!-- modal-body ends -->
               </div>
           </div>
          
       </div>
   </div>
<br><br>
   <h1 style="font-size:xx-large;" class="white pencil12 text-center"><i><strong>{{ $home->name6 }}</strong> 
                                 
      <a href="#" data-toggle="modal" data-target="#myModal9">
        <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor12"></i>
      </a>
    </i></h1>
<br><br>
    <div class="modal fade" id="myModal9" role="dialog">
      <div class="modal-dialog">
      
        
        <div class="modal-content  ">
          <div class="modal-header ">
              <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         
          </div>
          <div class="modal-body">
            <form action="{{route('head7')}}" method="post" class="form-horizontal form-bordered">
               @csrf
               <fieldset>
               <div class="form-group">
               <label class="col-md-4 control-label">Enter Text</label>
               <div class="col-md-8">
               <input type="text" name="data" value="{{$home->name6}}" class="form-control">
               </div>
               </div>
              
              
               <center>
               <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
               </center>
               </form>
          </div>
          <div class="modal-footer white pencil2">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
   <!-- Dashboard Ecommerce ends -->
   <div class="container">
       <div class="col-md-12">
       <div class="row">
               <div class="col-md-6 white pencil4">
                   <a href="#" data-toggle="modal" data-target="#myModal4">
                       <img src="{{ asset('images/'.$home->image2) }}" class="img-fluid offset-md-4" style="width: 380px; height: 470px;">   
                       <i style="display:none; font-size: 45px; color:#7367F0;" class="fa fa-pencil editor4"></i>
                     </a>
                    <!-- modal-body Starts -->
                    <div class="modal fade" id="myModal4" role="dialog">
                       <div class="modal-dialog">
                       
                         
                         <div class="modal-content  ">
                           <div class="modal-header ">
                               <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
                           </div>
                           <div class="modal-body">
                              <form action="{{route('head19')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                 @csrf
                                 <fieldset>
                                 <div class="form-group">
                                 <label class="col-md-4 control-label">Select Image</label>
                                 <div class="col-md-8">
                                 <input type="file" name="data" class="form-control">
                                 </div>
                                 </div>
                                
                                
                                 <center>
                                 <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
                                 </center>
                                 </form>
                           </div>
                           <div class="modal-footer white pencil2">
                             <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                           </div>
                         </div>
                         
                       </div>
                     </div>
                   <!-- modal-body ends -->
                 </div>
                   
               
               <div class="col-md-6 content-block " > 
                      <div class="white pencil5" >
                       {{-- <a href="#" data-toggle="modal" data-target="#myModal5">
                           <h2><strong style="color: black ; font-size: 35px;">{{ $home->name3 }}</strong></h2>
                           <i style="display:none; font-size: 45px; color:#7367F0;" class="fa fa-pencil editor5"></i>
                         </a> --}}
                            <!-- modal-body Starts -->
                    <div class="modal fade" id="myModal5" role="dialog">
                       <div class="modal-dialog">
                       
                         
                         <div class="modal-content  ">
                           <div class="modal-header ">
                               <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
                           </div>
                           <div class="modal-body">
                              <form action="{{route('head3')}}" method="post" class="form-horizontal form-bordered">
                                 @csrf
                                 <fieldset>
                                 <div class="form-group">
                                 <label class="col-md-4 control-label">Enter Text</label>
                                 <div class="col-md-8">
                                 <input type="text" name="data" value="{{$home->name3}}" class="form-control">
                                 </div>
                                 </div>
                                
                                
                                 <center>
                                 <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
                                 </center>
                                 </form>
                           </div>
                           <div class="modal-footer white pencil2">
                             <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                           </div>
                         </div>
                         
                       </div>
                     </div>
                   <!-- modal-body ends -->
                       </div>
                      <div class="white pencil6"> 
                           <img src="{{ asset('images/'.$foot->logo) }}" style="width: 300px; height: 100px;">
                         
                            <!-- modal-body Starts -->
                    
                   <!-- modal-body ends -->
                       </div>
                      <div class="white pencil7"> 
                       <a href="#" style="color: black;" data-toggle="modal" data-target="#myModal7">
                           <p style="line-height:2em;">{{ $home->name4 }}</p>
                           <i style="display:none; font-size: 45px; color:#7367F0;" class="fa fa-pencil editor7"></i>
                         </a>
                            <!-- modal-body Starts -->
                    <div class="modal fade" id="myModal7" role="dialog">
                       <div class="modal-dialog">
                       
                         
                         <div class="modal-content  ">
                           <div class="modal-header ">
                               <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
                           </div>
                           <div class="modal-body">
                              <form action="{{route('head4')}}" method="post" class="form-horizontal form-bordered">
                                 @csrf
                                 <fieldset>
                                 <div class="form-group">
                                 <label class="col-md-4 control-label">Enter Text</label>
                                 <div class="col-md-8">
                                 <input type="text" name="data" value="{{$home->name4}}" class="form-control">
                                 </div>
                                 </div>
                                
                                
                                 <center>
                                 <button type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary">Submit</button>
                                 </center>
                                 </form>
                           </div>
                           <div class="modal-footer white pencil2">
                             <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                           </div>
                         </div>
                         
                       </div>
                     </div>
                   <!-- modal-body ends -->
                              </div>
                      
                  
                   </div>
           </div>
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
    
  
  </script>


@endsection