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
           
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <a href="#" data-toggle="modal" data-target="#exampleModal2">
            <div class="card  text-center " >
            <div class="card-body pb-50">
            <h3 style="margin-top: 20px; color:#7367f0;" >Add New <strong>Sales Tag</strong></h3> 
            <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > <i class="fa fa-plus" aria-hidden="true"></i> </h2>
            <!-- <div id="statistics-order-chart"></div> -->
            </div>
            </div>
        </a>
            </div>
        
    
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <a href="#">
                <div class="card  text-center " >
                <div class="card-body pb-50">
                <h3 style="margin-top: 20px; color:#7367f0;" >Total <strong>Tags</strong> </h3> 
                <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > {{ count($sale) }} </h2>
                </div>
                </div>
            </a>
            </div>
    
    
                <!-- All Products Title -->
                <div class="block-title">
                 
                    
                    <h2><strong>All</strong> Tags</h2>
                    @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="width: 500px;">{{ Session::get('success') }}</p>
                    @endif
                    @if(Session::has('error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" style="width: 500px;">{{ Session::get('error') }}</p>
                    @endif
                    @if ($errors->has('sale')) <p style="color:red;">{{ $errors->first('sale') }}</p> @endif
                    @if ($errors->has('color')) <p style="color:red;">{{ $errors->first('color') }}</p> @endif
                       </div>
                <!-- END All Products Title -->
                
                <!-- All Products Content -->
                <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center">Sale Name</th>
                            <th class="text-center">Background Color</th>
                            <th class="text-center">Added</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($sale) > 0)
                        @foreach($sale as $row)
                        <tr>
                            <td class="text-center">{{ $row->name }}</td>
                            <td class="text-center"> <button class="btn" style="background: {{ $row->color }}; width: 30px; height: 30px;"></button> </td>
                            <td class="text-center">{{ $row->created_at }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-xs">
                                    <a href="{{route('edit_sale', array('id' => $row->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ route('del_sale',array('id'=>$row->id)) }}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <!-- END All Products Content -->
            
           
            </div>
    
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Sale</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add_sale')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                        <label class="col-md-5 control-label"> Enter Sale Tag Name  </label>
                        <div class="col-md-7">
                        <input type="text" placeholder="Enter Tag Name" name="sale" class="form-control" required>
                        </div>
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-md-5 control-label"> Select Sale Tag Color </label>
                            <div class="col-md-7">
                            <input type="color" name="color" class="form-control" required>
                            </div>
                            </div>
                    
                        <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
                        <input type="submit" name="upload" value="Submit" class="btn btn-primary"> 
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

@endsection