@extends('layout.retailer')
@section('content')
<!-- Quick Stats -->
<div class="row text-center">


<div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
<a href="#" data-toggle="modal" data-target="#forms" class="widget widget-hover-effect2">
<div class="widget-extra themed-background-success">
    <h4 class="widget-content-light"><strong>Add New</strong> Bride</h4>
</div>
<div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
</a>
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
            <h3>Click Here to Upload Image</h3>
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
            <h3>Click Here to Upload Video</h3>
    </div>
    <video style="" src="" id="blash" type="video/mp4" autoplay>
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
<div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
<a href="{{ route('retailer_wedding') }}" class="widget widget-hover-effect2">
<div class="widget-extra themed-background-dark">
    <h4 class="widget-content-light"><strong>Manage</strong> Weddings </h4>
</div>
<div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ $wedding }}</span></div>
</a>
</div>
<div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
<a href="javascript:void(0)" class="widget widget-hover-effect2">
<div class="widget-extra themed-background-dark">
    <h4 class="widget-content-light"><strong>Total</strong> Brides </h4>
</div>
<div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ $total }}</span></div>
</a>
</div>

</div>
<!-- All Orders Block -->
<div class="block full">
<!-- All Orders Title -->
<div class="block-title">

<h2><strong>All</strong> Orders</h2>
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
            <video style="width: 180px; height: 120px;" src="{{ asset('images/'.$row->file) }}" type="video/mp4" controls>
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
<!-- END All Orders Block -->
</div>
<!-- END Page Content -->

<!-- Footer -->

<!-- END Footer -->
</div>
<!-- END Main Container -->
</div>
<!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<!-- Modal Header -->
<div class="modal-header text-center">
<h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
</div>
<!-- END Modal Header -->

<!-- Modal Body -->
<div class="modal-body">
<form action="{{route('account')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
@csrf
<fieldset>
<legend>Email Update</legend>
<div class="form-group">
<label class="col-md-4 control-label">Username</label>
<div class="col-md-8">
<p class="form-control-static"> {{Auth::user()->email}}</p>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="user-settings-email">Email</label>
<div class="col-md-8">
<input type="email" id="user-settings-email" name="email" class="form-control" value="{{Auth::user()->email}}">
</div>
</div>
<div class="form-group" style="display: none">
<div class="col-md-8">
<input type="number" id="user-settings-repassword" name="id" class="form-control" value="{{Auth::user()->id}}">
</div>
</div>
<center>
<button type="submit" name="update" value="update" class="btn btn-sm btn-primary">Update Email</button>
</center>
</form>
{{-- <div class="form-group">
<label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>
<div class="col-md-8">
<label class="switch switch-primary">
<input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>
<span></span>
</label>
</div>
</div> --}}
</fieldset>
<form action="{{route('passwordUpdate')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
@csrf
<fieldset>
<legend>Password Update</legend>
<div class="form-group">
<label class="col-md-4 control-label" for="user-settings-password">New Password</label>
<div class="col-md-8">
<input type="password" id="user-settings-password" name="password" class="form-control" placeholder="Please choose a complex one..">
@if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
<div class="col-md-8">
<input type="password" id="user-settings-repassword" name="repassword" class="form-control" placeholder="..and confirm it!">
</div>
</div>
<div class="form-group" style="display: none">
<div class="col-md-8">
<input type="number" id="user-settings-repassword" name="id" class="form-control" value="{{Auth::user()->id}}">
</div>
</div>
</fieldset>
<div class="form-group form-actions">
<div class="col-xs-12 text-right">
<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
<button type="submit" name="update" value="update" class="btn btn-sm btn-primary">Update Password</button>
</div>
</div>
</form>
</div>
<!-- END Modal Body -->
</div>
</div>
</div>
<!-- END User Settings -->

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="js/vendor/jquery.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/ecomOrders.js"></script>
<script>$(function(){ EcomOrders.init(); });</script>
<script>
$('.real').attr('class','active');
</script>

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