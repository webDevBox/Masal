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
           
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <a href="#" data-toggle="modal" data-target="#exampleModal2">
            <div class="card  text-center " >
            <div class="card-body pb-50">
            <h3 style="margin-top: 20px; color:#7367f0;" >Add New <strong>Template</strong></h3> 
            <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > <i class="fa fa-plus" aria-hidden="true"></i> </h2>
            <!-- <div id="statistics-order-chart"></div> -->
            </div>
            </div>
        </a>
            </div>
        
    
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <a href="{{ route('retailer_mail') }}">
                <div class="card  text-center " >
                <div class="card-body pb-50">
                <h3 style="margin-top: 20px; color:#7367f0;" >Retailer <strong>Email</strong> </h3> 
                <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > {{ $user }} </h2>
                </div>
                </div>
            </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <a href="#">
                <div class="card  text-center " >
                <div class="card-body pb-50">
                <h3 style="margin-top: 20px; color:#7367f0;" >Total <strong>Template</strong> </h3> 
                <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367f0;" > {{ count($templates) }} </h2>
                </div>
                </div>
            </a>
            </div>
    
    
            <div class="block-title">
    
                <h2><strong>Email</strong> Templates </h2>
                @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                @endif
                @if ($errors->has('temp_name')) <p style="color:red;">{{ $errors->first('temp_name') }}</p> @endif 
                @if ($errors->has('subject')) <p style="color:red;">{{ $errors->first('subject') }}</p> @endif 
                @if ($errors->has('message')) <p style="color:red;">{{ $errors->first('message') }}</p> @endif 
                @if ($errors->has('status')) <p style="color:red;">{{ $errors->first('status') }}</p> @endif 
                </div>
            <div class="table-responsive table-responsive-lg table-responsive-md table-responsive-sm table-responsive-xs">
                <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Subject</th>
                <th class="text-center">Message</th>
                <th class="text-center">Status</th>
                <th class="text-center">Added</th>
                <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($templates) > 0)
                    @foreach ($templates as $row)
                    <tr>
                    <td class="text-center">{{$row->name}}</td>
                    <td class="text-center">{{$row->subject}}</td>
                    <td class="text-center"> @php
                        echo $row->message;
                    @endphp </td>
                    <td class="text-center">@if($row->status == 1) Active @else In Active @endif</td>
                    <td class="text-center">{{$row->created_at}}</td>
                    <td class="text-center">
                    <div class="btn-group btn-group-xs">
                    <a href="{{route('template_edit',array('id' => $row->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    @if($row->status == 1)
                    <a href="{{route('template_stat',array('id' => $row->id, 'value'=>2))}}" data-toggle="tooltip" title="In Active" class="btn btn-danger"><i class="fa fa-times"></i></a>
                    @else
                    <a href="{{route('template_stat',array('id' => $row->id, 'value'=>1))}}" data-toggle="tooltip" title="Active" class="btn btn-success"><i class="fa fa-check"></i></a>
                     
                    @endif
                    </div>
                    </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                </table>
                </div>
            
           
            </div>
    
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add_template')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label class="col-md-12 control-label" for="product_name">Name of Template</label>
                        <div class="col-md-9">
                        <input type="text" id="product_name"  value="{{ old('temp_name') }}" name="temp_name" class="form-control" placeholder="Enter Template Name" required>
                        
                        </div>
                        </div>
        
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="product_name">Subject of Template</label>
                            <div class="col-md-9">
                            <input type="text" id="product_name"  value="{{ old('subject') }}" name="subject" class="form-control" placeholder="Enter Template Subject" required>
                          
                            </div>
                            </div>
        
        
                        <div class="form-group">
                        <label class="col-md-12 control-label" for="product_description">Message of Template</label>
                        <div class="col-md-9">
                        <textarea id="product_description" rows="5" placeholder="Enter Template Message" name="message" class="form-control ckeditor" required>{{ old('message') }}</textarea>
                       
                        </div>
                        </div>
                        
                        
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="product_description">Status of Template</label>
                                <div class="col-md-9">
                            <select class="form-control" name="status">
                                <option selected disabled> Select Status of Template </option>
                                <option value="1"> Active </option>
                                <option value="2"> In Active </option>
                            </select>
                                </div>
                                </div>
            
                        <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" name="send" value="send" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                        </div>
                        </div>
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