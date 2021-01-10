@extends('layout.web')
@section('content')

<section class="section-showcase section-showcase-top">
    <div class="container">
        <div class="row">
            <div class="showcase">
                    <div class="shocase-section showcase-header" style="">
                        <div class="list">

                                <div class="list-item">
                                    <div class="header header-title">
                                        <h1>{{$wedding->name}} Wedding</h1>
                                        @if(Session::has('success'))
                                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                                        @endif
                                        @if(Session::has('error'))
                                        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    @foreach ($retailer_real as $row)
   
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align:center;">
            @if($row->type == 'image')
            <img alt="" style="width: 200px; height: 300px; padding:15px;" src="{{ asset('images/'.$row->file) }}">
            @endif
            @if($row->type == 'video')
            <video style="width: 200px; height: 300px; padding:15px;" src="{{ asset('images/'.$row->file) }}" type="video/mp4" controls>
            @endif
            @if($row->type == 'link')
            <iframe style="width: 200px; height: 300px; padding:15px;" src="{{ $row->file }}" frameborder="0" allowfullscreen>
            </iframe>
            @endif
        </div>
    @endforeach
</div>

@endsection


