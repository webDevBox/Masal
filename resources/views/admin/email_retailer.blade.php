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
    
        <div class="block full ">
            <!-- All Products Title -->
            <div class="block-title">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-5 col-xs-5">
                    <h2><strong>Retailer</strong> List </h2>
                    @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                    @endif
                    @if(Session::has('error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                    @endif
                </div>
                <div class="">
                    <a href="#mailall" data-toggle="modal" class="btn btn-primary" style="">Send email to all Retailer </a>
            
                    <div id="mailall" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                    
                            <div class="modal-header text-center">
                                <h2 class="modal-title"><i class="fa fa-envelope-open"></i> Email Templates</h2>
                                </div>
                                <form action="{{ route('mail_all') }}" method="post">
                                    @csrf
                                        <input type="number" name="id" value="" class="former" style="display: none;">
                                <div class="row" style="margin: 3px;">
                                    @foreach ($template as $item)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                        <center> <div class="btn-group btn-group-xs">
                                            <a href="{{route('edit_templete', array('id' => $item->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                <a href="{{route('delete_templete', array('id' => $item->id))}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                            </div>
                                        </center>
                                            <div class="selector" id="{{ $item->id }}" style=" height:300px; overflow:auto; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; cursor: pointer;">
                                                <h5 class="text-center">{{ $item->subject }}</h5>
                                                <p style="text-align:justify; padding:8px;">@php
                                                    echo $item->message;
                                                @endphp</p>
                                            </div>
                                    </div>
                                    @endforeach
                                    
                               
                                </div>
                               <center> <input type="submit" name="mail" value="Send" class="btn btn-primary" style="margin-top: 10px;"> </center>
                            </form>
                            <hr>
                        <!-- Modal Header -->
                        <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Write Email</h2>
                        </div>
                        <!-- END Modal Header -->
                        
                        <!-- Modal Body -->
                        <div class="modal-body">
                        <form action="{{route('all_retailer_mail')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        @csrf
                        <fieldset>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-email">Status</label>
                            <div class="col-md-8">
                                <input type="checkbox" name="status"> Check if you want to save Template
                                </div>
                        </div>
                        <br>
                    
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-email">Subject</label>
                        <div class="col-md-8">
                        <input type="text" name="subject" class="form-control" placeholder="Enter Email subject">
                        </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-email">Body</label>
                            <div class="col-md-8">
                                <textarea name="body" class="form-control ckeditor" rows="5" placeholder="Enter Body of your Email"></textarea>
                                </div>
                        </div>
                    
                       
                       
                        <center>
                        <button type="submit" name="sender" style="margin-top: 5px;" value="send" class="btn btn-sm btn-primary">Send Email</button>
                        </center>
                        </form>
                       
                       
                        </div>
                        </div>
                        </div>
                        </div>              
            
            
            
                </div>
            </div>
           
            
            </div>
            <!-- END All Products Title -->
            
            <!-- All Products Content -->
            <div class="table-responsive">
            <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
            <thead>
            <tr>
            <th class="text-center">Retailer Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Registration #</th>
            <th class="text-center">Country</th>
            <th class="text-center">Status</th>
            <th class="text-center">Added</th>
            <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
                @if(count($stokist) > 0)
                @foreach ($stokist as $row)
                    
               
            <tr>
            <td class="text-center">{{$row->name}}</td>
            <td class="text-center"><strong>{{$row->email}}</strong></td>
            <td class="text-center"><strong>{{$row->registrationNumber}}</strong></td>
            <td class="text-center"><strong>{{$row->country}}</strong></td>
            <td class="text-center">
            <span class="label label-success">
                @if($row->status == 1)
            Active
            @endif
            @if($row->status == 2)
            Rejected
            @endif
            @if($row->status == 3)
            In Active
            @endif
            </span>
            </td>
            <td class="hidden-xs text-center">{{$row->created_at}}</td>
            <td class="text-center">
            <div class="btn-group btn-group-xs">
            {{-- <a href="{{route('send_email',array('id' => $row->id))}}" data-toggle="tooltip" title="Send Email" class="btn btn-default"><i class="fa fa-envelope"></i></a> --}}
            <a href="#mailpop" data-toggle="modal" title="Send Email From Templates" id="{{ $row->id }}" class="btn btn-default clicker"><i class="fa fa-envelope"></i></a>
            <a href="#mailnew" data-toggle="modal" title="Send Email" id="{{ $row->id }}" class="btn btn-default clicker"><i class="fa fa-envelope-o">+</i></a>
            </div>
            </td>
            <div id="mailpop" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
            
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-envelope-open"></i> Email Templates</h2>
                        </div>
                        <form action="{{ route('specific') }}" method="post">
                            @csrf
                                <input type="number" name="id" value="" class="former" style="display: none;">
                                <input type="text" name="user" class="user_sent" value="" style="display: none;">
                        <div class="row" style="margin: 3px;">
                            @foreach ($template as $item)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 container" style="margin-top: 10px; margin-bottom: 20px;">
                               <center> <div class="btn-group btn-group-xs">
                                    <a href="{{route('edit_templete', array('id' => $item->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <a href="{{route('delete_templete', array('id' => $item->id))}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </center>
                                    <div class="selector" id="{{ $item->id }}" style=" height:300px; overflow:auto; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; cursor: pointer;">
                                      <p style="display: inline;">Subject: </p>  <h5 style="display: inline;" class="text-center">{{ $item->subject }}</h5>
                                      <br><br>
                                      <h2 class="text-center">Body</h2>
                                       <p style="text-align:center;">@php
                                            echo $item->message;
                                        @endphp</p>
                                    </div>
                            </div>
                            @endforeach
                            
                       
                        </div>
                       <center> <button type="submit" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px;"> Send </button></center>
                    </form>
                
                </div>
                </div>
                </div>
            </tr>
            @endforeach
            @endif
            </tbody>
            </table>
            </div>
            <!-- END All Products Content -->
            </div>
            <div id="mailnew" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
            
                <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Write Email</h2>
                </div>
                <!-- END Modal Header -->
                
                <!-- Modal Body -->
                <div class="modal-body">
                <form action="{{route('send_email')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                @csrf
                <fieldset>
                <div class="form-group" style="display: none;">
                <div class="col-md-8">
                    <input type="text" name="id" class="user_sent" value="">
                </div>
                </div>
                <br>
            
                <div class="form-group">
                    <label class="col-md-4 control-label" for="user-settings-email">Status</label>
                    <div class="col-md-8">
                        <input type="checkbox" name="status"> Check if you want to save Template
                        </div>
                </div>
                <br>
            
                <div class="form-group">
                <label class="col-md-4 control-label" for="user-settings-email">Subject</label>
                <div class="col-md-8">
                <input type="text" name="subject" class="form-control" placeholder="Enter Email subject">
                </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="user-settings-email">Body</label>
                    <div class="col-md-8">
                        <textarea name="body" class="form-control ckeditor" rows="5" placeholder="Enter Body of your Email"></textarea>
                        </div>
                </div>
            
               
               
                <center>
                <button type="submit" name="sender" style="margin-top: 5px;" value="send" class="btn btn-sm btn-primary">Send Email</button>
                </center>
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
        $('.clicker').click(function()
        {
            var id=$(this).attr('id');
            $('.user_sent').val(id);
        });
    </script>

    <script>
        $('.selector').click(function()
        {
            $('.selector').attr('style','height:300px; overflow:auto; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; cursor: pointer;  background-color: white;')
            var id=$(this).attr('id');
            $('.former').attr('value',id);
            $(this).attr('style','height:300px; overflow:auto; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; cursor: pointer;  background-color: #7FFFD4;')
        });

    </script>
@endsection