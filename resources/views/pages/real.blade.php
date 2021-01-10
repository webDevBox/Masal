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
    @foreach ($real as $row)
    @php
    $id=$row->product;
    $product=\App\products::where('id',$id)->first();
    @endphp
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align:center;">
        <a href="{{route('detail', array('id' => $product->id))}}">
        <img alt="" style="height: 500px; padding:15px;" src="{{ asset('images/'.$product->image1) }}">
        <h4>{{$product->name}}</h4>
        <h6>Style# {{$product->styleNumber}}</h6>
    </a>
    </div>
    @endforeach
    @else
    <div class="col-lg-4 col-md-4">

    </div>
    <div class="col-lg-4 col-md-4">
        <img alt="" style="height: 500px;" src="{{asset('images/products/no.png')}}">
    </div>
    @endif
</div>


<div class="row" id="stock_div" style="display:none;">
    @foreach ($wedding as $row)
    @php
        $name=\App\User::find($row->retailer);
        $counter=\App\retailer_bride::where('wedding',$row->id)->count();
        $data=\App\retailer_bride::where('wedding',$row->id)->first();
    @endphp
        @if($counter > 0)
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align:center;">
        <a href="{{route('wedding_detail', array('id' => $row->id))}}">
            @if($data->type == 'image')
            <img alt="" style="width: 200px; height: 300px; padding:15px;" src="{{ asset('images/'.$data->file) }}">
            @endif
            @if($data->type == 'video')
            <video style="width: 200px; height: 300px; padding:15px;" src="{{ asset('images/'.$data->file) }}" type="video/mp4" controls>
            @endif
            @if($data->type == 'link')
            <iframe style="width: 200px; height: 300px; padding:15px;" src="{{ $data->file }}" frameborder="0" allowfullscreen>
            </iframe>
            @endif
            <h4> Wedding: {{$row->name}} </h4>
        </a>
        </div>
        @endif
    @endforeach
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


