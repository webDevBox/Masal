@extends('layout.admin')

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
           <!-- @if(Session::has('success')) -->
           <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="width: 500px;"></p>
           <!-- @endif
           @if(Session::has('error')) -->
           <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" style="width: 500px;"></p>
           <!-- @endif -->
        
       </div>
       <div class="container " style="margin-top: 40px;">
          
              <div class="col-md-12 col-lg-12">
                <div class="row">
               <div class=" col-lg-3 col-md-3">
                  <h4 class="white pencil"><img class="img-fluid " src="{{ asset('images/'.$home->logo) }}" style="height: 100px; width: 200px;">
                     <a href="#" data-toggle="modal" data-target="#myModal">
                        <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor"></i>
                      </a> </h4>
                         
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content  ">
                            <div class="modal-header ">
                                <h2>Footer <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                           
                            </div>
                            <div class="modal-body">
                              <form action="{{route('foot6')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                 @csrf
                                 <fieldset>
                                 <div class="form-group">
                                 <label class="col-md-4 control-label">Select Logo</label>
                                 <div class="col-md-8">
                                 <input type="file" name="data" class="form-control" accept="image/*">
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
                 
               </div>

               <div class=" col-lg-3 col-md-3">
                <h3 class="white pencil1"><strong> {{$home->h1}}</strong>
                   <a href="#" data-toggle="modal" data-target="#myModalk">
                      <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor1"></i>
                    </a> </h3>
                       
                    <div class="modal fade" id="myModalk" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content  ">
                          <div class="modal-header ">
                              <h2>Edit<i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                         
                          </div>
                          <div class="modal-body">
                           <form action="{{route('foot1')}}" method="post" class="form-horizontal form-bordered">
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
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <p class="white pencil2">{{ $home->p }}
                        <a href="#" data-toggle="modal" data-target="#myModal2">
                           <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor2"></i>
                         </a> </p>
                            
                         <div class="modal fade" id="myModal2" role="dialog">
                           <div class="modal-dialog">
                           
                             <!-- Modal content-->
                             <div class="modal-content  ">
                               <div class="modal-header ">
                                   <h2>Edit<i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                               </div>
                               <div class="modal-body">
                                 <form action="{{route('foot2')}}" method="post" class="form-horizontal form-bordered">
                                    @csrf
                                    <fieldset>
                                    <div class="form-group">
                                    <label class="col-md-4 control-label">Enter Text</label>
                                    <div class="col-md-8">
                                    
                                    <textarea name="data" id="" cols="30" class="form-control" rows="3">{{$home->p}}</textarea>
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
             </div>


             <div class=" col-lg-2 col-md-2">
                <h4 class="white pencil3"><strong>{{ $home->h2 }}</strong>
                    <a href="#" data-toggle="modal" data-target="#myModal3">
                      <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor3"></i>
                    </a> </h4>
                       
                    <div class="modal fade" id="myModal3" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content  ">
                          <div class="modal-header ">
                              <h2>Footer <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                         
                          </div>
                          <div class="modal-body">
                           <form action="{{route('foot3')}}" method="post" class="form-horizontal form-bordered">
                              @csrf
                              <fieldset>
                              <div class="form-group">
                              <label class="col-md-4 control-label">Enter Text</label>
                              <div class="col-md-8">
                              <input type="text" name="data" value="{{$home->h2}}" class="form-control">
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
               

                    <p class="white pencil6">{{ $home->t1 }}
                        <a href="#" data-toggle="modal" data-target="#myModal6">
                          <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor6"></i>
                        </a> </p>
                           
                        <div class="modal fade" id="myModal6" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content  ">
                              <div class="modal-header ">
                                  <h2>Footer <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                             
                              </div>
                              <div class="modal-body">
                                 <form action="{{route('foot7')}}" method="post" class="form-horizontal form-bordered">
                                    @csrf
                                    <fieldset>
                                    <div class="form-group">
                                    <label class="col-md-4 control-label">Enter Text</label>
                                    <div class="col-md-8">
                                    <input type="text" name="data" value="{{$home->t1}}" class="form-control">
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

                        <p class="white pencil7">{{ $home->t2 }}
                            <a href="#" data-toggle="modal" data-target="#myModal7">
                              <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor7"></i>
                            </a> </p>
                               
                            <div class="modal fade" id="myModal7" role="dialog">
                              <div class="modal-dialog">
                              
                                <!-- Modal content-->
                                <div class="modal-content  ">
                                  <div class="modal-header ">
                                      <h2>Footer <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{route('foot8')}}" method="post" class="form-horizontal form-bordered">
                                       @csrf
                                       <fieldset>
                                       <div class="form-group">
                                       <label class="col-md-4 control-label">Enter Text</label>
                                       <div class="col-md-8">
                                       <input type="text" name="data" value="{{$home->t2}}" class="form-control">
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

                            <p class="white pencil8">{{ $home->t3 }}
                                <a href="#" data-toggle="modal" data-target="#myModal8">
                                  <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor8"></i>
                                </a> </p>
                                   
                                <div class="modal fade" id="myModal8" role="dialog">
                                  <div class="modal-dialog">
                                  
                                    <!-- Modal content-->
                                    <div class="modal-content  ">
                                      <div class="modal-header ">
                                          <h2>Footer <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                     
                                      </div>
                                      <div class="modal-body">
                                       <form action="{{route('foot9')}}" method="post" class="form-horizontal form-bordered">
                                          @csrf
                                          <fieldset>
                                          <div class="form-group">
                                          <label class="col-md-4 control-label">Enter Text</label>
                                          <div class="col-md-8">
                                          <input type="text" name="data" value="{{$home->t3}}" class="form-control">
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

                                <p class="white pencil9">{{ $home->t4 }}
                                    <a href="#" data-toggle="modal" data-target="#myModal9">
                                      <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor9"></i>
                                    </a> </p>
                                       
                                    <div class="modal fade" id="myModal9" role="dialog">
                                      <div class="modal-dialog">
                                      
                                        <!-- Modal content-->
                                        <div class="modal-content  ">
                                          <div class="modal-header ">
                                              <h2>Footer <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                         
                                          </div>
                                          <div class="modal-body">
                                             <form action="{{route('foot10')}}" method="post" class="form-horizontal form-bordered">
                                                @csrf
                                                <fieldset>
                                                <div class="form-group">
                                                <label class="col-md-4 control-label">Enter Text</label>
                                                <div class="col-md-8">
                                                <input type="text" name="data" value="{{$home->t4}}" class="form-control">
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

                                    <p class="white pencil10">{{ $home->t5 }}
                                        <a href="#" data-toggle="modal" data-target="#myModal10">
                                          <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor10"></i>
                                        </a> </p>
                                           
                                        <div class="modal fade" id="myModal10" role="dialog">
                                          <div class="modal-dialog">
                                          
                                            <!-- Modal content-->
                                            <div class="modal-content  ">
                                              <div class="modal-header ">
                                                  <h2>Footer <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             
                                              </div>
                                              <div class="modal-body">
                                                <form action="{{route('foot11')}}" method="post" class="form-horizontal form-bordered">
                                                   @csrf
                                                   <fieldset>
                                                   <div class="form-group">
                                                   <label class="col-md-4 control-label">Enter Text</label>
                                                   <div class="col-md-8">
                                                   <input type="text" name="data" value="{{$home->t5}}" class="form-control">
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
             </div>

             <div class=" col-lg-2 col-md-2">
                <h4 class="white pencil4"><strong>{{ $home->h3 }}</strong>
                   <a href="#" data-toggle="modal" data-target="#myModal4">
                      <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor4"></i>
                    </a> </h4>
                       
                    <div class="modal fade" id="myModal4" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content  ">
                          <div class="modal-header ">
                              <h2>Footer <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                         
                          </div>
                          <div class="modal-body">
                           <form action="{{route('foot4')}}" method="post" class="form-horizontal form-bordered">
                              @csrf
                              <fieldset>
                              <div class="form-group">
                              <label class="col-md-4 control-label">Enter Text</label>
                              <div class="col-md-8">
                              <input type="text" name="data" value="{{$home->h3}}" class="form-control">
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
               
             </div>

             <div class=" col-lg-2 col-md-2">
                <h4 class="white pencil5"><strong>{{ $home->h4 }}</strong>
                   <a href="#" data-toggle="modal" data-target="#myModal5">
                      <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor5"></i>
                    </a> </h4>
                       
                    <div class="modal fade" id="myModal5" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content  ">
                          <div class="modal-header ">
                              <h2>Footer <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                         
                          </div>
                          <div class="modal-body">
                           <form action="{{route('foot5')}}" method="post" class="form-horizontal form-bordered">
                              @csrf
                              <fieldset>
                              <div class="form-group">
                              <label class="col-md-4 control-label">Enter Text</label>
                              <div class="col-md-8">
                              <input type="text" name="data" value="{{$home->h4}}" class="form-control">
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
               
             </div>
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
      $('.editor3').attr('style','font-size: 25px; color:#7367F0;')
   });
   $('.pencil3').mouseleave(function()
   {
      $('.editor3').attr('style','display:none; font-size: 25px; color:#7367F0;')
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