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
             
                
                <h2><strong>All</strong> Menus</h2>
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
                        <th class="text-center">Name</th>
                        <th class="text-center">Header</th>
                        <th class="text-center">Footer</th>
        
                    </tr>
                </thead>
                <tbody>
                    @if(count($menu) > 0)
                    @foreach($menu as $row)
                    <tr>
                        <td class="text-center"> {{$row->name}} </td>
                        
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                @if($row->header_status == 1)
                                <a href="{{route('header', array('id' => $row->id,'value'=>2))}}" title="Inactive" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                @endif
                                @if($row->header_status == 2)
                                <a href="{{route('header', array('id' => $row->id,'value'=>1))}}" title="Active" class="btn btn-xs btn-primary"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                @if($row->footer_status == 1)
                                <a href="{{route('footer', array('id' => $row->id,'value'=>2))}}" title="Inactive" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                @endif
                                @if($row->footer_status == 2)
                                <a href="{{route('footer', array('id' => $row->id,'value'=>1))}}" title="Active" class="btn btn-xs btn-primary"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <p>No Menu stored</p>
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