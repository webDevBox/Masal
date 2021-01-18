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
    
        <div class="block full">
            <!-- All Products Title -->
            <div class="block-title">
             
                
                <h2><strong>Real </strong>  Bride Requests</h2>
                @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                @endif
            </div>
            <!-- END All Products Title -->
            
            <!-- All Products Content -->
            <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">Retailer Name</th>
                        <th class="text-center">File</th>
                        <th class="text-center">Added</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($real) > 0)
                    @foreach($real as $row)
                    <tr>
                        @php
                            $name=\App\User::where('id',$row->retailerId)->first();
                        @endphp
                        <td class="text-center">{{ $name->name }}</td>
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
                        <td class="text-center">{{ $row->created_at }}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="{{route('active_request',array('id' => $row->id, 'value'=>2))}}" data-toggle="tooltip" @if($row->status == 2) style="width:30px; height:30px;" @endif title="Active" class="btn btn-primary">
                                    <i class="fa fa-check" style="padding-top: 40%;"></i></a>
                                @if($row->status == 2)
                                <a href="{{route('active_request',array('id' => $row->id, 'value'=>1))}}" data-toggle="tooltip"  title="Inactive" class="btn btn-danger">
                                    <i class="fa fa-eject" aria-hidden="true"></i></a>
                                @endif
                                @if($row->status == 1)
                                <a href="{{route('active_request',array('id' => $row->id, 'value'=>3))}}" data-toggle="tooltip" @if($row->status == 1) style="width:30px; height:30px;" @endif title="Delete" class="btn btn-danger">
                                    <i class="fa fa-times" style="padding-top: 40%;"></i></a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
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