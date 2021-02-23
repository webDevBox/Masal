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
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 offset-md-1">
            <!-- General Data Block -->
            <div class="block">
            <!-- General Data Title -->
            <div class="block-title">
            <h2><i class="fa fa-pencil"></i> <strong>Edit </strong>Product</h2>
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
            </div>
            <!-- END General Data Title -->
            
            <!-- General Data Content -->
            <form action="{{route('editor')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                @csrf
                <div class="form-group" style="display: none">
                    <div class="col-md-9">
                    <input type="number" id="product_name" value="{{$product->id}}" name="id" class="form-control">
                    </div>
                    </div>
                <div class="form-group">
                <label class="col-md-6 h5 control-label" for="product_name">Name</label>
                <div class="col-md-9">
                <input type="text" id="product_name" value="{{$product->name}}"  value="{{ old('product_name') }}" name="product_name" class="form-control">
                @if ($errors->has('product_name')) <p style="color:red;">{{ $errors->first('product_name') }}</p> @endif 
                </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-6 h5 control-label" for="product_name">Keywords</label>
                    <div class="col-md-9">
                    <input type="text" id="product_name" value="{{$product->keyword}}" value="{{ old('key') }}" name="key" class="form-control" placeholder="Enter product Keyword with , Separation.." required>
                    @if ($errors->has('key')) <p style="color:red;">{{ $errors->first('key') }}</p> @endif 
                    </div>
                    </div>
                
                <div class="form-group">
                <label class="col-md-6 h5 control-label" for="product_description">Description</label>
                <div class="col-md-9">
                <textarea rows="5" id="product_description" name="product_description" class="form-control ckeditor">{{$product->description}}</textarea>
                @if ($errors->has('product_description')) <p style="color:red;">{{ $errors->first('product_description') }}</p> @endif 
                
                </div>
                </div>
                
                
                <div class="form-group">
                    <label class="col-md-6 h5 control-label" for="product_description"> Category</label>
                    <div class="col-md-9">
                        <select class="form-control" name="category" required>
                            @if(count($category) > 0)
                            @foreach ($category as $row)
                        <option value="{{$row->id}}" @if($product->category == $row->id) selected  @endif>{{$row->name}}</option>
                            @endforeach
                            @else
                            <option disabled >No Category Available</option>
                            @endif
                
                        </select>
                    @if ($errors->has('category')) <p style="color:red;">{{ $errors->first('category') }}</p> @endif 
                    
                    </div>
                    </div>



                <div class="form-group">
                    <label class="col-md-6 h5 control-label" for="product_description"> Silhouettes</label>
                    <div class="col-md-9">
                        <select class="form-control" name="silhouette" required>
                            @if(count($silhouette) > 0)
                            @foreach ($silhouette as $row)
                        <option value="{{$row->id}}" @if($product->silhouette == $row->id) selected  @endif>{{$row->name}}</option>
                            @endforeach
                            @else
                            <option disabled >No Silhouettes Available</option>
                            @endif
                
                        </select>
                    @if ($errors->has('silhouette')) <p style="color:red;">{{ $errors->first('silhouette') }}</p> @endif 
                    
                    </div>
                    </div>


                <div class="form-group">
                    <label class="col-md-6 h5 control-label" for="product_description"> Necklines</label>
                    <div class="col-md-9">
                        <select class="form-control" name="neckline" required>
                            @if(count($neckline) > 0)
                            @foreach ($neckline as $row)
                        <option value="{{$row->id}}" @if($product->neckline == $row->id) selected  @endif>{{$row->name}}</option>
                            @endforeach
                            @else
                            <option disabled >No Necklines Available</option>
                            @endif
                
                        </select>
                    @if ($errors->has('neckline')) <p style="color:red;">{{ $errors->first('neckline') }}</p> @endif 
                    
                    </div>
                    </div>


                <div class="form-group">
                    <label class="col-md-6 h5 control-label" for="product_description"> Fabrics</label>
                    <div class="col-md-9">
                        <select class="form-control" name="fabric" required>
                            @if(count($fabric) > 0)
                            @foreach ($fabric as $row)
                        <option value="{{$row->id}}" @if($product->fabric == $row->id) selected  @endif>{{$row->name}}</option>
                            @endforeach
                            @else
                            <option disabled >No Fabrics Available</option>
                            @endif
                
                        </select>
                    @if ($errors->has('fabric')) <p style="color:red;">{{ $errors->first('fabric') }}</p> @endif 
                    
                    </div>
                    </div>
                
                
                
                    <div class="form-group">
                    <label class="col-md-6 h5 control-label" for="product_description"> Sleeve Type</label>
                    <div class="col-md-9">
                        <select class="form-control" name="sleeve" required>
                            @if(count($sleeve) > 0)
                            @foreach ($sleeve as $row)
                        <option value="{{$row->id}}" @if($product->sleeve == $row->id) selected  @endif>{{$row->name}}</option>
                            @endforeach
                            @else
                            <option disabled >No Sleeve Type Available</option>
                            @endif
                
                        </select>
                    @if ($errors->has('sleeve')) <p style="color:red;">{{ $errors->first('sleeve') }}</p> @endif 
                    
                    </div>
                    </div>
                
                
                    
                    <div class="form-group">
                        <label class="col-md-6 h5 control-label" for="product_description"> Tag</label>
                        <div class="col-md-9">
                            <select class="form-control" name="tag">
                                @if($product->tag == null)
                                <option disabled selected>No Tag Selected</option>
                                @endif
                                @if($product->tag != null)
                                <option value="354545">No Tag</option>
                                @endif
                                @if(count($sale) > 0)
                                @foreach ($sale as $row)
                            <option value="{{$row->name}}" @if($product->tag == $row->name) selected  @endif>{{$row->name}}</option>
                                @endforeach
                                @else
                                <option disabled >No Tag Available</option>
                                @endif
                    
                            </select>
                        @if ($errors->has('tag')) <p style="color:red;">{{ $errors->first('tag') }}</p> @endif 
                        
                        </div>
                        </div>
                
                    <div class="form-group">
                        <label class="col-md-6 h5 control-label" for="product_description">Colour Swatches</label>
                        <div class="col-md-9">
                            <select class="form-control" name="colour" required>
                                @if(count($category) > 0)
                                @foreach ($swatches as $row)
                            <option value="{{$row->colour}}" @if($product->colour == $row->colour) selected  @endif>{{$row->name}}</option>
                                @endforeach
                                @else
                                <option disabled >No Color Swatch Available</option>
                                @endif
                    
                            </select>
                        @if ($errors->has('colour')) <p style="color:red;">{{ $errors->first('colour') }}</p> @endif 
                        
                        </div>
                        </div>
                
                        @php
                           
                            $avail_size = json_decode($product->size);
                             
                        @endphp
                
                        <div class="form-group">
                            <label class="col-md-6 h5  control-label" for="product-short-description">Sizes</label>
                            <div class="col-md-9">
                            @foreach ($size as $item)
                            <label for="vehicle1">
                            <input style="margin-left:10px;" type="checkbox" class="sizero" name="size[]" value="{{$item->size}}" 
                            @foreach ($avail_size as $row)
                                @if($row == $item->size)
                                checked
                                @endif
                            @endforeach
                            >
                             {{$item->size}}</label>
                            @endforeach
                            @if ($errors->has('size')) <p style="color:red;">{{ $errors->first('size') }}</p> @endif 
                            </div>
                            </div>
                
                
                
                
                
                <div class="form-group">
                <label class="col-md-6 h5 control-label" for="product-price">Wholesale Price</label>
                <div class="col-md-9">
                <div class="input-group">
                <div class="input-group-addon"></div>
                <input type="number" id="product-price" value="{{$product->wholesalePrice}}" name="wholesale_price" class="form-control" placeholder="0,00">
                @if ($errors->has('wholesale_price')) <p style="color:red;">{{ $errors->first('wholesale_price') }}</p> @endif 
                
                </div>
                </div>
                </div>
                
                <div class="form-group">
                <label class="col-md-6 h5 control-label" for="product-price">Retail Price</label>
                <div class="col-md-9">
                <div class="input-group">
                <div class="input-group-addon"></div>
                <input type="number" id="product-price" value="{{$product->retailerPrice}}" name="retail_price" class="form-control" placeholder="0,00">
                @if ($errors->has('retail_price')) <p style="color:red;">{{ $errors->first('retail_price') }}</p> @endif 
                
                </div>
                </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-6 h5 control-label" for="product_name">Style Number</label>
                    <div class="col-md-9">
                    <input type="text" id="product_name" value="{{$product->styleNumber}}"  value="{{ old('style') }}" name="style" class="form-control">
                    @if ($errors->has('style')) <p style="color:red;">{{ $errors->first('style') }}</p> @endif 
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label class="col-md-6 h5 control-label" for="product_name">Barcode</label>
                    <div class="col-md-9">
                    <svg id="barcode2"></svg>
                    </div>
                    <div class="col-md-9">
                    <input type="text" id="prod_bar" value="{{$product->barcode}}"  value="{{ old('bar') }}" name="bar" class="form-control">
                    @if ($errors->has('bar')) <p style="color:red;">{{ $errors->first('bar') }}</p> @endif 
                    </div>
                </div>
                
                <div class="form-group" style="display: none;">
                    <input type="text" id="product_name" value="{{$product->barcode}}"  name="check_bar" class="form-control">
                    <input type="text" id="product_name" value="{{$product->styleNumber}}" name="check_style" class="form-control">
                    
                </div>
                
                <div class="form-group">
                    <label class="col-md-6 h5 control-label" for="product-price">Stock</label>
                    <div class="col-md-9">
                    <input type="number" id="product-price" value="{{$product->stock}}" name="stock" class="form-control" placeholder="0,00">
                    @if ($errors->has('stock')) <p style="color:red;">{{ $errors->first('stock') }}</p> @endif 
                    
                    </div>
                <br>
                <div class="form-group">
                <label class="col-md-6 h5 control-label">Status</label>
                <div class="col-md-9">
                <label class="radio-inline" for="product_condition-new">
                <input type="radio" id="product_condition-new" name="product_condition" value="active" @if($product->status == 'active') checked @endif > Active
                </label>
                <label class="radio-inline" for="product_condition-used">
                <input type="radio" id="product_condition-used" name="product_condition" value="inactive"  @if($product->status == 'inactive') checked @endif > In-Active
                </label>
                </div>
                @if ($errors->has('product_condition')) <p style="color:red;">{{ $errors->first('product_condition') }}</p> @endif 
                
                </div>
                
                
                @php
                
                $extra = json_decode($product->extra);
                   
                @endphp
                
                @if($product->extra != null)
                <div class="form-group">
                    <label class="col-md-6 h5 control-label" for="product-short-description">Additional Changes</label>
                    <div class="col-md-9">
                    @foreach ($addition as $item)
                    <label for="vehicle1">
                    <input style="margin-left:10px;" type="checkbox" class="addition" name="addition[]" value="{{$item->additional}}"
                
                    
                    @foreach ($extra as $size)
                    @if($size == $item->additional)
                    checked
                    @endif
                    @endforeach
                   
                    >
                     {{$item->additional}}</label>
                    @endforeach
                    </div>
                    </div>
                
                    @else
                    <div class="form-group">
                        <label class="col-md-6 h5 control-label" for="product-short-description">Additional Changes</label>
                        <div class="col-md-9">
                        @foreach ($addition as $item)
                        <label for="vehicle1">
                        <input style="margin-left:10px;" type="checkbox" class="addition" name="addition[]" value="{{$item->additional}}">
                         {{$item->additional}}</label>
                        @endforeach
                            </div>
                        </div>
                    
                    @endif
                
                
                
                
                <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                <button type="submit"  name="send" value="send" class="btn btn-sm btn-primary submitter" title="Update"><i class="fa fa-floppy-o"></i> Update</button>
                </div>
                </div>
                </form>
            
            <!-- END General Data Content -->
            </div>
            <!-- END General Data Block -->
            </div>
            
            </div>

            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                <div class="row">
                @if(isset($product->image1))
                <div id="delbutton" class="col-md-5" style="background:url({{asset('images/'.$product->image1)}});  background-size:cover; margin-top:10px; height:350px;" >
                  
                   <a href="{{route('del_image',array('id'=>$product->id, 'value'=>'image1'))}}"> <button id="deler" style="display: none;" class="btn btn-danger"> Delete </button> </a>
                   
                </div>
                @else
                <div id="chooser" class="col-md-5" style="background:url({{asset('images/products/no.png')}});  background-size:cover; margin-top:10px; height:350px;" >
                  
                <form style="display: none;" id="form" action="{{route('imgUploader')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <input type="file" name="image1" class="form-control btn btn-primary" required> <br><br>
                        <input type="text" value="{{$product->id}}" name="id" style="display:none;">
                        <center><input type="submit" name="img_upload" value="Upload" class="btn btn-primary"> </center>
            
                    </form>
                    
                 </div>
                @endif
                    
                    @if(isset($product->image2))
                    <div id="delbutton1" class="col-md-5" style="margin-left:10px; background:url({{asset('images/'.$product->image2)}});  background-size:cover; margin-top:10px; height:350px;" >
                  
                        <a href="{{route('del_image',array('id'=>$product->id, 'value'=>'image2'))}}"> <button id="deler1" style="display: none;" class="btn btn-danger"> Delete </button> </a>
                        
                     </div>
                    @else
                    <div id="chooser1" class="col-md-5" style="background:url({{asset('images/products/no.png')}});  background-size:cover; margin-top:10px; height:350px;" >
                  
                        <form style="display: none;" id="form1" action="{{route('imgUploader')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image2" class="form-control btn btn-primary" required> <br><br>
                            <input type="text" value="{{$product->id}}" name="id" style="display:none;">
                            <center><input type="submit" name="img_upload" value="Upload" class="btn btn-primary"> </center>
            
                        </form>
                        
                     </div>
                    @endif
                    
                    
                    @if(isset($product->image3))
                    <div id="delbutton2" class="col-md-5" style="background:url({{asset('images/'.$product->image3)}});  background-size:cover; margin-top:10px; height:350px;" >
                  
                        <a href="{{route('del_image',array('id'=>$product->id, 'value'=>'image3'))}}"> <button id="deler2" style="display: none;" class="btn btn-danger"> Delete </button> </a>
                        
                     </div>
                    @else
                    <div id="chooser2" class="col-md-5" style="background:url({{asset('images/products/no.png')}});  background-size:cover; margin-top:10px; height:350px;" >
                  
                        <form style="display: none;" id="form2" action="{{route('imgUploader')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image3" class="form-control btn btn-primary" required > <br><br>
                            <input type="text" value="{{$product->id}}" name="id" style="display:none;">
                         <center><input type="submit" name="img_upload" value="Upload" class="btn btn-primary"> </center>
                        </form>
                        
                     </div>
                    @endif
                    
                    
                    @if(isset($product->image4))
                    <div id="delbutton3" class="col-md-5" style="margin-left:10px; background:url({{asset('images/'.$product->image4)}});  background-size:cover; margin-top:10px; height:350px;" >
                  
                        <a href="{{route('del_image',array('id'=>$product->id, 'value'=>'image4'))}}"> <button id="deler3" style="display: none;" class="btn btn-danger"> Delete </button> </a>
                        
                     </div>
                    @else
                    <div id="chooser3" class="col-md-5" style="background:url({{asset('images/products/no.png')}});  background-size:cover; margin-top:10px; height:350px;" >
                  
                        <form style="display: none;" id="form3" action="{{route('imgUploader')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image4" class="form-control btn btn-primary" required> <br><br>
                            <input type="text" value="{{$product->id}}" name="id" style="display:none;">
                            <center><input type="submit" name="img_upload" value="Upload" class="btn btn-primary"> </center>
            
                        </form>
                        
                     </div>
                    @endif
                    
                    
                    @if(isset($product->image5))
                    <div id="delbutton4" class="col-md-5" style="background:url({{asset('images/'.$product->image5)}});  background-size:cover; margin-top:10px; height:350px;" >
                  
                        <a href="{{route('del_image',array('id'=>$product->id, 'value'=>'image5'))}}"> <button id="deler4" style="display: none;" class="btn btn-danger"> Delete </button> </a>
                        
                     </div>
                    @else
                    <div id="chooser4" class="col-md-5" style="background:url({{asset('images/products/no.png')}});  background-size:cover; margin-top:10px; height:350px;" >
                  
                        <form style="display: none;" id="form4" action="{{route('imgUploader')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image5" class="form-control btn btn-primary" required> 
                            <br><br>
                            <input type="text" value="{{$product->id}}" name="id" style="display:none;">
                            <center><input type="submit" name="img_upload" value="Upload" class="btn btn-primary"> </center>
            
                        </form>
                        
                     </div>
                    @endif
                    
                    
                    
                    @if(isset($product->image6))
                    <div id="delbutton5" class="col-md-5" style="margin-left:10px; background:url({{asset('images/'.$product->image6)}});  background-size:cover; margin-top:10px; height:350px;" >
                  
                        <a href="{{route('del_image',array('id'=>$product->id, 'value'=>'image6'))}}"> <button id="deler5" style="display: none;" class="btn btn-danger"> Delete </button> </a>
                        
                     </div>
                    @else
                    <div id="chooser5" class="col-md-5" style="background:url({{asset('images/products/no.png')}});  background-size:cover; margin-top:10px; height:350px;" >
                  
                        <form style="display: none;" id="form5" action="{{route('imgUploader')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image6" class="form-control btn btn-primary" required> <br><br>
                            <input type="text" value="{{$product->id}}" name="id" style="display:none;">
                            <center><input type="submit" name="img_upload" value="Upload" class="btn btn-primary"> </center>
            
                        </form>
                        
                     </div>
                    </div>
                    @endif
            
            </div>

    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>



    <script>
    $("#delbutton").mouseenter(function() {
            $('#deler').attr('style','display:block; margin-left:35%; margin-top:50%;');

        });
        $("#delbutton").mouseleave(function() {
            $('#deler').attr('style','display: none;');

        });

        $("#delbutton1").mouseenter(function() {
            $('#deler1').attr('style','display:block; margin-left:35%; margin-top:50%;');

        });
        $("#delbutton1").mouseleave(function() {
            $('#deler1').attr('style','display: none;');

        });

        $("#delbutton2").mouseenter(function() {
            $('#deler2').attr('style','display:block; margin-left:35%; margin-top:50%;');

        });
        $("#delbutton2").mouseleave(function() {
            $('#deler2').attr('style','display: none;');

        });

        $("#delbutton3").mouseenter(function() {
            $('#deler3').attr('style','display:block; margin-left:35%; margin-top:50%;');

        });
        $("#delbutton3").mouseleave(function() {
            $('#deler3').attr('style','display: none;');

        });

        $("#delbutton4").mouseenter(function() {
            $('#deler4').attr('style','display:block; margin-left:35%; margin-top:50%;');

        });
        $("#delbutton4").mouseleave(function() {
            $('#deler4').attr('style','display: none;');

        });

        $("#delbutton5").mouseenter(function() {
            $('#deler5').attr('style','display:block; margin-left:35%; margin-top:50%;');

        });
        $("#delbutton5").mouseleave(function() {
            $('#deler5').attr('style','display: none;');

        });



        $("#chooser").mouseenter(function() {
            $('#form').attr('style','display:block; margin-top:50%;');

        });

        $("#chooser").mouseleave(function() {
            $('#form').attr('style','display: none;');

        });

        $("#chooser1").mouseenter(function() {
            $('#form1').attr('style','display:block; margin-top:50%;');

        });

        $("#chooser1").mouseleave(function() {
            $('#form1').attr('style','display: none;');

        });


        $("#chooser2").mouseenter(function() {
            $('#form2').attr('style','display:block; margin-top:50%;');

        });

        $("#chooser2").mouseleave(function() {
            $('#form2').attr('style','display: none;');

        });

        $("#chooser3").mouseenter(function() {
            $('#form3').attr('style','display:block; margin-top:50%;');

        });

        $("#chooser3").mouseleave(function() {
            $('#form3').attr('style','display: none;');

        });
        $("#chooser4").mouseenter(function() {
            $('#form4').attr('style','display:block; margin-top:50%;');

        });

        $("#chooser4").mouseleave(function() {
            $('#form4').attr('style','display: none;');

        });
        $("#chooser5").mouseenter(function() {
            $('#form5').attr('style','display:block; margin-top:50%;');

        });

        $("#chooser5").mouseleave(function() {
            $('#form5').attr('style','display: none;');

        });
</script>

<script>
    $('.sizero').click(function()
                {
                    var status=0;
                $('.sizero:checkbox:checked').each(function () {
                    if(this.checked)
                    {
                        status=1;
                    }
                });
                
                
                if(status==1)
                {
                  $('.submitter').removeAttr("disabled");
                  $('.submitter').attr('title','Update');
                }
                else{
                     $('.submitter').attr('disabled','disabled');
                     $('.submitter').attr('title','Select atleast 1 Size');
                }
                
                    
                });


                $('.product').attr('class','active');
</script>
<script>
    JsBarcode("#barcode2", "{{$product->barcode}}", {
  font: "cursive",
  fontSize: 20
});
</script>

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