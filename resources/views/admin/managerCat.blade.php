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
        @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="width: 500px;">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" style="width: 500px;">{{ Session::get('error') }}</p>
        @endif
        @if ($errors->has('category'))
        <p style="color:red;">{{ $errors->first('category') }}</p>
        @endif
        @if ($errors->has('first'))
        <p style="color:red;">{{ $errors->first('first') }}</p>
        @endif
            <div class="row match-height">
            <!-- Bar Chart - Orders -->
           
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <a href="#" data-toggle="modal" data-target="#exampleModal2">
            <div class="card  text-center " >
            <div class="card-body pb-50">
            <h3 style="margin-top: 20px; color:#7367f0;" >Add New <strong>Category</strong></h3> 
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
                <h3 style="margin-top: 20px; color:#7367f0;" >Total <strong>Category</strong> </h3> 
                <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > {{ count($category) }} </h2>
                </div>
                </div>
            </a>
            </div>
            </div>
    <div class="row match-height" >
    <!-- Company Table Card -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <!-- END All Products Title -->
            
            <!-- All Products Content -->
            <div class="table-responsive">
            <table id="ecom-products"  class="table table-bordered table-striped table-vcenter">
                <thead >
                    <tr >
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Category Image</th>
                        <th class="text-center">Added</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($category) > 0)
                    @foreach($category as $row)
                    <tr>
                        <td class="text-center">{{$row->name}}</td>
                        <td class="text-center">
                            <img alt="" class="category_image" style="width: 100px; height: 100px;" src="{{ asset('images/'.$row->image) }}">
                        </td>
                      
                        <td class="text-center">{{$row->created_at}}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="{{route('editCat',array('id' => $row->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                <a href="{{route('deleteCat', array('id' => $row->id))}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <p>No Product stored</p>
                    @endif
                </tbody>
            </table>
            </div>
            <!-- END All Products Content -->
           
    </div>
    
    </div>
    

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Category</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <form action="{{route('category')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
   
    <div class="form-group col-md-12">
    <label class="col-md-12 control-label"> Enter New Category <span style="color: red"> * </span></label>
    <div class="col-md-12">
    <input type="text" placeholder="Enter Category" name="category" class="form-control" required>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
        <label class="col-md-12 control-label">Category Image <span style="color: red"> * </span></label>
        <div class="col-md-12">
        <input type="file" name="first" class="form-control-file btn btn-primary" required>
        </div>
        </div>
    </div>
    <div class="modal-footer">
    <input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
    <input type="submit" name="sendCategory" value="Submit" class="btn btn-primary"> 
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