@extends('layout.web')
@section('content')
    


<div class="main-content" id="main" role="main">
            

    <div class="inner-cmp iblock-fix">
            <section class="section-showcase" id="about-showcase">
                <div class="container">
                    <div class="row">
                        <div class="showcase">
                            <div class="shocase-section showcase-header">
                                <div class="list">
                                    <div class="list-item">
                                        <div class="header-img">
                                            <img src="{{asset('images/'.$about->logo)}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-about-images section-block" id="section-about-images">
                <div class="container container-sm-full">
                    <div class="row">
                        <div class="about-images">
                            <div class="list">
                                    <div class="list-item">
                                        <div class="about-image">
                                            <div class="content-block content-img has-background has-absolute-img"
                                                 style="background-image: url('{{asset('images/'.$about->image1)}}');">
                                                <img src="{{asset('images/'.$about->image1)}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-item">
                                        <div class="about-image">
                                            <div class="content-block content-img has-background has-absolute-img"
                                                 style="background-image: url('{{asset('images/'.$about->image2)}}');">
                                                <img src="{{asset('images/'.$about->image2)}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-item">
                                        <div class="about-image">
                                            <div class="content-block content-img has-background has-absolute-img"
                                                 style="background-image: url('{{asset('images/'.$about->image3)}}');">
                                                <img src="{{asset('images/'.$about->image3)}}">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-article section-inner-about" id="section-inner-about">
                <div class="container sm-container">
                    <div class="row">
                        <div class="content-header">
                                <h2>{{ $about->h1 }}</h2>
                                <p>
                                    <br />
                                </p>
    
    <h3><i>{{ $about->p1 }}</i></h3>
    <p>&nbsp;</p>
    <p>{{ $about->p2 }}</p>
    <p>&nbsp;</p>
    <p>{{ $about->p3 }}</p>
    <p>&nbsp;</p>
    <p>{{ $about->p4 }}</p>
    <p>&nbsp;</p>
    <p>{{ $about->p5 }}</p>                    
</div>
                    </div>
                </div>
            </section>
            <section class="section-button about-button" id="about-button">
                <div class="container">
                    <div class="row">
                        <div class="content-btn">
                            <a href="{{ route('nav_collection',array('id'=>$cat->id)) }}" class="btn btn-success-invert">View The Collection</a>
                        </div>
                    </div>
                </div>
            </section>
    
        
    </div>
    
    
            </div>



            <script>
                $('#top_title').html('{{ $about->title }}');
                $('#top_key').attr('content','{{ $about->keyword }}');
            </script>

@endsection