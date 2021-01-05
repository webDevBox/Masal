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
             
                
                <h2><strong>All</strong> Products</h2>
               
            </div>
            <!-- END All Products Title -->
            
            <!-- All Products Content -->
            <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 70px;">ID</th>
                        <th class="text-center">Product Name</th>
                        <th class="text-center">Product Image</th>
                        <th class="text-center">Style Number</th>
                        <th class="text-center">Added</th>
                        <th class="text-center">Real Bride</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($product) > 0)
                    @foreach($product as $row)
                    @php
                        $check=\App\real::where('product',$row->id)->count();
                    @endphp
                    <tr>
                    <td class="text-center">PID.{{$row->id}}</td>
                        <td class="text-center">{{$row->name}}</td>
                    <td class="text-center"><img height="150" width="100" src="{{ asset('images/'.$row->image1) }}" ></td>
                        <td class="text-center">{{$row->styleNumber}}</td>
                     
                        <td class="text-center">{{$row->created_at}}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                @if($check == 0)
                            <a href="{{route('add_real', array('id' => $row->id))}}" data-toggle="tooltip" title="Add to Real Bride" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                @else
                                <a href="{{route('del_real', array('id' => $row->id))}}" data-toggle="tooltip" title="Remove to Real Bride" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            @endif
                        
                        
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
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>

@endsection