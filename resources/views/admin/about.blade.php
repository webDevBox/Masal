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
    <h1 class="text-center">Edit About Us Page</h1>
    @if(Session::has('success'))

    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    
    @endif
    
    @if(Session::has('error'))
    
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    
    @endif
    @if ($errors->has('name'))<p style="color:red;">{{ $errors->first('name') }}</p>@endif
    @if ($errors->has('title'))<p style="color:red;">{{ $errors->first('title') }}</p>@endif
    @if ($errors->has('key'))<p style="color:red;">{{ $errors->first('key') }}</p>@endif
         <form action="{{ route('about_date') }}" method="post">
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






    
              
            <a href="#" data-toggle="modal" data-target="#myModal1">
              <img class="mx-auto d-block" style="width: 250px; height:70px;" src="{{ asset('images/'.$home->logo) }}" alt="">
            </a>
          

          <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">
            
              
              <div class="modal-content  ">
                <div class="modal-header ">
                    <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               
                </div>
                <div class="modal-body">
                  <form action="{{route('about1')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                     @csrf
                     <fieldset>
                        <img class="mx-auto d-block" style="width: 250px; height:70px;" src="{{ asset('images/'.$home->logo) }}" alt="">

                     <div class="form-group">
                     <label class="col-md-4 control-label">Select New Logo</label>
                     <div class="col-md-8">
                     <input type="file" name="data" class="form-control" accept="image/*">
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
         <div class="row" style="background: #DBDADD;">
               <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2" style="background: white; margin-bottom:10px; margin-top:10px; padding:10px;">
                
                
                <a href="#" data-toggle="modal" data-target="#myModal2">
                    <img class="d-inline" style="width: 287px; height:456px; padding:10px;" src="{{ asset('images/'.$home->image1) }}" alt="">
                  </a>

                  <div class="modal fade" id="myModal2" role="dialog">
                    <div class="modal-dialog">
                    
                      
                      <div class="modal-content  ">
                        <div class="modal-header ">
                            <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                       
                        </div>
                        <div class="modal-body">
                          <form action="{{route('about2')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                             @csrf
                             <fieldset>
                                <img class="mx-auto d-block" style="width: 287px; height:456px; padding:10px;" src="{{ asset('images/'.$home->image1) }}" alt="">
        
                             <div class="form-group">
                             <label class="col-md-4 control-label">Select New Image</label>
                             <div class="col-md-8">
                             <input type="file" name="data" class="form-control" accept="image/*">
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



                  <a href="#" data-toggle="modal" data-target="#myModal3">
                    <img class="d-inline" style="width: 287px; height:456px; padding:10px;" src="{{ asset('images/'.$home->image2) }}" alt="">
                  </a>


                  <div class="modal fade" id="myModal3" role="dialog">
                    <div class="modal-dialog">
                    
                      
                      <div class="modal-content  ">
                        <div class="modal-header ">
                            <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                       
                        </div>
                        <div class="modal-body">
                          <form action="{{route('about3')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                             @csrf
                             <fieldset>
                                <img class="mx-auto d-block" style="width: 287px; height:456px; padding:10px;" src="{{ asset('images/'.$home->image2) }}" alt="">
        
                             <div class="form-group">
                             <label class="col-md-4 control-label">Select New Image</label>
                             <div class="col-md-8">
                             <input type="file" name="data" class="form-control" accept="image/*">
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





                  <a href="#" data-toggle="modal" data-target="#myModal4">
                    <img class="d-inline" style="width: 287px; height:456px; padding:10px;" src="{{ asset('images/'.$home->image3) }}" alt="">
                  </a>

                  <div class="modal fade" id="myModal4" role="dialog">
                    <div class="modal-dialog">
                    
                      
                      <div class="modal-content  ">
                        <div class="modal-header ">
                            <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                       
                        </div>
                        <div class="modal-body">
                          <form action="{{route('about4')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                             @csrf
                             <fieldset>
                                <img class="mx-auto d-block" style="width: 287px; height:456px; padding:10px;" src="{{ asset('images/'.$home->image3) }}" alt="">
        
                             <div class="form-group">
                             <label class="col-md-4 control-label">Select New Image</label>
                             <div class="col-md-8">
                             <input type="file" name="data" class="form-control" accept="image/*">
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


               </div>
         </div>

         <h1 style="font-size:xx-large;" class="white pencil12 text-center"><i>{{ $home->h1 }} 
                                 
            <a href="#" data-toggle="modal" data-target="#myModal5">
              <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor12"></i>
            </a>
          </i></h1>


          <div class="modal fade" id="myModal5" role="dialog">
            <div class="modal-dialog">
            
              
              <div class="modal-content  ">
                <div class="modal-header ">
                    <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               
                </div>
                <div class="modal-body">
                   <form action="{{route('about5')}}" method="post" class="form-horizontal form-bordered">
                      @csrf
                      <fieldset>
                      <div class="form-group">
                      <label class="col-md-4 control-label">Enter Text</label>
                      <div class="col-md-8">
                      <input type="text" name="data" value="{{$home->h1}}" class="form-control">
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




