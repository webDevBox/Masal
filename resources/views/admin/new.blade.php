@extends('layout.admin')
@section('content')
   

<div class="app-content content ">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper">
   <div class="content-header row">
   </div>
   
   <div class="row" style="margin-top: 10px;">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: rgb(253, 253, 253);  box-shadow: 5px 5px 5px 5px #c0bcbc;">
       <!-- General Data Block -->
       <div class="block">
       <!-- General Data Title -->
       <div class="block-title">
       <h2 class="text-center mt-3"> <strong>Edit</strong> {{ $page->name }} Page </h2>
           @if(Session::has('success'))
           <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="width: 500px;">{{ Session::get('success') }}</p>
           @endif
           @if(Session::has('error'))
           <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" style="width: 500px;">{{ Session::get('error') }}</p>
           @endif
           @if ($errors->has('data')) <p style="color:red;">{{ $errors->first('data') }}</p> @endif 

        
       </div>
         <a href="#" data-toggle="modal" data-target="#myModal3">
         <img style="width:100%; height:300px;" @if($page->banner == null) src="{{ asset('images/banner/banner.jpg') }}"
          @else src="{{ asset('images/'.$page->banner) }}" @endif alt="">
          <i style="display:none; font-size: 45px; color:#7367F0;" class="fa fa-pencil editor3"></i>
         </a>

         <div class="modal fade" id="myModal3" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content  ">
                <div class="modal-header ">
                    <h2>Edit Banner <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               
                </div>
                <div class="modal-body">
                  <form action="{{route('new1')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                     @csrf
                     <fieldset>
                     <div class="form-group">
                     <label class="col-md-4 control-label">Select Image</label>
                     <div class="col-md-8">
                     <input type="file" name="data" class="form-control">
                     </div>
                     </div>

                     <input type="text" name="name" value="{{ $page->name }}" style="display: none;">
                    
                    
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

          {{-- End Banner --}}

          <h1 style="font-size:xx-large;" class="white pencil11 text-center my-2"><i><strong>@php echo $page->h1; @endphp</strong> 
                                 
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
                  <form action="{{route('new2')}}" method="post" class="form-horizontal form-bordered">
                     @csrf
                     <fieldset>
                     <div class="form-group">
                     <label class="col-md-4 control-label">Enter Text</label>
                     <div class="col-md-8">
                     <textarea name="data" class="form-control ckeditor">{{$page->h1}}</textarea>
                     </div>
                     </div>
                    
                     <input type="text" name="name" value="{{ $page->name }}" style="display: none;">
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

          {{-- End First Heading --}}


          <div class="row bg-light">
            <div class="col-lg-3 col-md-3 offset-lg-3 offset-md-3 col-sm-12 col-xs-12" style="margin-top: 10%;">
               <div style="background-color: rgb(253, 253, 253);  box-shadow: 5px 5px 5px 5px #c0bcbc;">
                  <h2 class="white pencil1 text-center my-2"><i><strong> @php echo $page->h2; @endphp</strong>  
                     <a href="#" data-toggle="modal" data-target="#myModal1">
                       <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor1"></i>
                     </a>
                   </i></h2>
                   <div class="modal fade" id="myModal1" role="dialog">
                     <div class="modal-dialog">
                     
                       
                       <div class="modal-content  ">
                         <div class="modal-header ">
                             <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                         </div>
                         <div class="modal-body">
                           <form action="{{route('new3')}}" method="post" class="form-horizontal form-bordered">
                              @csrf
                              <fieldset>
                              <div class="form-group">
                              <label class="col-md-4 control-label">Enter Text</label>
                              <div class="col-md-8">
                              <textarea name="data" class="form-control ckeditor">{{$page->h2}}</textarea>
                              </div>
                              </div>
                             
                              <input type="text" name="name" value="{{ $page->name }}" style="display: none;">
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

                   <div class="pencil2">
                   <p class="white text-center my-2"><i><strong>@php
                       echo $page->p1;
                   @endphp</strong>  
                     <a href="#" data-toggle="modal" data-target="#myModal4">
                       <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor2"></i>
                     </a>
                   </i></p>
                  </div>

                   <div class="modal fade" id="myModal4" role="dialog">
                     <div class="modal-dialog">
                     
                       
                       <div class="modal-content  ">
                         <div class="modal-header ">
                             <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                         </div>
                         <div class="modal-body">
                           <form action="{{route('new4')}}" method="post" class="form-horizontal form-bordered">
                              @csrf
                              <fieldset>
                              <div class="form-group">
                              <label class="col-md-4 control-label">Enter Text</label>
                              <div class="col-md-8">
                              <textarea name="data" class="form-control ckeditor">{{$page->p1}}</textarea>
                              </div>
                              </div>
                             
                              <input type="text" name="name" value="{{ $page->name }}" style="display: none;">
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
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
               <a href="#" data-toggle="modal" data-target="#myModal5">
                  <img style="width:400px; height:500px;" @if($page->image1 == null) src="{{ asset('images/custom/dummy.jpg') }}"
                   @else src="{{ asset('images/'.$page->image1) }}" @endif alt="">
                   <i style="display:none; font-size: 45px; color:#7367F0;" class="fa fa-pencil editor3"></i>
                  </a>
         
                  <div class="modal fade" id="myModal5" role="dialog">
                     <div class="modal-dialog">
                       <div class="modal-content  ">
                         <div class="modal-header ">
                             <h2>Edit Image <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                         </div>
                         <div class="modal-body">
                           <form action="{{route('new5')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                              @csrf
                              <fieldset>
                              <div class="form-group">
                              <label class="col-md-4 control-label">Select Image</label>
                              <div class="col-md-8">
                              <input type="file" name="data" class="form-control">
                              </div>
                              </div>
         
                              <input type="text" name="name" value="{{ $page->name }}" style="display: none;">
                             
                             
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

          {{-- End 1st Section --}}

          {{-- Slider Section --}}
          <h1 class="text-center"> Select Latest Products or Categories </h1>
          
            <form action="{{ route('new10') }}" method="POST">
               @csrf
               <div class="row bg-light my-3">
               <div class="col-lg-3 col-md-3 offset-lg-1 offset-md-1 col-sm-12 col-xs-12 my-2">
                  <div style="background-color: rgb(253, 253, 253);  box-shadow: 5px 5px 5px 5px #c0bcbc;">
                     <input type="radio" name="latest" value="prod" class="d-block mx-auto form-control blob" @if($page->latest == 'prod') checked @endif>
                        <img src="{{ asset('images/'.$prod->image1) }}" style="width: 100%; height:500px;" alt="">
                     <h3 class="text-center">Latest Products</h3>
                  </div>
               </div>
              <input type="text" name="name" value="{{ $page->name }}" style="display: none;">
              
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 my-2">
                  <div style="background-color: rgb(253, 253, 253);  box-shadow: 5px 5px 5px 5px #c0bcbc;">
                     <input type="radio" name="latest" value="cat" class="d-block mx-auto form-control blob" @if($page->latest == 'cat') checked @endif>
                        <img src="{{ asset('images/'.$cat->image) }}" style="width: 100%; height:500px;" alt="">
                        <h3 class="text-center">Latest Category</h3>
                  </div>
               </div>
              
              
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 my-2">
                  <div style="background-color: rgb(253, 253, 253);  box-shadow: 5px 5px 5px 5px #c0bcbc;">
                     <input type="radio" name="latest" value="no" class="d-block mx-auto form-control blob"  @if($page->latest == 'no') checked @endif>
                        <img src="{{ asset('images/custom/no-img.jpg') }}" style="width: 100%; height:500px;" alt="">
                        <h3 class="text-center">No Slider</h3>
                  </div>
               </div>

            </div>
            </form>

            {{-- End Slider Section --}}
         
          <h1 style="font-size:xx-large;" class="white pencil5 text-center my-2"><i><strong>@php
              echo $page->h3;
          @endphp</strong> 
                                 
            <a href="#" data-toggle="modal" data-target="#myModal9">
              <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor5"></i>
            </a>
          </i></h1>

          <div class="modal fade" id="myModal9" role="dialog">
            <div class="modal-dialog">
            
              
              <div class="modal-content  ">
                <div class="modal-header ">
                    <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               
                </div>
                <div class="modal-body">
                  <form action="{{route('new6')}}" method="post" class="form-horizontal form-bordered">
                     @csrf
                     <fieldset>
                     <div class="form-group">
                     <label class="col-md-4 control-label">Enter Text</label>
                     <div class="col-md-8">
                     <textarea name="data" class="form-control ckeditor">{{$page->h3}}</textarea>
                     </div>
                     </div>
                    
                     <input type="text" name="name" value="{{ $page->name }}" style="display: none;">
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

          {{-- End Second Heading --}}



          <div class="row bg-light">
            
              <div class="col-lg-3 col-md-3 offset-lg-3 offset-md-3 col-sm-12 col-xs-12">
               <a href="#" data-toggle="modal" data-target="#myModal12">
                  <img style="width:400px; height:500px;" @if($page->image2 == null) src="{{ asset('images/custom/dummy.jpg') }}"
                   @else src="{{ asset('images/'.$page->image2) }}" @endif alt="">
                  
                  </a>
         
                  <div class="modal fade" id="myModal12" role="dialog">
                     <div class="modal-dialog">
                       <div class="modal-content  ">
                         <div class="modal-header ">
                             <h2>Edit Image <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                         </div>
                         <div class="modal-body">
                           <form action="{{route('new9')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                              @csrf
                              <fieldset>
                              <div class="form-group">
                              <label class="col-md-4 control-label">Select Image</label>
                              <div class="col-md-8">
                              <input type="file" name="data" class="form-control">
                              </div>
                              </div>
         
                              <input type="text" name="name" value="{{ $page->name }}" style="display: none;">
                             
                             
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


            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top:10%;">
              <div style="background-color: rgb(253, 253, 253);  box-shadow: 5px 5px 5px 5px #c0bcbc;">
                 <h2 class="white pencil7 text-center my-2"><i><strong>@php
                     echo $page->h4;
                 @endphp</strong>  
                    <a href="#" data-toggle="modal" data-target="#myModal7">
                      <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor7"></i>
                    </a>
                  </i></h2>
                  <div class="modal fade" id="myModal7" role="dialog">
                    <div class="modal-dialog">
                    
                      
                      <div class="modal-content  ">
                        <div class="modal-header ">
                            <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                       
                        </div>
                        <div class="modal-body">
                          <form action="{{route('new7')}}" method="post" class="form-horizontal form-bordered">
                             @csrf
                             <fieldset>
                             <div class="form-group">
                             <label class="col-md-4 control-label">Enter Text</label>
                             <div class="col-md-8">
                             <textarea name="data" class="form-control ckeditor">{{$page->h4}}</textarea>
                             </div>
                             </div>
                            
                             <input type="text" name="name" value="{{ $page->name }}" style="display: none;">
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
                  <div class="pencil8">
                  <p class="white text-center my-2"><strong>@php
                      echo $page->p2;
                  @endphp</strong>  
                    <a href="#" data-toggle="modal" data-target="#myModal10">
                      <i style="display:none; font-size: 25px; color:#7367F0;" class="fa fa-pencil editor8"></i>
                    </a>
                  </p>
                </div>

                  <div class="modal fade" id="myModal10" role="dialog">
                    <div class="modal-dialog">
                    
                      
                      <div class="modal-content  ">
                        <div class="modal-header ">
                            <h2>Edit Content <i style="font-size: 25px; color:#7367F0;" class="fa fa-pencil"></i></h2>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                       
                        </div>
                        <div class="modal-body">
                          <form action="{{route('new8')}}" method="post" class="form-horizontal form-bordered">
                             @csrf
                             <fieldset>
                             <div class="form-group">
                             <label class="col-md-4 control-label">Enter Text</label>
                             <div class="col-md-8">
                             <textarea name="data" class="form-control ckeditor">{{$page->p2}}</textarea>
                             </div>
                             </div>
                            
                             <input type="text" name="name" value="{{ $page->name }}" style="display: none;">
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

          {{-- End 2nd Section --}}





      
       </div>
       </div>
       
       </div>
   </section>
  
   
   </div>
   </div>

