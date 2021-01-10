@extends('layout.web')
@section('content')

<section class="section-header section-header-alt" id="section-designers-header">
<div class="container">
<div class="row">
<div class="header">
<h2>
{{$cat->name}}
</h2>
</div>
</div>
</div>
</section>

<div class="row" style="margin-top: 10px;">
@foreach ($products as $row)
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="text-align: center; margin-top: 10px;">
<a href="{{route('detail', array('id' => $row->id))}}">
<img alt="" style="width: 400px; padding:15px;" src="{{ asset('images/'.$row->image1) }}">
<h3>{{$row->name}}</h2>
<h4>Style# {{$row->styleNumber}}</h4>
</a>
</div>
@endforeach
</div>


@endsection