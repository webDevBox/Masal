@extends('layout.web')
@section('content')

    <div class="main-content" id="main" role="main">


        <div class="home-cmp iblock-fix">


            <section class="common-slider common-videolist">

                @php
                $banner='images/'.$page->banner;
                @endphp

                <img style="width:100%; height:300px;" @if($page->banner == null) src="{{ asset('images/banner/banner.jpg') }}"
                @else src="{{ asset('images/' . $page->banner) }}" @endif>

            </section>

            <section class="section-header section-header-alt" id="section-designers-header">
                <div class="container">
                    <div class="row">
                        <div class="header">
                            <h2>
                                @php
                                    echo $page->h1;
                                @endphp
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
                                    if($page->image1 != null)
                                    {
                                    $modern='images/'.$page->image1;
                                    }
                                    else {
                                    $modern='images/custom/dummy.jpg';
                                    }
                                    @endphp
                                   
                                    <a href="#" class="content-block content-img"
                                        style="background-image: url(<?php echo $modern; ?>);">
                                        <img style="height: 800px;" @if($page->image1!=null) src="{{ asset('images/' . $page->image1) }}"
                                        @else src="{{ asset('images/custom/dummy.jpg') }}" @endif
                                            alt="Model in yellow Sherri Hill dress">
                                    </a>

                                </div>
                                <div class="list-item">
                                    <div class="content-header">
                                        <div class="header">
                                            <h3> @php
                                                echo $page->h2;
                                            @endphp </h3>
                                            <p> @php
                                                echo $page->p1;
                                            @endphp </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            @if ($page->latest != 'no')
                <section class="section-header section-featured-header" id="section-featured-header">
                    <div class="container">
                        <div class="row">
                            <div class="header">
                                <h2>
                                    @if ($page->latest == 'prod') Latest Products
                                    @elseif($page->latest == 'cat') Latest Collection @endif
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

                                        @if ($page->latest == 'prod')
                                            @foreach ($latestProduct as $item)

                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <img src="{{ asset('images/' . $item->image1) }}" class="center-block"
                                                        style="height: 500px; width:400px;" alt="">
                                                    <h4 class="text-center"> {{ $item->name }} </h4>
                                                </div>

                                            @endforeach

                                        @elseif($page->latest == 'cat')
                                            @foreach ($latestCat as $row)

                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <img src="{{ asset('images/' . $row->image) }}" class="center-block"
                                                        style="height: 500px; width:400px;" alt="">
                                                    <h4 class="text-center"> {{ $row->name }} </h4>
                                                </div>

                                            @endforeach
                                        @endif



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            @endif



            <section class="section-header section-header-alt" id="section-designers-header">
                <div class="container">
                    <div class="row">
                        <div class="header">
                            <h2>
                               @php
                                   echo $page->h3;
                               @endphp
                            </h2>
                        </div>
                    </div>
                </div>
            </section>
            @php
            if($page->image2 != null)
            {
            $image2='images/'.$page->image2;
            }
            else {
                $image2='images/custom/dummy.jpg';
            }
            @endphp
            <section class="section-meet-sophia" id="meet-sophia">
                <div class="container">
                    <div class="row">
                        <div class="about-sophia-blocks">
                            <div class="list">
                                <div class="list-item">
                                    <div class="content-blocks">
                                        <a href="#" class="content-block content-img"
                                            style="background-image: url(<?php echo $image2; ?>);">
                                            <img style="height:500px;" @if($page->image2!=null) src="{{ asset('images/' . $page->image2) }}"
                                            @else src="{{ asset('images/custom/dummy.jpg') }}" @endif 
                                            alt="Photo of Masal">
                                        </a>

                                    </div>
                                </div>
                                <div class="list-item">
                                    <div class="content-blocks">
                                        <div class="content-block content-header">
                                            <div class="headings">
                                                <h3>@php
                                                    echo $page->h4;
                                                @endphp
                                                </h3>
                                               @php
                                                   echo $page->p2;
                                               @endphp

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




        </div>


    </div>

@endsection
