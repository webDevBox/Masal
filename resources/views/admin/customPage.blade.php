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
                <section id="dashboard-ecommerce">

                    <div class="row match-height">
                        <!-- Bar Chart - Orders -->

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <a href="{{ route('add_new_Page') }}">
                                <div class="card  text-center ">
                                    <div class="card-body pb-50">
                                        <h3 style="margin-top: 20px; color:#7367f0;">Add New <strong>Page</strong></h3>
                                        <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;"> <i class="fa fa-plus"
                                                aria-hidden="true"></i> </h2>
                                        <!-- <div id="statistics-order-chart"></div> -->
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <a href="#">
                                <div class="card  text-center ">
                                    <div class="card-body pb-50">
                                        <h3 style="margin-top: 20px; color:#7367f0;">Total <strong>Page </strong> </h3>
                                        <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;"> {{ count($page) }}
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="block full">
                        <!-- All Products Title -->
                        <div class="block-title">


                            <h2><strong>All</strong> Pages</h2>
                            @if (Session::has('success'))
                                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
                                    {{ Session::get('success') }}</p>
                            @endif
                            @if (Session::has('error'))
                                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                                    {{ Session::get('error') }}</p>
                            @endif
                            @if ($errors->has('id'))
                                <p style="color:red;">{{ $errors->first('id') }}</p>
                            @endif
                            @if ($errors->has('name'))
                                <p style="color:red;">{{ $errors->first('name') }}</p>
                            @endif
                            @if ($errors->has('title'))
                                <p style="color:red;">{{ $errors->first('title') }}</p>
                            @endif
                            @if ($errors->has('key'))
                                <p style="color:red;">{{ $errors->first('key') }}</p>
                            @endif

                        </div>
                        <!-- END All Products Title -->

                        <!-- All Products Content -->
                        <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Keywords</th>
                                    <th class="text-center btn_update" style="display: none;">Update</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($page) > 0)
                                    @foreach ($page as $row)
                                    <form action="{{ route('info_update') }}" method="post">
                                        @csrf
                                        <input type="text" name="id" value="{{ $row->id }}" style="display: none;">
                                        <tr>
                                            <td class="text-center"> <p class="para_name" style="cursor: pointer;"> {{ $row->name }} </p> 
                                            <input type="text" name="name" style="display: none;" class="input_name form-control" value="{{ $row->name }}" required>
                                            </td>


                                            <td class="text-center" style="cursor: pointer;"> <p class="para_title" style="cursor: pointer;"> {{ $row->title }}</p>
                                                <input type="text" name="title" style="display: none;" class="input_title form-control" value="{{ $row->title }}" required>
                                            </td>


                                            <td class="text-center" style="cursor: pointer;"> <p class="para_key" style="cursor: pointer;"> {{ $row->keyword }} </p>
                                                <input type="text" name="key" style="display: none;" class="input_key form-control" value="{{ $row->keyword }}" required>
                                            </td>




                                            <td class="text-center btn_update" style="display: none;"> 
                                                <button type="submit" class="btn btn-primary"> Update </button> </td>

                                            <td class="text-center">
                                                <div class="btn-group btn-group-xs">
                                                    <a href="{{ route('newPage', ['new' => $row->name]) }}" title="Edit"
                                                        class="btn btn-xs btn-primary"><i class="fa fa-check-circle-o"
                                                            aria-hidden="true"></i></a>

                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-xs">
                                                    <a href="{{ route('del_page', ['name' => $row->name]) }}" title="Delete"
                                                        class="btn btn-xs btn-danger"><i class="fa fa-times"
                                                            aria-hidden="true"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                    @endforeach
                                @else
                                    <p>No Page Created</p>
                                @endif
                            </tbody>
                        </table>
                        <!-- END All Products Content -->
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>

<script>
    $('.para_name').click(function(){
       $('.btn_update').attr('style','display:block;')
       $('.input_name').attr('style','display:block;')
    });
   
   
    $('.para_title').click(function(){
       $('.btn_update').attr('style','display:block;')
       $('.input_title').attr('style','display:block;')
    });
   
    $('.para_key').click(function(){
       $('.btn_update').attr('style','display:block;')
       $('.input_key').attr('style','display:block;')
    });
</script>

@endsection
