@extends('layout.retailer')
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
                                   
            <h1 class="text-center"> Order Confirmation </h1>
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
            
         
            @if(count($success) > 0)
            <div class="table-responsive">
            <table class="table table-hover" id="table">
            <thead>
            <tr>
                <td colspan="11">
                <img class="mx-auto d-block" style="width:300px; height:150px;" src="{{ asset('images/'.$logo->logo) }}" alt="">
                </td>
            </tr>
                @if(count($success) > 0)
                <p class="alert alert-success"> Payment done successfully ! </p>
                @endif
            <tr>
            <th class="text-center" style="width: 70px;"> ID</th>
            <th class="text-center">Product Image</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Product Notes</th>
            <th class="text-center">Style #</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Total Price</th>
            <th class="text-center">Size</th>
            <th class="text-center">Color</th>
            <th class="text-center">Status</th>
            <th class="text-center">Extra</th>
            </tr>
            </thead>
            <tbody>

            @foreach($success as $row)
            @php
            $order=$row->order_id;
            $retail_order=\App\retailerOrder::find($order);
            $product= \App\products::where('id',$retail_order->productId)->first();
            $extra=0;
            if($retail_order->extra != null)
            {
                $addition=additional::where('additional',$retail_order->extra)->first();
                $extra=$addition->price;
            }
            $total=($product->wholesalePrice*$retail_order->quantity)+($extra*$retail_order->quantity);

            @endphp
            <tr>
            <td class="text-center"><strong>OID.{{$retail_order->id}}</strong></td>
            <td class="text-center">
            <img alt="" id="image_1" style="width:60px; height:80px; margin-top:20px;" src="{{ asset('images/'.$product->image1) }}">
            </td>
            <td class="text-center col-lg-2 col-md-2">{{$product->name}}</td>
            <td class="text-center">
            @if($retail_order->detail != null)
            {{$retail_order->detail}}
            @else
            No Order Notes Given
            @endif
            </td>
            <td class="text-center">{{$product->styleNumber}}</td>
            <td class="text-center">{{$retail_order->quantity}}</td>
            <td class="text-center">${{$product->wholesalePrice}}</td>
            <td class="text-center">${{$total}}</td>
            <td class="text-center">{{$retail_order->sizes}}</td>
            <td class="text-center">{{$retail_order->colour}}</td>
            <td class="text-center">{{$retail_order->status}}</td>
            <td class="text-center"> @if($retail_order->extra != null) {{$retail_order->extra}} @else No Extra @endif </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            </div>
            <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-4">
            </div>
            <div class="col-lg-3 col-md-3">
            <button id="print" style="" class="btn btn-primary">Print</button>
            <input type="button" id="pdf" class="btn btn-success" value="Download As PDF" onclick="Export()" />
            <input type="text" value="{{ $retail_order->id }}" style="display: none;" id="order_id">
            </div>
            </div>
            @else
            <h5 class="text-center">Nothing to Show</h5>
            @endif
            @php
            foreach($success as $row)
            {
            $row->delete();
            }
            @endphp


            </div>  
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>

    <script>
        $('#print').click(function()
        {
        $('#print').attr('style','display:none;');
        $('#pdf').attr('style','display:none;');
        window.print();
        $('#print').attr('style','display:inline;');
        $('#pdf').attr('style','display:inline;');
        });
        </script>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
        <script type="text/javascript">
        function Export() {
        html2canvas(document.getElementById('table'), {
        onrendered: function (canvas) {
        var data = canvas.toDataURL();
        var id = $('#order_id').val();
        var docDefinition = {
        content: [{
        image: data,
        width: 500
        }]
        };
        pdfMake.createPdf(docDefinition).download("Order"+id+".pdf");
        }
        });
        }
        </script>


@endsection