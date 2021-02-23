@extends('layout.admin')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="row match-height" >
    <!-- Company Table Card -->
    <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 offset-lg-3 offset-md-3" style="background-color: white;" >
     
        
        <h2 class="text-center pt-3 pb-1"><strong>Add New</strong> Product</h2>
        
        @if(Session::has('success'))
        
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
        
        @endif
        
        @if(Session::has('error'))
        
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        
        @endif
       
        
        <!-- END eShop Overview Title -->
        
        
        
        
        <form action="{{route('add_product')}}" method="post" class="form-horizontal form-bordered offset-lg-2 offset-md-2" enctype="multipart/form-data">
        
            @csrf
        
            <div class="form-group">
        
            <label class="col-md-12  h5   control-label" for="product_name">Name</label>
        
            <div class="col-md-9">
        
            <input type="text" id="product_name"  value="{{ old('product_name') }}" name="product_name" class="form-control" placeholder="Enter product name.." required>
        
            @if ($errors->has('product_name')) <p style="color:red;">{{ $errors->first('product_name') }}</p> @endif 
        
            </div>
        
            </div>
        
            <br>
        
            <div class="form-group">
        
            <label class="col-md-12  h5   control-label" for="product_name">Keywords</label>
        
            <div class="col-md-9">
        
            <input type="text" id="product_name"  value="{{ old('key') }}" name="key" class="form-control" placeholder="Enter product Keyword with , Separation.." required>
        
            @if ($errors->has('key')) <p style="color:red;">{{ $errors->first('key') }}</p> @endif 
        
            </div>
        
            </div>
        
            <br>
        
            <div class="form-group">
        
            <label class="col-md-12  h5   control-label" for="product_description">Description</label>
        
            <div class="col-md-9">
        
            <textarea id="product_description"  placeholder="Enter Product Description" name="product_description" class="form-control ckeditor" required>{{ old('product_description') }}</textarea>
        
            @if ($errors->has('product_description')) <p style="color:red;">{{ $errors->first('product_description') }}</p> @endif 
        
            </div>
        
            </div>
        
            <br>

            <div class="form-group">
        
                <label class="col-md-12  h5  control-label" for="product_description">Select Product Category</label>
        
                <div class="col-md-9">
        
                    <select class="form-control" name="category" required>
        
                        <option selected disabled >Select Any Category</option>
        
            
        
                        @if(count($category) > 0)
        
                        @foreach ($category as $row)
        
                    <option value="{{$row->id}}" >{{$row->name}}</option>
        
                        @endforeach
        
                        @else
        
                        <option disabled >No Category Available</option>
        
                        @endif
        
            
        
                    </select>
        
                @if ($errors->has('category')) <p style="color:red;">{{ $errors->first('category') }}</p> @endif 
        
                
        
                </div>
        
                </div>


        
             <br>
            <div class="form-group">
        
                <label class="col-md-12  h5  control-label" for="product_description">Select Product Silhouette</label>
        
                <div class="col-md-9">
        
                    <select class="form-control" name="silhouette" required>
        
                        <option selected disabled >Select Any Silhouette</option>
        
            
        
                        @if(count($silhouette) > 0)
        
                        @foreach ($silhouette as $row)
        
                    <option value="{{$row->id}}" >{{$row->name}}</option>
        
                        @endforeach
        
                        @else
        
                        <option disabled >No Silhouette Available</option>
        
                        @endif
        
            
        
                    </select>
        
                @if ($errors->has('silhouette')) <p style="color:red;">{{ $errors->first('silhouette') }}</p> @endif 
        
                
        
                </div>
        
                </div>
        
             <br>
            <div class="form-group">
        
                <label class="col-md-12  h5  control-label" for="product_description">Select Product Neckline</label>
        
                <div class="col-md-9">
        
                    <select class="form-control" name="neckline" required>
        
                        <option selected disabled >Select Any Neckline</option>
        
                        @if(count($neckline) > 0)
        
                        @foreach ($neckline as $row)
        
                    <option value="{{$row->id}}" >{{$row->name}}</option>
        
                        @endforeach
        
                        @else
        
                        <option disabled >No Neckline Available</option>
        
                        @endif
        
            
        
                    </select>
        
                @if ($errors->has('neckline')) <p style="color:red;">{{ $errors->first('neckline') }}</p> @endif 
        
                
        
                </div>
        
                </div>
        
             <br>
            <div class="form-group">
        
                <label class="col-md-12  h5  control-label" for="product_description">Select Product Fabric</label>
        
                <div class="col-md-9">
        
                    <select class="form-control" name="fabric" required>
        
                        <option selected disabled >Select Any Fabric</option>
        
            
        
                        @if(count($fabric) > 0)
        
                        @foreach ($fabric as $row)
        
                    <option value="{{$row->id}}" >{{$row->name}}</option>
        
                        @endforeach
        
                        @else
        
                        <option disabled >No Fabric Available</option>
        
                        @endif
        
            
        
                    </select>
        
                @if ($errors->has('fabric')) <p style="color:red;">{{ $errors->first('fabric') }}</p> @endif 
        
                
        
                </div>
        
                </div>
        
             <br>

            <div class="form-group">
        
                <label class="col-md-12  h5  control-label" for="product_description">Select Product Sleeve</label>
        
                <div class="col-md-9">
        
                    <select class="form-control" name="sleeve" required>
        
                        <option selected disabled >Select Any Sleeve</option>
        
            
        
                        @if(count($sleeve) > 0)
        
                        @foreach ($sleeve as $row)
        
                    <option value="{{$row->id}}" >{{$row->name}}</option>
        
                        @endforeach
        
                        @else
        
                        <option disabled >No Sleeve Available</option>
        
                        @endif
        
            
        
                    </select>
        
                @if ($errors->has('sleeve')) <p style="color:red;">{{ $errors->first('sleeve') }}</p> @endif 
        
                
        
                </div>
        
                </div>
        
             <br>
        
            <div class="form-group">
        
                <label class="col-md-12  h5   control-label" for="product_description">Available Colour Swatches</label>
        
                <div class="col-md-9">
        
                    <select class="form-control" name="colour" required>
        
                        <option selected disabled >Select Any Color Swatch</option>
        
            
        
                        @if(count($category) > 0)
        
                        @foreach ($swatches as $row)
        
                    <option value="{{$row->colour}}" >{{$row->name}}</option>
        
                        @endforeach
        
                        @else
        
                        <option disabled >No Color Swatch Available</option>
        
                        @endif
        
            
        
                    </select>
        
                @if ($errors->has('colour')) <p style="color:red;">{{ $errors->first('colour') }}</p> @endif 
        
                
        
                </div>
        
                </div>
        
                <br>
        
        
        
                <div class="form-group">
        
                    <label class="col-md-12  h5   control-label" for="product_description">Available Sale Tags</label>
        
                    <div class="col-md-9">
        
                        <select class="form-control" name="tag">
        
                            <option selected disabled >Select Any Tag</option>
        
                            @if(count($sale) > 0)
        
                            @foreach ($sale as $row)
        
                        <option value="{{$row->name}}" >{{$row->name}}</option>
        
                            @endforeach
        
                            @else
        
                            <option disabled >No Tag Available</option>
        
                            @endif
        
                
        
                        </select>
        
                    @if ($errors->has('tag')) <p style="color:red;">{{ $errors->first('tag') }}</p> @endif 
        
                    
        
                    </div>
        
                    </div>
        
                    <br>
        
            <div class="form-group">
        
            <label class="col-md-12  h5   control-label" for="product-short-description">Available Sizes</label>
        
            <div class="col-md-9">
        
            @foreach ($size as $item)
        
            <label for="vehicle1">
        
            <input type="checkbox" id="vehicle1" name="size[]" value="{{$item->size}}">
        
             {{$item->size}}</label>
        
             <span style="visibility: hidden;">lo</span>
        
            @endforeach
        
            </div>
        
            </div>
        
            <br>
        
            
            <div class="form-group">
        
            <label class="col-md-12  h5   control-label" for="product-price">Wholesale Price</label>
        
            <div class="col-md-9">
        
            <div class="input-group">
        
            <div class="input-group-addon"></div>
        
            <input type="number" id="product-price" value="{{ old('wholesale_price') }}" name="wholesale_price" class="form-control" placeholder="0.00" required>
        
            @if ($errors->has('wholesale_price')) <p style="color:red;">{{ $errors->first('wholesale_price') }}</p> @endif 
        
            
        
            </div>
        
            </div>
        
            </div>
        
            <br>
        
            <div class="form-group">
        
            <label class="col-md-12  h5   control-label" for="product-price">Retail Price</label>
        
            <div class="col-md-9">
        
            <div class="input-group">
        
            <div class="input-group-addon"></div>
        
            <input type="number" id="product-price" value="{{ old('retail_price') }}" name="retail_price" class="form-control" placeholder="0.00" required>
        
            @if ($errors->has('retail_price')) <p style="color:red;">{{ $errors->first('retail_price') }}</p> @endif 
        
            
        
            </div>
        
            </div>
        
            </div>
        
            <br>
        
            <div class="form-group">
        
            <label class="col-md-12  h5   control-label" for="product-price">Style Number</label>
        
            <div class="col-md-9">
        
            <input type="text" id="product-price" value="{{ old('style') }}" name="style" class="form-control" placeholder="Enter Style Number" required>
        
            @if ($errors->has('style')) <p style="color:red;">{{ $errors->first('style') }}</p> @endif 
        
            
        
            </div>
        
            </div>
        
            <br>
           
           
            <div class="form-group">
        
            <label class="col-md-12  h5   control-label" for="product-price">Barcode</label>
            <div class="col-md-9 baro" style="display: none;">
                <svg id="barcode2"></svg>
                </div>
            <div class="col-md-9">
        
            <input type="text" id="prod_bar" value="{{ old('bar') }}" name="bar" class="form-control" placeholder="Enter Barcode" required>
        
            @if ($errors->has('bar')) <p style="color:red;">{{ $errors->first('bar') }}</p> @endif 
        
            </div>
        
            </div>
        
            <br>
        
            <div class="form-group">
        
                <label class="col-md-12  h5   control-label" for="product-price">Stock</label>
        
                <div class="col-md-9">
        
                <input type="number" min="0" id="product-price" value="0" value="{{ old('stock') }}"  name="stock" class="form-control" required>
        
                @if ($errors->has('stock')) <p style="color:red;">{{ $errors->first('stock') }}</p> @endif 
        
                
        
                </div>
        
                </div>
        
        
                <br>
        
        
            <div class="form-group">
        
            <label class="col-md-12  h5   control-label">Status</label>
        
            <div class="col-md-9">
        
            <label class="radio-inline" for="product_condition-new">
        
            <input type="radio" id="product_condition-new" name="product_condition" value="active"> Active
        
            </label>
        
            <label class="radio-inline pl-5" for="product_condition-used">
        
            <input type="radio" id="product_condition-used" name="product_condition" value="inactive"> In-Active
        
            </label>
        
            </div>
        
            @if ($errors->has('product_condition')) <p style="color:red;">{{ $errors->first('product_condition') }}</p> @endif 
        
            
        
            </div>
        
            <br>
        
            <div class="form-group">
        
                <label class="col-md-12  h5   control-label" for="product-short-description">Additional Changes</label>
        
                <div class="col-md-9">
        
                @foreach ($addition as $item)
        
                <label for="vehicle1">
        
                <input type="checkbox" id="vehicle1" name="addition[]" value="{{$item->additional}}">
        
                 {{$item->additional}}</label>
        
                 <span style="visibility: hidden;">lo</span>
        
                @endforeach
        
                </div>
        
                </div>
        
            
                <br>
            
        
            <div class="form-group">
        
            <label class="col-md-12  h5   control-label" for="product-price">First Image</label>
        
            <div class="col-md-9">
        
            <input type="file" id="product-price" name="first" class="btn btn-success" required>
        
            @if ($errors->has('first')) <p style="color:red;">{{ $errors->first('first') }}</p> @endif 
        
            
        
            </div>
        
            </div>

            <br>
        
            <div class="form-group">
        
            <label class="col-md-12  h5   control-label" for="product-price">Second Image</label>
        
            <div class="col-md-9">
        
            <input type="file" id="product-price" name="second" class="btn btn-success">
        
            @if ($errors->has('second')) <p style="color:red;">{{ $errors->first('second') }}</p> @endif 
        
            </div>
        
            </div>
        
            <br>
        
            <div class="form-group">
        
            <label class="col-md-12  h5   control-label" for="product-price">Third Image</label>
        
            <div class="col-md-9">
        
            <input type="file" id="product-price" name="third" class="btn btn-success">
        
            @if ($errors->has('third')) <p style="color:red;">{{ $errors->first('third') }}</p> @endif 
        
            </div>
        
            </div>
        
        
            <br>
        
        
            <div class="form-group">
        
                <label class="col-md-12  h5   control-label" for="product-price">Forth Image</label>
        
                <div class="col-md-9">
        
                <input type="file" id="product-price" name="forth" class="btn btn-success">
        
                @if ($errors->has('forth')) <p style="color:red;">{{ $errors->first('forth') }}</p> @endif 
        
                </div>
        
                </div>
        
        
                <br>
        
        
                <div class="form-group">
        
                    <label class="col-md-12  h5   control-label" for="product-price">Fifth Image</label>
        
                    <div class="col-md-9">
        
                    <input type="file" id="product-price" name="fifth" class="btn btn-success">
        
                    @if ($errors->has('fifth')) <p style="color:red;">{{ $errors->first('fifth') }}</p> @endif 
        
                    </div>
        
                    </div>
        
        
                    <br>
        
        
                    <div class="form-group">
        
                        <label class="col-md-12  h5   control-label" for="product-price">Sixth Image</label>
        
                        <div class="col-md-9">
        
                        <input type="file" id="product-price" name="sixth" class="btn btn-success">
        
                        @if ($errors->has('sixth')) <p style="color:red;">{{ $errors->first('sixth') }}</p> @endif 
        
                        </div>
        
                        </div>
        
        
                        <br>
        
                        <div class="form-group form-actions">
                    
                        <div class="col-md-9 offset-md-4">
                    
                            <button type="submit" name="send" value="send" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                    
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                    
                        </div>
                    
                        </div>
        
            </form>
        
        </div>
    <!--/ Company Table Card -->
    
    <!-- Developer Meetup Card -->
    
    
    
    
    
    
    </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    <script>
        $('input[name=bar]').keyup(function() { 
            $('.baro').attr('style','block');
            var val = $('#prod_bar').val();
            JsBarcode("#barcode2", val, {
            font: "cursive",
            fontSize: 20
            });
         });
       
    </script>
@endsection