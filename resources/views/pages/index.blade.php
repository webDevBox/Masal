@extends('layout.web')
@section('content')

    <div class="main-content" id="main" role="main">


        <div class="home-cmp iblock-fix">


            <section class="common-slider common-videolist">
                <div class="main-carousel">
                    <div class="list slick-slider" data-slick data-property-autoplaySpeed="5000"
                        aria-label="Home Page Hero">
                        <div class="list-item slick-current">
                            <div class="slider-item slide-just-image " id="slide3">
                                <div class="content-blocks">
                                    <div class="content-block slider-image">
                                        <div class="slider-bg mobile-bg has-background"
                                            style="background-image: url('slides/big.jpg')">
                                            <img src="slides/big.jpg" alt="" />
                                        </div>
                                        <div class="slider-bg desktop-bg has-background"
                                            style="background-image: url('slides/big.jpg')">
                                            <img src="{{ asset('slides/big.jpg') }}"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="content-block slider-template">
                                        <div class="template template-justimage">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section class="section-header section-header-alt" id="section-designers-header">
                <div class="container">
                    <div class="row">
                        <div class="header">
                            <h2>
                                {{ $home->name5 }}
                            </h2>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-featured-collection" id="section-collection">
                <div class="container-fluid">
                    <div class="row">
                        <div class="featured-collection-blocks">
                            <div class="list">
                                <div class="list-item">
                                    @php
                                    $modern= 'images/'.$home->image;
                                    @endphp
                                    <a href="#" class="content-block content-img has-background"
                                        style="background-image: url(<?php echo $modern; ?>);">
                                        <img src="{{ asset('images/' . $home->image) }}"
                                            alt="Model in yellow Sherri Hill dress">
                                    </a>

                                </div>
                                <div class="list-item">
                                    <div class="content-header">
                                        <div class="header">
                                            <h3> {{ $home->name1 }} </h3>
                                            <p> {{ $home->name4 }} </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @php
            $count=0;
            foreach ($category as $key) {
            $img[$count]='images/'.$key->image;
            $copon[$count]=$key->name;
            $count++;
            }
            @endphp
            <section class="section-categories mt-home" id="section-categories">
                <div class="container-fluid">
                    <div class="row">
                        <div class="featured-categories">
                            <div class="list">
                                <div class="list-item">
                                    <a href="{{ route('wherebuy') }}" class="featured-category">
                                        <div class="content-blocks">
                                            <div class="content-block content-img has-background "
                                                style="background-image: url(<?php echo $img[0]; ?>);">
                                                <img src="<?php echo $img[2]; ?>"
                                                    alt="Model in wedding dress by Masal">
                                            </div>

                                            <div class="content-block content-header">
                                                <h3>{{ $copon[0] }}
                                                </h3>
                                                <span class="btn btn-transparent-invert">Find Store
                                                </span>

                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('wherebuy') }}" class="featured-category">
                                        <div class="content-blocks">
                                            <div class="content-block content-img has-background"
                                                style="background-image: url(<?php echo $img[1]; ?>);">
                                                <img src="<?php echo $img[1]; ?>"
                                                    alt="Model in yellow Sherri Hill dress">
                                            </div>

                                            <div class="content-block content-header">
                                                <h3>{{ $copon[1] }}
                                                </h3>
                                                <span class="btn btn-transparent-invert">Find Store
                                                </span>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-item">
                                    <a href="{{ route('wherebuy') }}" class="featured-category">
                                        <div class="content-blocks">
                                            <div class="content-block content-img has-background"
                                                style="background-image: url(<?php echo $img[2]; ?>);">
                                                <img src="<?php echo $img[2]; ?>"
                                                    alt="Brunette model in off the shoulder wedding dress">
                                            </div>
                                            <div class="content-block content-header">
                                                <h3>{{ $copon[2] }}
                                                </h3>
                                                <span class="btn btn-transparent-invert">Find Store
                                                </span>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="store-locator-section" id="store-locator-section">
                <div class="container">
                <div class="row">
                <div class="header">
                <div class="headings">
                <div class="icon-container">
                <i class="material-icons" aria-hidden="true" style="font-size:23px; color: honeydew; ">pin_drop</i>
                </i>
                </div>
                <h3>Find your dream dress
                
                </h3>
                </div>
                <form name="store-locator-form" class="store-locator-form iblock-fix" aria-label="Find a Store Form">
                    <div class="form-group">
                    {{-- <input type="search" placeholder="Enter your Country, state, or City" data-property="store-locator-search" data-rule-sllocationselected="true" autocomplete="off" class="ui-autocomplete-input" aria-label="Enter your city, state, or zip" required> --}}
                    <div class="input-btn">
                    <button type="submit" class="btn btn-success" >
                    <a href="{{route('mapper')}}"> Find a store</a>
                    </button>
                    </div>
                    </div>
                    </form>
                </div>
                </div>
                </div>
                </section>


            <section class="section-header section-featured-header" id="section-featured-header">
                <div class="container">
                    <div class="row">
                        <div class="header">
                            <h2>
                                Latest Products
                            </h2>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-recommended section-featured" aria-label="Featured Products">
                <div class="container">
                    <div class="row">
                        <div class="recommended-products featured-products" data-property="featured-products">
                            <div class="product-list">
                                <div class="list" role="listbox" aria-label="Featured Products">


                                    @foreach ($latestProduct as $item)
                                        @php
                                        $image='images/'.$item->image1;
                                        @endphp

                                        <div class="list-item" role="option" aria-label="Masal Clarissa">
                                            <div class="recommended-product featured-product">

                                                <div class="recommended-product featured-product">
                                                    <a href="{{ route('detail', ['id' => $item->styleNumber]) }}"
                                                        class="product product-simple" data-property="parent"
                                                        data-product-id="448">
                                                        <div class="product-image has-background"
                                                            style="background-image: url(<?php echo $image; ?>)"
                                                            data-img="default">
                                                            <img src="<?php echo $image; ?>"
                                                                alt="Clarissa" />
                                                        </div>
                                                        <div class="descriptions">
                                                            <div class="description description-title">

                                                                <h4>
                                                                    <span data-layout-font>{{ $item->name }}</span>
                                                                    <span data-layout-font class="">|</span>
                                                                    <span data-layout-font>#{{ $item->styleNumber }}</span>
                                                                </h4>

                                                            </div>
                                                            <div class="description controls custom-favorites">

                                                                

                                                            </div>
                                                            
                                                            <center> <button class="btn btn-success" style="margin-top: 5px;" href="{{route('detail', ['id' => $item->styleNumber])}}">View Details </button> </center>
                                                        </div>
                                                    </a>
                                                   
                                                </div>
                                               

                                            </div>
                                        </div>
                                       
                                    @endforeach



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--<section class="section-header section-header-alt" id="section-designers-header">-->
            <!--    <div class="container">-->
            <!--        <div class="row">-->
            <!--            <div class="header">-->
            <!--                <h2>-->
            <!--                    {{ $home->name6 }}-->
            <!--                </h2>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->
            @php
            $image2='images/'.$home->image2;
            @endphp
            <section class="section-meet-sophia" id="meet-sophia">
                <div class="container">
                    <div class="row">
                        <div class="about-sophia-blocks">
                            <div class="list">
                                <div class="list-item">
                                    <div class="content-blocks">
                                        <a href="#" class="content-block content-img has-background"
                                            style="background-image: url(<?php echo $image2; ?>);">
                                            <img src="{{ asset('images/' . $home->image2) }}" alt="Photo of Masal">
                                        </a>

                                    </div>
                                </div>
                                <div class="list-item">
                                    <div class="content-blocks">
                                        <div class="content-block content-header">
                                            <div class="headings">
                                                {{-- <h3>{{ $home->name3 }}
                                                </h3> --}}
                                                <div class="text-img">
                                                    <img src="{{ asset('images/' . $foot->logo) }}" alt="Sophia"
                                                        style="margin-top: 10px;">
                                                </div>
                                                <p>
                                                    {{ $home->name4 }}
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           

            <section class="section-instagram-header" id="section-instagram-header">
                <div class="container">
                <div class="row">
                <div class="header">
                <a href="https://www.instagram.com" target="_blank"> @masalaustralia
                </a>
                </div>
                </div>
                </div>
                </section>

            <section class="section-recommended section-featured" aria-label="Featured Products">
                <div id="curator-feed-default-feed-layout"></div>
            </section>

        </div>


    </div>

    <script>
        $('#top_title').html('{{ $home->title }}');
        $('#top_key').attr('content','{{ $home->keyword }}');
    </script>
  
@endsection
