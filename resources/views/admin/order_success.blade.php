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
                <h2><i class="fa fa-shopping-cart"></i> <strong>Order Detail</strong></h2>
                @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                @endif
                 </div>
                 <div class="table-responsive">
                    <table class="table" id="table">
                    <thead>
                    <tr>
                    <th class="text-center" style="width: 70px;"> ID</th>
                    <th class="text-center">Product Image</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Product Notes</th>
                    <th class="text-center">Style #</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Size</th>
                    <th class="text-center">Color</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Extra</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    @php
                    $product= \App\products::find($row->productId);
                    
                    @endphp
                    <tr>
                    <td class="text-center"><strong>OID.{{$row->id}}</strong></td>
                    <td class="text-center">
                    <img alt="" id="image_1" style="width:60px; height:80px; margin-top:20px;" src="{{ asset('images/'.$product->image1) }}">
                    </td>
                    <td class="text-center"  style="width: 300px;">{{$product->name}}</td>
                    <td class="text-center">
                    @if($row->detail != null)
                    {{$row->detail}}
                    @else
                    No Order Notes Given
                    @endif
                    </td>
                    <td class="text-center">{{$product->styleNumber}}</td>
                    <td class="text-center">${{$product->wholesalePrice}}</td>
                    <td class="text-center">{{$row->quantity}}</td>
                    <td class="text-center">{{$row->sizes}}</td>
                    <td class="text-center">{{$row->colour}}</td>
                    <td class="text-center">{{$row->status}}</td>
                    <td class="text-center"> @if($row->extra != null) {{$row->extra}} @else No Extra @endif </td>
                    </tr>
                    </tbody>
                    </table>
                    </div>

                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-4">
                        </div>
                        <div class="col-lg-3 col-md-3">
                        <button id="print" style="" class="btn btn-primary">Print</button>
                        <input type="button" id="pdf" class="btn btn-success" value="Download As PDF" onclick="Export()" />
                        <input type="text" value="{{ $row->id }}" style="display: none;" id="order_id">
                        </div>
                        </div>
            <!-- END Products Content -->
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