<br><br>

          <p  class="white pencil13 text-center"><i>{{ $home->p1 }} 
                                 
            <a href="#" data-toggle="modal" data-target="#myModal6">
              <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor13"></i>
            </a>
          </i></p>


          <div class="modal fade" id="myModal6" role="dialog">
            <div class="modal-dialog">
            
              
              <div class="modal-content  ">
                <div class="modal-header ">
                    <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               
                </div>
                <div class="modal-body">
                   <form action="{{route('about6')}}" method="post" class="form-horizontal form-bordered">
                      @csrf
                      <fieldset>
                      <div class="form-group">
                      <label class="col-md-4 control-label">Enter Text</label>
                      <div class="col-md-8">
                      <input type="text" name="data" value="{{$home->p1     }}" class="form-control">
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



          <br><br>

          <p  class="white pencil14 text-center"><i>{{ $home->p2 }} 
                                 
            <a href="#" data-toggle="modal" data-target="#myModal7">
              <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor14"></i>
            </a>
          </i></p>


          <div class="modal fade" id="myModal7" role="dialog">
            <div class="modal-dialog">
            
              
              <div class="modal-content  ">
                <div class="modal-header ">
                    <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               
                </div>
                <div class="modal-body">
                   <form action="{{route('about7')}}" method="post" class="form-horizontal form-bordered">
                      @csrf
                      <fieldset>
                      <div class="form-group">
                      <label class="col-md-4 control-label">Enter Text</label>
                      <div class="col-md-8">
                      <input type="text" name="data" value="{{$home->p2}}" class="form-control">
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





          <br><br>

          <p  class="white pencil15 text-center"><i>{{ $home->p3 }} 
                                 
            <a href="#" data-toggle="modal" data-target="#myModal8">
              <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor15"></i>
            </a>
          </i></p>


          <div class="modal fade" id="myModal8" role="dialog">
            <div class="modal-dialog">
            
              
              <div class="modal-content  ">
                <div class="modal-header ">
                    <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               
                </div>
                <div class="modal-body">
                   <form action="{{route('about8')}}" method="post" class="form-horizontal form-bordered">
                      @csrf
                      <fieldset>
                      <div class="form-group">
                      <label class="col-md-4 control-label">Enter Text</label>
                      <div class="col-md-8">
                      <input type="text" name="data" value="{{$home->p3}}" class="form-control">
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





          <br><br>

          <p  class="white pencil16 text-center"><i>{{ $home->p4 }} 
                                 
            <a href="#" data-toggle="modal" data-target="#myModal9">
              <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor16"></i>
            </a>
          </i></p>


          <div class="modal fade" id="myModal9" role="dialog">
            <div class="modal-dialog">
            
              
              <div class="modal-content  ">
                <div class="modal-header ">
                    <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               
                </div>
                <div class="modal-body">
                   <form action="{{route('about9')}}" method="post" class="form-horizontal form-bordered">
                      @csrf
                      <fieldset>
                      <div class="form-group">
                      <label class="col-md-4 control-label">Enter Text</label>
                      <div class="col-md-8">
                      <input type="text" name="data" value="{{$home->p4}}" class="form-control">
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



          <br><br>

          <p  class="white pencil17 text-center"><i>{{ $home->p5 }} 
                                 
            <a href="#" data-toggle="modal" data-target="#myModal10">
              <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor17"></i>
            </a>
          </i></p>


          <div class="modal fade" id="myModal10" role="dialog">
            <div class="modal-dialog">
            
              
              <div class="modal-content  ">
                <div class="modal-header ">
                    <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               
                </div>
                <div class="modal-body">
                   <form action="{{route('about10')}}" method="post" class="form-horizontal form-bordered">
                      @csrf
                      <fieldset>
                      <div class="form-group">
                      <label class="col-md-4 control-label">Enter Text</label>
                      <div class="col-md-8">
                      <input type="text" name="data" value="{{$home->p5}}" class="form-control">
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