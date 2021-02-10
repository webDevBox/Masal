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

<section class="section-gallerylooks gallerylooks-theme mt-internal mt-internal-sm-alt">
    <div class="container container-lg">
    <div class="row">
    <div class="gallerylooks-images">
    <div class="grid">
    
        @foreach ($retailer_real as $row)
        @php
            $name=\App\User::find($row->retailer);
            $data=\App\wedding::find($row->wedding);
        @endphp
    <div class="gallerylook-image grid-item" id="slidesGrid0">
    <div class="grid-item-content">

        @if($row->type == 'image')
        <img src="{{ asset('images/'.$row->file) }}" />
        @endif
        @if($row->type == 'video')
        <video style="width: 600px; height:500px;" src="{{ asset('images/'.$row->file) }}" type="video/mp4" controls>
        @endif
        @if($row->type == 'link')
        <iframe style="width: 600px; height:500px;" src="{{ $row->file }}" frameborder="2" allowfullscreen>
        </iframe>
        @endif

       
    <div class="grid-item-info">
    <div class="grid-item-link-overlay">
   
    <div class="social-networks social-share social-share-multi">
        <ul>
            <li>
                <span class="share-title">
                    Share:
                </span>
            </li>
                        <li>
                            <a href="https://www.pinterest.com/sophiatolli/"
                               target="_blank"
                               data-property="pinterest-share-multi"
                               data-social-title="Y11895A | Zena"
                               data-social-url="{{ asset('images/'.$row->file) }}"
                               data-social-picture="{{ asset('images/'.$row->file) }}"
                               data-social-description=""
                               title="Pinterest"
                               aria-label="Share on Pinterest">
                                <i class="fa fa-pinterest-p"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/sophiatolli"
                               target="_blank"
                               data-property="twitter-share-multi"
                               data-social-title="Y11895A | Zena"
                               data-social-url="real-brides.html#slidesGrid0"
                               data-social-picture="{{ asset('images/'.$row->file) }}"
                               data-social-description=""
                               title="Twitter"
                               aria-label="Share on Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
        </ul>
    </div>
    
 
    </div>
    @if($row->type == 'image')
    <div data-property="description" class="header">
    <h3>Wedding</h3>
    <h2>{{$data->name}}</h2>
    </div>
    @endif
    
    </div>
    </div>
    </div>
    @endforeach
    </div>
    </div>
    </div>
    </div>
    </section>





@endsection


