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
                            @if ($errors->has('page'))
                                <p style="color:red;">{{ $errors->first('page') }}</p>
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
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($page) > 0)
                                    @foreach ($page as $row)
                                        <tr>
                                            <td class="text-center"> {{ $row->name }} </td>
                                            <td class="text-center"> {{ $row->title }} </td>
                                            <td class="text-center"> {{ $row->keyword }} </td>

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

@endsection
