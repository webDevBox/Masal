@extends('layout.admin')

@section('content')


<!-- END Quick Stats -->
<div class="row">
<div class="col-md-offset-3 col-lg-offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="block">

<!-- eShop Overview Title -->

<div class="block-title">



<h2><strong>Add New</strong> Product</h2>

@if(Session::has('success'))

<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>

@endif

@if(Session::has('error'))

<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>

@endif

@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif

@if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif

</div>

<!-- END eShop Overview Title -->




<form action="{{route('add_product')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

    @csrf

    <div class="form-group">

    <label class="col-md-3 control-label" for="product_name">Name</label>

    <div class="col-md-9">

    <input type="text" id="product_name"  value="{{ old('product_name') }}" name="product_name" class="form-control" placeholder="Enter product name.." required>

    @if ($errors->has('product_name')) <p style="color:red;">{{ $errors->first('product_name') }}</p> @endif 

    </div>

    </div>

    

    <div class="form-group">

    <label class="col-md-3 control-label" for="product_name">Keywords</label>

    <div class="col-md-9">

    <input type="text" id="product_name"  value="{{ old('key') }}" name="key" class="form-control" placeholder="Enter product Keyword with , Separation.." required>

    @if ($errors->has('key')) <p style="color:red;">{{ $errors->first('key') }}</p> @endif 

    </div>

    </div>



    <div class="form-group">

    <label class="col-md-3 control-label" for="product_description">Description</label>

    <div class="col-md-9">

    <textarea id="product_description"  placeholder="Enter Product Description" name="product_description" class="form-control ckeditor" required>{{ old('product_description') }}</textarea>

    @if ($errors->has('product_description')) <p style="color:red;">{{ $errors->first('product_description') }}</p> @endif 

    </div>

    </div>



    

    

    <div class="form-group">

        <label class="col-md-3 control-label" for="product_description">Select Product Category</label>

        <div class="col-md-9">

            <select class="form-control" name="category" required>

                <option selected disabled >Select Any Category</option>

    

                @if(count($category) > 0)

                @foreach ($category as $row)

            <option value="{{$row->id}}" >{{$row->name}}</option>

                @endforeach

                @else

                <option disabled >No Category Available</option>

                @endif

    

            </select>

        @if ($errors->has('product_description')) <p style="color:red;">{{ $errors->first('product_description') }}</p> @endif 

        

        </div>

        </div>

    

    <div class="form-group">

        <label class="col-md-3 control-label" for="product_description">Available Colour Swatches</label>

        <div class="col-md-9">

            <select class="form-control" name="colour" required>

                <option selected disabled >Select Any Color Swatch</option>

    

                @if(count($category) > 0)

                @foreach ($swatches as $row)

            <option value="{{$row->colour}}" >{{$row->name}}</option>

                @endforeach

                @else

                <option disabled >No Color Swatch Available</option>

                @endif

    

            </select>

        @if ($errors->has('colour')) <p style="color:red;">{{ $errors->first('colour') }}</p> @endif 

        

        </div>

        </div>





        <div class="form-group">

            <label class="col-md-3 control-label" for="product_description">Available Sale Tags</label>

            <div class="col-md-9">

                <select class="form-control" name="tag">

                    <option selected disabled >Select Any Tag</option>

                    @if(count($sale) > 0)

                    @foreach ($sale as $row)

                <option value="{{$row->name}}" >{{$row->name}}</option>

                    @endforeach

                    @else

                    <option disabled >No Tag Available</option>

                    @endif

        

                </select>

            @if ($errors->has('tag')) <p style="color:red;">{{ $errors->first('tag') }}</p> @endif 

            

            </div>

            </div>

    

    

    

    

    

    <div class="form-group">

    <label class="col-md-3 control-label" for="product-short-description">Available Sizes</label>

    <div class="col-md-9">

    @foreach ($size as $item)

    <label for="vehicle1">

    <input type="checkbox" id="vehicle1" name="size[]" value="{{$item->size}}">

     {{$item->size}}</label>

     <span style="visibility: hidden;">lo</span>

    @endforeach

    </div>

    </div>

    

    

    

    

    <div class="form-group">

    <label class="col-md-3 control-label" for="product-price">Wholesale Price</label>

    <div class="col-md-9">

    <div class="input-group">

    <div class="input-group-addon"><i class="fa fa-usd"></i></div>

    <input type="text" id="product-price" value="{{ old('wholesale_price') }}" name="wholesale_price" class="form-control" placeholder="0.00" required>

    @if ($errors->has('wholesale_price')) <p style="color:red;">{{ $errors->first('wholesale_price') }}</p> @endif 

    

    </div>

    </div>

    </div>

    

    <div class="form-group">

    <label class="col-md-3 control-label" for="product-price">Retail Price</label>

    <div class="col-md-9">

    <div class="input-group">

    <div class="input-group-addon"><i class="fa fa-usd"></i></div>

    <input type="text" id="product-price" value="{{ old('retail_price') }}" name="retail_price" class="form-control" placeholder="0.00" required>

    @if ($errors->has('retail_price')) <p style="color:red;">{{ $errors->first('retail_price') }}</p> @endif 

    

    </div>

    </div>

    </div>



    <div class="form-group">

    <label class="col-md-3 control-label" for="product-price">Style Number</label>

    <div class="col-md-9">

    <input type="text" id="product-price" value="{{ old('style') }}" name="style" class="form-control" placeholder="Enter Style Number" required>

    @if ($errors->has('style')) <p style="color:red;">{{ $errors->first('style') }}</p> @endif 

    

    </div>

    </div>



    <div class="form-group">

        <label class="col-md-3 control-label" for="product-price">Stock</label>

        <div class="col-md-9">

        <input type="number" min="0" id="product-price" value="0" value="{{ old('stock') }}"  name="stock" class="form-control" required>

        @if ($errors->has('stock')) <p style="color:red;">{{ $errors->first('stock') }}</p> @endif 

        

        </div>

        </div>





    <div class="form-group">

    <label class="col-md-3 control-label">Status</label>

    <div class="col-md-9">

    <label class="radio-inline" for="product_condition-new">

    <input type="radio" id="product_condition-new" name="product_condition" value="active"> Active

    </label>

    <label class="radio-inline" for="product_condition-used">

    <input type="radio" id="product_condition-used" name="product_condition" value="inactive"> In-Active

    </label>

    </div>

    @if ($errors->has('product_condition')) <p style="color:red;">{{ $errors->first('product_condition') }}</p> @endif 

    

    </div>



    <div class="form-group">

        <label class="col-md-3 control-label" for="product-short-description">Additional Changes</label>

        <div class="col-md-9">

        @foreach ($addition as $item)

        <label for="vehicle1">

        <input type="checkbox" id="vehicle1" name="addition[]" value="{{$item->additional}}">

         {{$item->additional}}</label>

         <span style="visibility: hidden;">lo</span>

        @endforeach

        </div>

        </div>

    

    

    <div class="form-group">

    <label class="col-md-3 control-label" for="product-price">First Image</label>

    <div class="col-md-9">

    <input type="file" id="product-price" name="first" class="btn btn-success" required>

    @if ($errors->has('first')) <p style="color:red;">{{ $errors->first('first') }}</p> @endif 

    

    </div>

    </div>

    <div class="form-group">

    <label class="col-md-3 control-label" for="product-price">Second Image</label>

    <div class="col-md-9">

    <input type="file" id="product-price" name="second" class="btn btn-success">

    @if ($errors->has('second')) <p style="color:red;">{{ $errors->first('second') }}</p> @endif 

    </div>

    </div>



    <div class="form-group">

    <label class="col-md-3 control-label" for="product-price">Third Image</label>

    <div class="col-md-9">

    <input type="file" id="product-price" name="third" class="btn btn-success">

    @if ($errors->has('third')) <p style="color:red;">{{ $errors->first('third') }}</p> @endif 

    </div>

    </div>





    <div class="form-group">

        <label class="col-md-3 control-label" for="product-price">Forth Image</label>

        <div class="col-md-9">

        <input type="file" id="product-price" name="forth" class="btn btn-success">

        @if ($errors->has('forth')) <p style="color:red;">{{ $errors->first('forth') }}</p> @endif 

        </div>

        </div>





        <div class="form-group">

            <label class="col-md-3 control-label" for="product-price">Fifth Image</label>

            <div class="col-md-9">

            <input type="file" id="product-price" name="fifth" class="btn btn-success">

            @if ($errors->has('fifth')) <p style="color:red;">{{ $errors->first('fifth') }}</p> @endif 

            </div>

            </div>





            <div class="form-group">

                <label class="col-md-3 control-label" for="product-price">Sixth Image</label>

                <div class="col-md-9">

                <input type="file" id="product-price" name="sixth" class="btn btn-success">

                @if ($errors->has('sixth')) <p style="color:red;">{{ $errors->first('sixth') }}</p> @endif 

                </div>

                </div>





    

    <div class="form-group form-actions">

    <div class="col-md-9 col-md-offset-4">

        <button type="submit" name="send" value="send" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>

        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>

    </div>

    </div>

    </form>

</div>

</div>
</div>

<!-- END eShop Overview Block -->





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

<form action="{{route('adminEmail')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">

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

</fieldset>

<form action="{{route('adminPassword')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">

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

<script src="js/pages/ecomDashboard.js"></script>

<script>$(function(){ EcomDashboard.init(); });</script>


<script>

$('#top_type').change(function()

{

    var type=$(this).val();

    if(type == 'retailer')

    {

    $('#top_search').attr('placeholder','Registration Number');

    }



    if(type == 'product')

    {

    $('#top_search').attr('placeholder','Product style#');

    }



    if(type == 'category')

    {

    $('#top_search').attr('placeholder','Category Name');

    }





});

$('.product').attr('class','active');

</script>



@endsection