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
                                            <img src="{{asset('images/logo/about.png')}}">
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
                                                 style="background-image: url('{{asset('images/logo/about1.jpg')}}');">
                                                <img src="{{asset('images/logo/about1.jpg')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-item">
                                        <div class="about-image">
                                            <div class="content-block content-img has-background has-absolute-img"
                                                 style="background-image: url('{{asset('images/logo/about2.jpg')}}');">
                                                <img src="{{asset('images/logo/about2.jpg')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-item">
                                        <div class="about-image">
                                            <div class="content-block content-img has-background has-absolute-img"
                                                 style="background-image: url('{{asset('images/logo/about3.jpg')}}');">
                                                <img src="{{asset('images/logo/about3.jpg')}}">
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
                                <h2>A fusion of modern romance and timeless elegance, the Masal   collection is a celebration of diversity, femininity and individuality.</h2>
                                <p>
                                    <br />
                                </p>
    
    <h3><i>With the vision to make every bride feel confident, empowered and beautiful on their special day, every Masal gown is handcrafted with love and designed to be remembered forever.</i></h3>
    <p>&nbsp;</p>
    <p>For over a decade Masal Apostolides has been recognised as one of the bridal industry&rsquo;s most talented designers, inspired by real women to create unforgettable designs that highlight your natural beauty and unique bridal style. A graduate of the Fashion Design Studio in her hometown of Sydney,  , Masal is diverse in her creative approach to dressing women&rsquo;s bodies, driven by the endless design possibilities that come with it.</p>
    <p>&nbsp;</p>
    <p>Having grown up surrounded by dressmakers, fabrics and sewing machines, Masal knew from a young age that she was destined to be a designer. Throughout college she challenged traditional dressmaking techniques and her award-winning expertise in fit and construction is the result of both her higher education and experience in made-to-measure gowns.</p>
    <p>&nbsp;</p>
    <p>The luxurious fabrics, fabulous fit, exquisite embellishments and attention to detail are all signature elements of Masal&rsquo;s design style. From classic lace looks to chic simplicity, there is something that celebrates every body shape and size.</p>
    <p>&nbsp;</p>
    <p>Designed with love in Sydney, the Masal bridal collection can be found in over 400 retailers worldwide. We look forward to sharing this incredible journey with you as we bring your dream dress to life.</p>                    </div>
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





@endsection