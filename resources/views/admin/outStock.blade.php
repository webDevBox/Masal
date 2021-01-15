@extends('layout.admin')

@section('content')


<!-- All Products Block -->

<div class="block full">

    <!-- All Products Title -->

    <div class="block-title">




        <div class="row">
            <div style="margin-right: 100px;" class="col-sm-12 col-md-3 col-xs-12 col-lg-3" style="margin-top: 20px;">
                <h2> <strong>Out of Stock</strong> Products </h2>
            </div>
        </div>

        @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
        <h2 style="display: inline;"><strong>All</strong> Products</h2>

        @endif

        @if(Session::has('error'))

        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>

        @endif

        @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif

        @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif

        </div>

    <!-- END All Products Title -->



    <!-- All Products Content -->

    <table id="ecom-products" class="table table-bordered table-striped table-vcenter">

        <thead>

            <tr>

                <th class="text-center" style="width: 70px;">ID</th>

                <th class="text-center">Product Name</th>

                <th class="text-center">Style Number</th>

                <th class="text-center">WholeSale Price</th>

                <th class="text-center">Retailer Price</th>

                <th class="text-center">Stock</th>

                <th class="text-center">Status</th>

                <th class="text-center">Tag</th>

                <th class="text-center">Added</th>

                <th class="text-center">Action</th>

            </tr>

        </thead>

        <tbody>



            @if(count($outer) > 0)

            @foreach($outer as $row)

            <tr>

                <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> PID.{{$row->id}} </a> </td>

                <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> {{$row->name}} </a> </td>

                <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;">{{$row->styleNumber}} </a></td>

                <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> ${{$row->wholesalePrice}} </a> </td>

                <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> ${{$row->retailerPrice}} </a> </td>

                <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> {{$row->stock}} </a> </td>

                <td class="text-center">

                    <span class="label label-success"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> {{$row->status}} </a> </span>

                </td>





                <td class="text-center">

                    @php

                    $tag=\App\sale::where('name',$row->tag)->first();

                    if(!isset($tag))

                    {

                    $row->tag=null;

                    }

                    @endphp
                    <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;">
                        <span @if($row->tag != null) style="background: {{ $tag->color }}" @endif>

                            @if($row->tag == null) No Tag @else {{$row->tag}} @endif</span>
                    </a>
                </td>





                <td class="text-center">{{$row->created_at}}</td>

                <td class="text-center">

                    <div class="btn-group btn-group-xs">

                        <a href="{{route('edit_product', array('id' => $row->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>

                        <a href="{{route('delete', array('id' => $row->id))}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>

                    </div>

                </td>

            </tr>

            @endforeach

            @else

            <p>No Product stored</p>

            @endif

        </tbody>

    </table>

    <!-- END All Products Content -->

</div>

<!-- END All Products Block -->

</div>


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

<script src="js/pages/ecomProducts.js"></script>

<script>
    $(function() {
        EcomProducts.init();
    });
</script>



<script>
    var value = $('#no_metter').val();

    $('#top_seller').text(value);
</script>



<script>
    $('#top_type').change(function()

        {

            var type = $(this).val();

            if (type == 'retailer')

            {

                $('#top_search').attr('placeholder', 'Registration Number');

            }



            if (type == 'product')

            {

                $('#top_search').attr('placeholder', 'Product style#');

            }



            if (type == 'category')

            {

                $('#top_search').attr('placeholder', 'Category Name');

            }





        });

    $('.product').attr('class', 'active');
</script>
<script>
    $('#category').change(function() {
        this.form.submit();

    });
</script>
<script>
    $('#color').change(function() {
        this.form.submit();

    });
</script>
<script>
    $('#style').change(function() {
        this.form.submit();

    });
</script>
<script>
    $('#size').change(function() {
        this.form.submit();

    });
</script>
<script>
    $('#all').change(function() {
        this.form.submit();

    });
</script>
@endsection