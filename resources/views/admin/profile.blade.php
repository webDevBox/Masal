@extends('layout.admin')
@section('content')
 
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    <div class="content-header row">
    </div>
    
    
    
    
    <div class="row" style="margin-top: 50px;">
        <div class="col-lg-12" style="background-color: rgb(253, 253, 253);">
        <!-- General Data Block -->
        <div class="block">
        <!-- General Data Title -->
        <div class="block-title">
        <h2><i class="fa fa-pencil"></i> <strong>Edit</strong> Profile </h2>
        @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif
        @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif 
        @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif 
        @if ($errors->has('logo')) <p style="color:red;">{{ $errors->first('logo') }}</p> @endif 
        @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif 
        @if ($errors->has('confirm')) <p style="color:red;">{{ $errors->first('confirm') }}</p> @endif 

        </div>
        <!-- END General Data Title -->
        
        <!-- General Data Content -->
        <div class=" col-md-6 offset-md-3" style=" margin-top: 30px;">
            
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <button class="btn btn-primary mx-auto d-block bn1">
                     GENERAL
                  </button>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <button class="btn btn-primary d-block mx-auto bn2">
                        SECURE
                  </button>
                </div>
            </div>

            <div class="container mt-5 general" @if(Session::has('status')) style="display:none;" @else @if($errors->has('password') || $errors->has('confirm')) style="display:none;" @else style="justify-content: center;" @endif @endif>
                <h3 class="text-center"> General Details </h3>
                <form action="{{ route('adminProfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf   
                    <div class="form-group">
                        <label for=""> Your Name </label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for=""> Your Email </label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="file" name="logo" class="form-control clicker d-none">
                    </div>
                    @if(Auth::user()->logo != null)
                    <img src="{{ asset('images/'.Auth::user()->logo) }}" class="img-col mx-auto d-block image" style="width: 100px; height: 100px; cursor:pointer;" alt="">
                    @else
                    <img src="{{ asset('images/logos/abc.png') }}" class="img-col mx-auto d-block image" style="width: 100px; height: 100px; cursor:pointer;" alt="">
                    @endif
                    <br><br>
                    <center> <input type="submit" name="general" value="Submit" class="btn btn-success"> </center>
                </form>
            </div>
            
           
           
            <div class="container mt-5 secure" @if(Session::has('status') || $errors->has('password') || $errors->has('confirm')) style="justify-content: center;" @else style="justify-content: center; display:none;" @endif>
                <h3 class="text-center"> Secure Details </h3>
                <form action="{{ route('adminProfile') }}" method="POST">
                    @csrf   
                    <div class="form-group">
                        <label for=""> Your New Password </label>
                        <input type="password" name="password" placeholder="New Password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for=""> Confirm Password </label>
                        <input type="password" name="confirm" placeholder="Confirm Password" class="form-control" required>
                    </div>
                    
                    <br><br>
                    <center> <input type="submit" name="secure" value="Submit" class="btn btn-success"> </center>
                </form>
            </div>


        </div>
        <!-- END General Data Content -->
        </div>
        <!-- END General Data Block -->
        </div>
        
        </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
<script>
    $('.img-col').click(function()
    {
        $('.clicker').click();
    });
</script>
<script>
    $('.bn1').click(function()
    {
        $('.general').attr('style','justify-content: center;');
        $('.secure').attr('style','justify-content: center; display:none;');
    });
   
    $('.bn2').click(function()
    {
        $('.secure').attr('style','justify-content: center;');
        $('.general').attr('style','justify-content: center; display:none;');
    });
</script>

<script>
    function readimg(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function (e) {
    $('.image').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
    }
    }
    $(".clicker").change(function(){
    $('.image').attr('style','width: 100px; height:100px; cursor:pointer;');
    readimg(this);
    });
    </script>

@endsection