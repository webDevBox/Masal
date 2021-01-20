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
            <!-- Bar Chart - Orders -->
           
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <a href="#" data-toggle="modal" data-target="#forms" class="widget widget-hover-effect2">
            <div class="card  text-center " >
            <div class="card-body pb-50">
            <h3 style="margin-top: 20px; color:#7367f0;" >Add New <strong>Wedding</strong></h3> 
            <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > <i class="fa fa-plus" aria-hidden="true"></i> </h2>
            <!-- <div id="statistics-order-chart"></div> -->
            </div>
            </div>
        </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <a href="#">
                <div class="card  text-center " >
                <div class="card-body pb-50">
                <h3 style="margin-top: 20px; color:#7367f0;" >Total <strong>Wedding </strong> </h3> 
                <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > {{ $total }} </h2>
                </div>
                </div>
            </a>
            </div>
            </div>
            <div class="block full">
                <!-- All Orders Title -->
                <div class="block-title">
                
                <h2><strong>All</strong> Weddings</h2>
                @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                @endif
                </div>
                <!-- END All Orders Title -->
                
                <!-- All Orders Content -->
                <div class="table-responsive">
                <table id="ecom-orders" class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Total Weddings</th>
                        <th class="text-center">Added</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wedding as $row)
                    <tr>
                        @php
                            $wed=\App\retailer_bride::where('wedding',$row->id)->count();
                        @endphp
                            <td class="text-center">{{ $row->name }}</td>
                            <td class="text-center">{{ $wed }}</td>
                            <td class="text-center">{{ $row->created_at }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-xs">
                                    <a href="#" data-toggle="modal" data-target="#wed" data-toggle="tooltip" title="Edit Wedding Name" class="btn btn-primary give" id="{{ $row->name }}" data="{{ $row->id }}"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('del_wedding',array('id'=>$row->id)) }}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                </div>
                
                <div class="modal fade" id="wed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Edit Wedding Name</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('wedding_edit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Change Wedding Name</label>
                            <input type="text" name="wedding" id="image" class="form-control fetch" value="">
                        </div>
                        <input type="number" name="id" style="display: none;" class="finder" value="">
                        <center><input type="submit" name="submit" class="btn btn-primary" value="Update"></center>
                        </form>
                    
                    </div>
                    </div>
                    </div>
                    </div>
                <!-- END All Orders Content -->
                </div> 
                <div class="modal fade" id="forms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Add New Wedding</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('wedding_send') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="wedding" id="image" class="form-control" placeholder="Wedding Name">
                        </div>
                        <center><input type="submit" name="submit" class="btn btn-primary" value="Add"></center>
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
        $('.give').click(function()
        {
            var name = $(this).attr('id');
            var id = $(this).attr('data');
            $('.fetch').val(name);
            $('.finder').val(id);
        
        });
        </script>

@endsection