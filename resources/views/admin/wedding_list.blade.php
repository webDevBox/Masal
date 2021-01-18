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
    
        <div class="block full row">
            
            @if (count($weddings) > 0)
    @foreach ($weddings as $row)
    @php
        $count=\App\retailer_bride::where('wedding',$row->id)->count();
        if($count > 0)
        {
            $first=\App\retailer_bride::where('wedding',$row->id)->first();
        }
    @endphp   
    @if($count > 0)
    <a href="{{ route('real_request',array('id'=>$row->id)) }}">                                                                                           
     <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        @if($first->type == 'image')
        <img alt="" style="width: 200px; height: 300px;" src="{{ asset('images/'.$first->file) }}">
        @endif
        @if($first->type == 'video')
        <video style="width: 200px; height: 300px;" src="{{ asset('images/'.$first->file) }}" type="video/mp4" controls>
        @endif
        @if($first->type == 'link')
        <iframe width="200" height="300" src="{{ $first->file }}" frameborder="0" allowfullscreen>
        </iframe>
        @endif
       

     </div>
      <h4 class="text-center mt-2"> {{$row->name}} </h4>
    </a>  
    @endif
    @endforeach
    @else
        <h2 class="text-center">No Wedding Found</h2>
    @endif
           
    </div>
        </div>  
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>

@endsection