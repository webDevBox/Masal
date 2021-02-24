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
             
                
                <h2><strong>Top</strong> Selling Products</h2><br>
               
            </div>
            <!-- END All Products Title -->
            
            <!-- All Products Content -->
            <table id="ecom-products" class="table table-bordered table-striped table-vcenter table-responsi">
                <thead>

                    <tr>

                        <th class="text-center" style="width: 70px;">ID</th>

                        <th class="text-center">Product Name</th>

                        <th class="text-center">Style Number</th>

                        <th class="text-center">Sellings</th>

                        <th class="text-center">Added</th>

                    </tr>

                </thead>

                <tbody>


                    @if(count($product) > 0)

                    @foreach($product as $row)



                    <tr>
                        <td class="text-center"><strong>PID.{{$row->id}}</strong></td>

                        <td class="text-center">{{$row->name}}</td>

                        <td class="text-center"><strong>{{$row->styleNumber}}</strong></td>

                        <td class="text-center"> {{$row->min}} </td>

                        <td class="text-center">{{$row->created_at}}</td>
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