<script>
    $('.pencil3').mouseenter(function()
      {
         $('.editor3').attr('style','font-size: 45px; color:#7367F0;')
      });
      $('.pencil3').mouseleave(function()
      {
         $('.editor3').attr('style','display:none; font-size: 45px; color:#7367F0;')
      });
    
    
    
    $('.pencil11').mouseenter(function()
      {
         $('.editor11').attr('style','font-size: 45px; color:#7367F0;')
      });
      $('.pencil11').mouseleave(function()
      {
         $('.editor11').attr('style','display:none; font-size: 45px; color:#7367F0;')
      });
  
  
      $('.pencil1').mouseenter(function()
      {
         $('.editor1').attr('style','font-size: 45px; color:#7367F0;')
      });
      $('.pencil1').mouseleave(function()
      {
         $('.editor1').attr('style','display:none; font-size: 45px; color:#7367F0;')
      });
      
      
      $('.pencil2').mouseenter(function()
      {
         $('.editor2').attr('style','font-size: 45px; color:#7367F0;')
      });
      $('.pencil2').mouseleave(function()
      {
         $('.editor2').attr('style','display:none; font-size: 45px; color:#7367F0;')
      });
      
      
      $('.pencil5').mouseenter(function()
      {
         $('.editor5').attr('style','font-size: 45px; color:#7367F0;')
      });
      $('.pencil5').mouseleave(function()
      {
         $('.editor5').attr('style','display:none; font-size: 45px; color:#7367F0;')
      });
      
      
      $('.pencil7').mouseenter(function()
      {
         $('.editor7').attr('style','font-size: 45px; color:#7367F0;')
      });
      $('.pencil7').mouseleave(function()
      {
         $('.editor7').attr('style','display:none; font-size: 45px; color:#7367F0;')
      });
     
     
      $('.pencil8').mouseenter(function()
      {
         $('.editor8').attr('style','font-size: 45px; color:#7367F0;')
      });
      $('.pencil8').mouseleave(function()
      {
         $('.editor8').attr('style','display:none; font-size: 45px; color:#7367F0;')
      });

      $('.blob').click(function()
      {
         this.form.submit();
      });

      $('#prev_page').attr("href","{{ route('custom_page',array('name'=>$page->name)) }}");
      $("#last_nav").attr('style','display:block;');
</script>


@endsection