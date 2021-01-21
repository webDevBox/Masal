@extends('layout.web')
@section('content')

<div class="row" style="text-align: center;">
    <button style="background: black; color:white;" id="admin">Our Brides</button> 
    <button style="background: white; color:black;" id="stock">Retailer Brides</button>
</div>
@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif


<div class="row" id="admin_div" style="">
    @if(count($real) > 0)
    <section class="section-gallerylooks gallerylooks-theme mt-internal mt-internal-sm-alt">
        <div class="container container-lg">
        <div class="row">
        <div class="gallerylooks-images">
        <div class="grid">
        
            @foreach ($real as $row)
            @php
            $id=$row->product;
            $product=\App\products::find($id);
            @endphp
            
        <div class="gallerylook-image grid-item" id="slidesGrid0">
        <div class="grid-item-content">
            <img alt="" src="{{ asset('images/'.$product->image1) }}">
        <div class="grid-item-info">
        <div class="grid-item-link-overlay">
        <a href="{{route('detail', array('id' => $id))}}" data-property="description">
        </a>
        
     
        </div>
        <div data-property="description" class="header">
        <h3>{{$product->name}}</h3>
        <h2>Style# {{$product->styleNumber}}</h2>
        </div>
        
        </div>
        </div>
        </div>
      
        @endforeach
        </div>
        </div>
        </div>
        </div>
        </section>
@endif
</div>


<div class="row" id="stock_div" style="display:none;">



    <section class="section-gallerylooks gallerylooks-theme mt-internal mt-internal-sm-alt">
        <div class="container container-lg">
        <div class="row">
        <div class="gallerylooks-images">
        <div class="grid">
        
            @foreach ($wedding as $row)
            @php
                $name=\App\User::find($row->retailer);
                $counter=\App\retailer_bride::where('wedding',$row->id)->count();
                $data=\App\retailer_bride::where('wedding',$row->id)->first();
            @endphp
             @if($counter > 0)
        <div class="gallerylook-image grid-item" id="slidesGrid0">
        <div class="grid-item-content">

            @if($data->type == 'image')
            <img src="{{ asset('images/'.$data->file) }}" />
            @endif
            @if($data->type == 'video')
            <video src="{{ asset('images/'.$data->file) }}" type="video/mp4" controls>
            @endif
            @if($data->type == 'link')
            <iframe src="{{ $data->file }}" frameborder="0" allowfullscreen>
            </iframe>
            @endif

       
        <div class="grid-item-info">
        <div class="grid-item-link-overlay">
        <a href="{{route('wedding_detail', array('id' => $row->id))}}" data-property="description">
        </a>
        
     
        </div>
        <div data-property="description" class="header">
        <h3>Wedding</h3>
        <h2>{{$row->name}}</h2>
        </div>
        
        </div>
        </div>
        </div>
        @endif
        @endforeach
        </div>
        </div>
        </div>
        </div>
        </section>
   
</div>
<script>
  $("#admin").click(function() {
      $("#stock").attr('style','background: white; color:black;');
      $("#admin").attr('style','background: black; color:white;');
      $("#admin_div").attr('style','display:block;')
      $("#stock_div").attr('style','display:none;')
  });
  $("#stock").click(function() {
    $("#stock").attr('style','background: black; color:white;');
      $("#admin").attr('style','background: white; color:black;');
      $("#admin_div").attr('style','display:none;')
      $("#stock_div").attr('style','display:block;')
  });
</script>
@endsection