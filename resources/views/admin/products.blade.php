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
    
        <div class="row">
            <div  class="col-md-3 " style="margin-bottom: 10px;">
                <h2><strong>All Products</strong></h2>
                @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                @endif
            </div>
    
            <div class="col-md-1" >
                    <a href="{{route('products')}}" name="all" id="all">
                        <h4>Show All</h4>
                    </a>
            </div>
    
            <div  class="col-md-2" style="margin-bottom: 10px;">
                <form action="" method="GET">
                    <select  name="color" class="form-control" id="color">
                        <option selected disabled>Select Color</option>
                        @foreach ($product as $row)
                                    @php
                                    $colors = json_decode($row->colour);
                                    @endphp
                                    @endforeach
                                    @foreach($colors as $colo)
                        
                        <option value="{{$row->colour}}"> {{$colo}} </option>
                        @endforeach
                    </select>
                </form>
            </div>
    
            <div class=" col-md-2" style="margin-bottom: 10px;">
                <form action="" method="GET">
                    <select name="size" class="form-control" id="size">
                        <option selected disabled>Select Size</option>
                        @foreach ($size as $sizes)
                        <option value="{{$sizes->size}}"> {{$sizes->size}} </option>
                        @endforeach
                    </select>
                </form>
            </div>
    
            <div  class=" col-md-2" style="margin-bottom: 10px;">
                <form action="" method="GET">
                    <select name="style" class="form-control" id="style">
                        <option selected disabled>Select Style</option>
                        @foreach($product as $row)
                        <option value="{{$row->styleNumber}}"> {{$row->styleNumber}} </option>
                        @endforeach
                    </select>
                </form>
            </div>
    
            <div  class=" col-md-2" style="margin-bottom: 10px;">
                <form action="" method="GET">
                    <select name="category" class="form-control" id="category">
                        <option selected disabled>Select Collection</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}"> {{$item->name}} </option>
                        @endforeach
                    </select>
                </form>
            </div>
            
        </div>
        
    
    <div class="row match-height">
        
        <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
    
            <thead>
    
                <tr>
    
                    <th class="text-center" style="width: 70px;">ID</th>
    
                    <th class="text-center">Product Name</th>
    
                    <th class="text-center">Style Number</th>
    
                    <th class="text-center">WholeSale Price</th>
    
                    <th class="text-center">Retailer Price</th>
    
                    <th class="text-center">Stock</th>
    
                    <th class="text-center">Status</th>
    
                    <th class="text-center">Tag</th>
    
                    <th class="text-center">Added</th>
    
                    <th class="text-center">Action</th>
    
                </tr>
    
            </thead>
    
            <tbody>
                @if(count($product) > 0)

            @foreach($product as $row)

            <tr>

                <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> PID.{{$row->id}} </a> </td>

                <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> {{$row->name}} </a> </td>

                <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;">{{$row->styleNumber}} </a></td>

                <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> ${{$row->wholesalePrice}} </a> </td>

                <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> ${{$row->retailerPrice}} </a> </td>

                <td class="text-center"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> {{$row->stock}} </a> </td>

                <td class="text-center">

                    <span class="label label-success"> <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;"> {{$row->status}} </a> </span>

                </td>





                <td class="text-center">

                    @php

                    $tag=\App\sale::where('name',$row->tag)->first();

                    if(!isset($tag))

                    {

                    $row->tag=null;

                    }

                    @endphp
                    <a href="{{route('edit_product', array('id' => $row->id))}}" style="color: black;">
                        <span @if($row->tag != null) style="background: {{ $tag->color }}" @endif>

                            @if($row->tag == null) No Tag @else {{$row->tag}} @endif</span>
                    </a>
                </td>





                <td class="text-center">{{$row->created_at}}</td>

                <td class="text-center">

                    <div class="btn-group btn-group-xs">

                        <a href="{{route('edit_product', array('id' => $row->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

                        <a href="{{route('delete', array('id' => $row->id))}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>

                    </div>

                </td>

            </tr>
            
            @endforeach
            <tr>
                <td colspan="10">
                    <div class="offset-lg-5 offset-md-5">
                        {{ $product->links() }} 
                    </div>
                </td>
            </tr>
            @else

            <p>No Product stored</p>

            @endif
            
            </tbody>

           
    
        </table>
    
      
    
    
    </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>


    
<script>
    $('#category').change(function() {
        this.form.submit();

    });
</script>
<script>
    $('#color').change(function() {
        this.form.submit();

    });
</script>
<script>
    $('#style').change(function() {
        this.form.submit();

    });
</script>
<script>
    $('#size').change(function() {
        this.form.submit();

    });
</script>
<script>
    $('#all').change(function() {
        this.form.submit();

    });
</script>

@endsection