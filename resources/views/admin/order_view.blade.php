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
    
        <div class="block">
            <!-- Products Title -->
            <div class="block-title">
                <h2><i class="fa fa-shopping-cart"></i> <strong>View Orders</strong></h2>
                @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
            @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
            @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif    
                 </div>
                 <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Order Id</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Product Style#</th>
                                <th class="text-center">Colors</th>
                                <th class="text-center">Sizes</th>
                                <th class="text-center">QTY</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Extra</th>
                                <th class="text-center">Unit Price</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Order Date & Time</th>
                                <th class="text-center">Cancellation Requests </th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($order as $row)
                                @php
                                $extra=0;
                                    $product_id=$row->productId;
                                    $product= \App\products::find($product_id);
                                    if($row->extra != null)
                                    {
                                    $additional= \App\additional::where('additional',$row->extra)->first();
                                    $exprice=$additional->price;
                                    $extra=$row->quantity*$exprice;
                                    }
                                    $price=$row->quantity*$product->wholesalePrice;
                                    if($row->extra != null)
                                    {
                                        $price=$price+$extra;
                                    }
                                @endphp
                            <tr>
                                <td class="text-center">OID.{{$row->id}}</td>
                                <td class="text-center" style="width: 300px;">{{$product->name}}</td>
                                <td class="text-center">{{$product->styleNumber}}</td>
                                <td class="text-center">{{$row->colour}}</td>
                                <td class="text-center">{{$row->sizes}}</td>
                                <td class="text-center">{{$row->quantity}}</td>
                                <td class="text-center">{{$row->status}}</td>
                                <td class="text-center">
                                @if($row->extra != null)
                                {{$row->extra}}
                                @else
                                No Extra
                                @endif
                                </td>
                                <td class="text-center">${{$product->wholesalePrice}}</td>
                                <td class="text-center">${{$price}}</td>
                                <td class="text-center">{{$row->created_at}}</td>
                                <td class="text-center"> @if($row->cancle_order_request == 1)<span class="bg-warning text-dark">Requested</span>
                                    @elseif($row->cancle_order_request == 2) <p> Order Canceled Request is Accpted </p> @elseif($row->cancle_order_request == 3)
                                    <p> Order Canceled Request is Rejected </p>  @else <p> No Request </p> @endif </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                    <a href="{{route('OrderView',array('id' => $row->id))}}" data-toggle="tooltip" title="Order Details" class="btn btn-xs btn-primary" style="color:black;">
                                        <i class="fa fa-eye"></i></a>
                                    <a id="pdf" title="Download Invoice" class="clicker btn btn-secondary btn-xs" data1='OID.{{$row->id}}'
                                     data2='{{$product->name}}' data3='@if($row->detail != null) {{ $row->detail }}  @else No Notes @endif' 
                                     data4='{{$product->styleNumber}}' data5='{{$product->wholesalePrice}}' data6='{{$row->quantity}}'
                                     data7='{{$row->sizes}}' data8='{{$row->colour}}' data9='{{$row->status}}' data10=' @if($row->extra != null) {{$row->extra}} @else No Extra @endif'
                                         style="cursor: pointer; color: black;">
                                        <i class="fa fa-download"></i></a>
                                    <a href="{{route('OrderEdit',array('id' => $row->id))}}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success" style="color: black;">
                                        <i class="fa fa-pencil-square-o"></i></a>
                                    <a href="{{route('OrderDel',array('id' => $row->id))}}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger" style="color: black;">
                                        <i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    </div>
                    <center>{{ $order->links() }}</center>
                    <div class="table-responsive fake" style="display:none; background:#EAEDF1;">
                        <table class="table table-bordered" style="border: 1px solid black" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Product Notes</th>
                                    <th class="text-center">Style#</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Sizes</th>
                                    <th class="text-center">Colors</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Extra</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center d1">  </td>
                                    <td class="text-center d2"> </td>
                                    <td class="text-center d3">  </td>
                                    <td class="text-center d4">  </td>
                                    <td class="text-center d5">  </td>
                                    <td class="text-center d6">  </td>
                                    <td class="text-center d7">  </td>
                                    <td class="text-center d8">  </td>
                                    <td class="text-center d9">  </td>
                                    <td class="text-center d10">  </td>
                                </tr>
                            </tbody>
                        </table>
                        <a type="button" class="btn btn-success down" onclick="Export()" > Download As PDF </a>
                    </div>
            <!-- END Products Content -->
        </div>
        
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>
   
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript">

$('.clicker').click(function()
    {
        $('.d1').html($(this).attr('data1'));
        $('.d2').html($(this).attr('data2'));
        $('.d3').html($(this).attr('data3'));
        $('.d4').html($(this).attr('data4'));
        $('.d5').html($(this).attr('data5'));
        $('.d6').html($(this).attr('data6'));
        $('.d7').html($(this).attr('data7'));
        $('.d8').html($(this).attr('data8'));
        $('.d9').html($(this).attr('data9'));
        $('.d10').html($(this).attr('data10'));
        jQuery('.down').click();
    });

    function Export() {
        $('.fake').attr('style','block');
        html2canvas(document.getElementById('table'), {
        onrendered: function (canvas) {
        var data = canvas.toDataURL();
        var id = $('.d1').html();
        var docDefinition = {
        content: [{
        image: data,
        width: 500
        }]
        };
        pdfMake.createPdf(docDefinition).download(id+".pdf");
        }
        });
        }
</script>
<script>
    $('.body').attr('id','body');
    </script>
@endsection

