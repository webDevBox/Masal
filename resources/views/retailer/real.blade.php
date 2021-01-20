@extends('layout.retailer')
@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
    
            <div class="row match-height">
                <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
                    <a href="#" data-toggle="modal" data-target="#forms" class="widget widget-hover-effect2">
                        <div class="card  text-center " >
                            <div class="card-body pb-50">
                        <h3 class="widget-content-light" style="margin-top: 20px; color:#7367f0;">Add New <strong>Bride </strong></h3>
                    </div>
                    <div class="widget-extra-full"><span class="h2 text-primary animation-expandOpen"><i class="fa fa-plus"></i></span></div>
                    </a>
                    </div>
                </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <a href="{{ route('retailer_wedding') }}">
                <div class="card  text-center " >
                <div class="card-body pb-50">
                <h3 style="margin-top: 20px; color:#7367f0;" >Manage <strong>Wedding </strong> </h3> 
                <h2 class="font-weight-bolder mb-1 text-primary" style="margin-top: 30px; " > {{ $wedding }} </h2>
                </div>
                </div>
            </a>
            </div>
    
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <a href="#">
                <div class="card  text-center " >
                <div class="card-body pb-50">
                <h3 style="margin-top: 20px; color:#7367f0;" >Total <strong>Brides </strong> </h3> 
                <h2 class="font-weight-bolder mb-1 text-primary" style="margin-top: 30px;" > {{ $total }} </h2>
                </div>
                </div>
            </a>
            </div>
            
            
            
           
            </div>
    
    
            <div class="block full">
                <!-- All Orders Title -->
                <div class="block-title">
                
                <h2><strong>All</strong> Brides</h2>
                @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                @endif
                @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
                @if ($errors->has('image')) <p style="color:red;">{{ $errors->first('image') }}</p> @endif
                @if ($errors->has('video')) <p style="color:red;">{{ $errors->first('video') }}</p> @endif
                @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
                @if ($errors->has('wedding')) <p style="color:red;">{{ $errors->first('wedding') }}</p> @endif
                </div>
                <!-- END All Orders Title -->
                
                <!-- All Orders Content -->
                <div class="table-responsive">
                <table id="ecom-orders" class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center">File</th>
                    <th class="text-center">Wedding</th>
                    <th class="text-center">Added</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($file as $row)
                @php
                    $wedding=\App\wedding::find($row->wedding);
                @endphp
                <tr>
                    <td class="text-center">
                        @if($row->type == 'image')
                            <img src="{{ asset('images/'.$row->file) }}" style="width: 80px; height:120px;" alt="">
                        @endif
                        @if($row->type == 'video')
                            <video style="width: 180px; height: 120px;" src="{{ asset('images/'.$row->file) }}" type="video/mp4" controls muted>
                        @endif
                        @if($row->type == 'link')
                        <iframe width="180" height="120" src="{{ $row->file }}" frameborder="0" allowfullscreen>
                        </iframe>
                        @endif
                    </td>
                        <td class="text-center">{{ $wedding->name }}</td>    
                        <td class="text-center">{{ $row->created_at }}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                            <a href="{{ route('del_real_data',array('id'=>$row->id)) }}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                </div>
                <!-- END All Orders Content -->
                </div> 

                <div class="modal fade" id="forms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Add New Bride</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('bride_send') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" accept="image/*" name="image" id="image" style="display: none;">
                        <div id="img_clicker" style="border: 2px dashed black;  border-radius: 12px; height:100px; cursor:pointer;">
                                <h3 class="text-center mt-3">Click Here to Upload Image</h3>
                        </div>
                        <img src="" id="blah" style="">
                    
                    </div>
                    
                    <div class="form-group">
                    <select name="wedding" id="" class="form-control" required>
                        <option selected disabled> Select Wedding </option>
                        @foreach ($wed as $item)
                            <option value="{{ $item->id }}"> {{ $item->name }} </option>
                        @endforeach
                    </select>
                    </div>
                    
                    <center><input type="submit" name="submit_img" class="btn btn-primary" value="Upload"></center>
                    </form>
                    <hr>
                    <form action="{{ route('bride_send') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="video" id="vid" style="display: none;">
                        <div id="video_clicker" style="border: 2px dashed black;  border-radius: 12px; height:100px; cursor:pointer;">
                                <h3 class="text-center mt-3">Click Here to Upload Video</h3>
                        </div>
                        <video style="" src="" id="blash" type="video/mp4" autoplay muted>
                    </div>
                    <hr>
                    <h3>You can share link of video as well</h3>
                    <hr>
                    <div class="form-group">
                        <input type="text" name="link" class="form-control" placeholder="Type your video link">
                    </div>
                    <div class="form-group">
                        <select name="wedding" id="" class="form-control" required>
                            <option selected disabled> Select Wedding </option>
                            @foreach ($wed as $item)
                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                            @endforeach
                        </select>
                        </div>
                    <center><input type="submit" name="submit_vid" class="btn btn-primary" value="Upload"></center>
                    </form>
                    </div>
            </div>
            </div>
        </div>

    </section>
    <!-- Dashboard Ecommerce ends -->
    </div>
    </div>
    </div>

    <script>
        $('#img_clicker').click(function()
        {
        $('#image').trigger('click');
        });
        
        $('#video_clicker').click(function()
        {
        $('#vid').trigger('click');
        });
        </script>
        
        <script>
        function readimg(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
        }
        }
        
        $('#blah').attr('style','display:none;')
        
        $("#image").change(function(){
        $('#blah').attr('style','width: 100px; height:100px;')
        readimg(this);
        });
        </script>
        
        <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
        $('#blash').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
        }
        }
        
        $('#blash').attr('style','display:none;')
        
        $("#vid").change(function(){
        $('#blash').attr('style','width: 100px; height:100px;')
        readURL(this);
        });
        </script>


@endsection