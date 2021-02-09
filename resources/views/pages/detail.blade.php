@extends('layout.web')
@section('content')


<section class="section-product" data-product-id="473">
<div class="container">
<div class="row">
<div class="product-bio">
<div class="product-detailed clearfix iblock-fix">
<div class="product-info product-visual">
<div class="product-media">
<div class="product-views clearfix" data-property="parent">
@php
// $image1='images/instagram/1.jpg';
// $image2='images/instagram/2.jpg';
// $image3='images/instagram/3.jpg';
// $image4='images/instagram/4.jpg';
// $image5='images/instagram/5.jpg';
// $image6='images/instagram/6.jpg';



$image1='images/'.$detail->image1;
$image2='images/'.$detail->image2;
$image3='images/'.$detail->image3;
$image4='images/'.$detail->image4;
$image5='images/'.$detail->image5;
$image6='images/'.$detail->image6;
@endphp


<div class="product-view overviews common-videolist">
<div class="list" data-list="overviews" data-slick>
<div class="list-item">
<div class="overview main_top_1" data-lazy-background style="background-image: url({{ asset($image1) }})">
<a href="{{ asset($image1) }}"
class="MagicZoom overview-media main_top_2" data-options="textClickZoomHint: Click to zoom" aria-hidden="true">
<img class="main_top_3" data-lazy="{{ asset($image1) }}" src="{{ asset($image1) }}" alt="Masal Style #Y118JKT"/>
</a>
</div>
</div>
<div class="list-item">
<div class="overview" data-lazy-background style="background-image: url({{ asset($image2) }})">
<a href="{{ asset($image2) }}"
class="MagicZoom overview-media" data-options="textClickZoomHint: Click to zoom" aria-hidden="true">
<img data-lazy="{{ asset($image2) }}" src="{{ asset($image2) }}" alt="Masal Style #Y118JKT"/>
</a>
</div>
</div>
</div>
</div>



<div class="product-view previews">
    <div class="list" data-list="previews">
            <div class="list-item">
                <div class="preview has-background"
                     style="background-image: url('{{asset($image1)}}')"
                     data-trigger="color-filter-all"
                     data-value-id="">
                    <img src="{{asset($image1)}}" alt="Masal Style #Y118JKT"/>
                </div>
            </div>
            <div class="list-item">
                <div class="preview has-background"
                     style="background-image: url('{{asset($image2)}}')"
                     data-trigger="color-filter-all"
                     data-value-id="">
                    <img src="{{asset($image2)}}" alt="Masal Style #Y118JKT"/>
                </div>
            </div>
            <div class="list-item">
                <div class="preview has-background"
                     style="background-image: url('{{asset($image3)}}')"
                     data-trigger="color-filter-all"
                     data-value-id="">
                    <img src="{{asset($image3)}}" alt="Masal Style #Y118JKT"/>
                </div>
            </div>
            <div class="list-item">
                <div class="preview has-background"
                     style="background-image: url('{{asset($image4)}}')"
                     data-trigger="color-filter-all"
                     data-value-id="">
                    <img src="{{asset($image4)}}" alt="Masal Style #Y118JKT"/>
                </div>
            </div>
            <div class="list-item">
                <div class="preview has-background"
                     style="background-image: url('{{asset($image5)}}')"
                     data-trigger="color-filter-all"
                     data-value-id="">
                    <img src="{{asset($image5)}}" alt="Masal Style #Y118JKT"/>
                </div>
            </div>
            <div class="list-item">
                <div class="preview has-background"
                     style="background-image: url('{{asset($image6)}}')"
                     data-trigger="color-filter-all"
                     data-value-id="">
                    <img src="{{asset($image6)}}" alt="Masal Style #Y118JKT"/>
                </div>
            </div>
    </div>

</div>


{{-- End Side Bar Images --}}



</div>

</div>



</div>
<div class="product-info product-sheet">


<div class="product-heading">

<div class="option name">
<h1>
{{$detail->name}}
</h1>

<h2>
{{$detail->styleNumber}}
</h2>
</div>




</div>

<div class="product-actions"  data-property="sticky-submit-parent">
<div class="option buttons-block" data-property="sticky-submit">
<div class="relative-container">
<div class="cart-hint" data-property="cart-tooltip">
<a href="#" class="cart-hint-close" data-trigger="cart-tooltip-close">&#10006;</a>
<div class="cart-hint-header">
<span class="h5" data-change="cart-tooltip-header">Ship date:</span>
</div>
<div class="cart-hint-body">
<p data-change="cart-tooltip-text"></p>
</div>
<div class="cart-hint-arrow"></div>
</div>
</div>
<a href="{{ route('wherebuy') }}" class="btn btn-success" data-property="find-in-store" >
Find a Store
</a>

</div>
</div>

<div class="product-attributes">
<div class="option description">



<div class="tabs tabs-description">
<ul class="nav nav-tabs">
<li class="active">
<a data-toggle="tab" href="#description" class="option-title">Description</a>
</li>
<li class="">
<a data-toggle="tab" href="#attributes" class="option-title">Details</a>
</li>
</ul>
<div class="tab-content">
<div id="description" class="tab-pane active"
data-parent="theme-more"
data-dependency=".overviews.common-videolist">
<center> <a href="{{ asset('images/products/chart.pdf') }}" style="font-size: x-large;" download="Size Chart"> Size Chart </a> </center>

<p data-property="description">
@php
echo $detail->description;
@endphp 
</p>

</div>

<div id="attributes" class="tab-pane "
data-parent="theme-more"
data-dependency=".overviews.common-videolist">
<ul class="attr-ul">
<li>
<span class="attr-ul--span attr-ul--label">Color:</span>
@php
$colors = json_decode($detail->colour);
$sizes = json_decode($detail->size);
@endphp
<span class="attr-ul--span attr-ul--value">
@foreach($colors as $colo)
{{ $colo }} &nbsp; 
@endforeach
</span>
</li>

<li>
<span class="attr-ul--span attr-ul--label">Size:</span>
<span class="attr-ul--span attr-ul--value"> 
@foreach($sizes as $size)
{{ $size }} &nbsp; 
@endforeach</span>
</li>

<li>
<span class="attr-ul--span attr-ul--label">Fabric</span>
<span class="attr-ul--span attr-ul--value">{{ $fabric->name }}</span>
</li>
<li>
<span class="attr-ul--span attr-ul--label">Neckline</span>
<span class="attr-ul--span attr-ul--value">{{ $neck->name }}</span>
</li>
<li>
<span class="attr-ul--span attr-ul--label">Sleeve Type</span>
<span class="attr-ul--span attr-ul--value">{{ $seleve->name }}</span>
</li>
<li>
<span class="attr-ul--span attr-ul--label">Silhouette</span>
<span class="attr-ul--span attr-ul--value">{{ $silhouette->name }}</span>
</li>
</ul>


</div>
</div>
</div>

</div>
</div>




</div>
</div>

<div class="product-detailed product-line clearfix iblock-fix">
    <div class="product-info product-visual">
        <div class="product-media"></div>
    </div>
    <div class="product-info product-sheet">
        <div class="product-details">
            <div class="product-options-absolute">
                <div class="option hidden-xs hidden-sm"></div>
                        <div class="option buttons-block">
                            <a href="https://www.pinterest.com/sophiatolli/" class="btn btn-pin"
                               data-property="pinterest-share"
                               target="_blank" title="Pinterest"
                               aria-label="Pin This Style">
                                <i class="fa fa-pinterest-p"></i>
                                <span>in This Style</span>
                            </a>
                        </div>

                <div class="option option-social footer-style">
                    <div class="social-networks social-share social-share-single">
    <ul>
                    <li style="display: none;">
                        <a href="https://www.facebook.com/sophiatolli"
                           data-property="facebook-share"
                           target="_blank" title="Facebook" aria-label="Facebook">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
                    <li style="display: none;">
                        <a href="https://plus.google.com/"
                           data-property="googleplus-share"
                           target="_blank" title="GooglePlus" aria-label="GooglePlus">
                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
                    <li style="display: none;">
                        <a href="https://www.instagram.com/sophiatolli/"
                           data-property="instagram-share"
                           target="_blank" title="Instagram" aria-label="Instagram">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
                    <li style="display: none;">
                        <a href="https://www.linkedin.com/"
                           data-property="linkedin-share"
                           target="_blank" title="LinkedIn" aria-label="LinkedIn">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
                    <li style="display: none;">
                        <a href="https://www.pinterest.com/sophiatolli/"
                           data-property="pinterest-share"
                           target="_blank" title="Pinterest" aria-label="Pinterest">
                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
                    <li style="display: none;">
                        <a href="https://twitter.com/sophiatolli"
                           data-property="twitter-share"
                           target="_blank" title="Twitter" aria-label="Twitter">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
                    <li style="display: none;">
                        <a href="https://www.whatsapp.com/"
                           data-property="whatsapp-share"
                           target="_blank" title="WhatsApp" aria-label="WhatsApp">
                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
                    <li style="display: none;">
                        <a href="https://www.youtube.com/"
                           data-property="youtube-share"
                           target="_blank" title="Youtube" aria-label="Youtube">
                            <i class="fa fa-youtube" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
                    <li style="display: none;">
                        <a href="https://www.snapchat.com/"
                           data-property="snapchat-share"
                           target="_blank" title="SnapChat" aria-label="SnapChat">
                            <i class="fa fa-snapchat-ghost" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
                    <li style="display: none;">
                        <a href="https://www.yelp.com/"
                           data-property="yelp-share"
                           target="_blank" title="Yelp" aria-label="Yelp">
                            <i class="fa fa-yelp" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
                    <li style="display: none;">
                        <a href="mailto:"
                           data-property="email-share"
                           target="_blank" title="Email" aria-label="Email">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
                    <li style="display: none;">
                        <a href="https://www.tiktok.com/"
                           data-property="tiktok-share"
                           target="_blank" title="TikTok" aria-label="TikTok">
                            <i class="icon-syvo icon-tik-tok" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
                    <li style="display: none;">
                        <a href="https://www.theknot.com/"
                           data-property="theknot-share"
                           target="_blank" title="TheKnot" aria-label="TheKnot">
                            <i class="icon-syvo icon-theknot-k" aria-hidden="true"></i>
                            <span></span>
                        </a>
                    </li>
    </ul>
</div>
                </div>
                <div class="option hidden-gt-sm"></div>
            </div>
        </div>
    </div>
</div>


</div>
</div>
</div>
</section>
<section class="section-header">
    <div class="container">
        <div class="row">
            <div class="header">
                <h2>We Think You'll Love:</h2>
            </div>
        </div>
    </div>
</section>
<section class="section-recommended section-related" aria-label="Related Products">
    <div class="container">
        <div class="row">
            <div class="recommended-products related-products" data-property="related-products">
               <div class="product-list">
                    <div class="list" data-list="products" role="region" aria-label="Product List">
                        @foreach ($gallery as $item)
                            <div class="list-item" data-layout-width aria-label="Masal Style #Y213BODYSUIT">
                                <div class="product product-simple mc-item" data-property="parent" data-product-id="300">
                                    <a href="#" class="product-image has-background"
                                        style="background-image: url({{ asset('images/'.$item->image1) }})" data-img="default">
                                        <img src="{{ asset('images/'.$item->image1) }}" alt="Masal Style #Y213BODYSUIT"/>
                                    </a>
                                    <div class="descriptions">
                                        <div class="description description-title">
                                            <h4 title="Masal Style #{{ $item->styleNumber }}">
                                            <span data-layout-font="">#{{ $item->styleNumber }}</span>
                                            </h4>
                                            <h5 title="Masal Style #{{ $item->styleNumber }}">
                                            <span data-layout-font="">Masal</span>
                                            </h5>
                                        </div>
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
<script>
    $('.image2').click(function()
    {
      $('.main_top_1').attr('style','background-image: url({{ asset($image6) }})');
      $('.main_top_2').attr('href','{{ asset($image6) }}');
      $('.main_top_3').attr('data-lazy','{{ asset($image6) }}');
      $('.main_top_3').attr('src','{{ asset($image6) }}');
    });
</script>
<script src="{{ asset('js/theme.min0368.js') }}"></script>
<script>
jQuery(function($) {
window.Syvo.Google_Analytics.load({"TrackingCode":"UA-11484610-13","Event":2,"Parameters":{"Style":"Y118JKT","Name":"Masal Y118JKT","Brand":"Masal/Accessories","Variant":null,"List":null,"Price":null,"Quantity":null,"Position":null,"Id":null}});
});
</script>
<script>
if (typeof $.cookie === "function") {$.cookie.defaults = {secure:true,path: '/'};}
var common_settings = {
currencies: [{"Currency":0,"Format":"$0.00"}],
checkoutCurrencyIndex: 0,
isMobile: false,
isAuthenticated: false
};
</script>
<script>
jQuery(function ($) {
window.Syvo.Search.load();
window.Syvo.Popups.load();
window.Syvo.Subscribe.load({ url: '/subscribe' });
});
</script>
<script>
jQuery(function ($) {
$("#privacyPolicyAcceptance button").click(function () {
$.cookie("privacyPolicyAccepted", true, { expires: 365, path: "/"});
$("#privacyPolicyAcceptance").fadeOut();
});
});
</script>
<script>
jQuery(function($) {
var initSlickDots, moveSlickDots;
var appendOverviewsDots = ".previews";
window.Syvo.Product_Views.load({
previews: {
slidesToScroll: 1,
slidesToShow: 5,
responsive: null,
infinite: false
},
overviews: {
keepViewsVisible: true,
slidesToShow: 2,
slidesToScroll: 1,
fade: false,
infinite: true,
magicZoom: {
zoomOn: "hover",
hint: false,
rightClick: false,
refreshOnSlideChange: false
},
responsive: [
{
breakpoint: 992,
settings: {
arrows: false,
prevArrow: "<div class='slick-arrow slick-prev products-arrow'><span class='arrow'></span></div>",
nextArrow: "<div class='slick-arrow slick-next products-arrow'><span class='arrow'></span></div>",
slidesToShow: 1,
slidesToScroll: 1,
adaptiveHeight: false,
dots:true,
appendDots: appendOverviewsDots
}
}
]
},
previewVideos: {
selector: "[data-list='preview-videos']",
asNavFor: "[data-list='overview-videos']",
rightClick: true,
infinite: false,
vertical: true,
verticalSwiping: true,
focusOnSelect: true,
dots: false,
arrows: false
},
overviewVideos: {
selector: "[data-list='overview-videos']",
asNavFor: "[data-list='preview-videos']",
rightClick: true,
infinite: false,
fade: true,
slidesToShow: 1,
slidesToScroll: 1,
focusOnSelect: false,
arrows: false,
dots: false
},
callback: function () {
var previewSlick = $("[data-list='previews']");
var previewItems = previewSlick.find(".preview");
if (!previewItems || previewItems.length <= 0)
return;
previewItems
.click(
function (e) {
var currentIndex = $.inArray(this, previewItems);
if(currentIndex === 0){
var overviewsSlick = $("[data-list='overviews']");
overviewsSlick.slick('slickGoTo', currentIndex);
}
}
);
}
}
);
}
);
</script>
<script>
jQuery(function ($) {
window.Syvo.Color_List.load({
colorNumber: 6
});
});
</script>
<script>
jQuery(function($) {
window.Syvo.Forms_v2.load();
var description = $("[data-property='description']").html();
description = description ? description.trim() : "";
window.Syvo.Product_Details.load({
urls: {
add: "/cart/add",
addToWishList:"/wishlist/add"
},
productId: 473,
productStockModel: [{"ColorId":11,"ColorName":"White","SizeId":16,"SizeName":"24","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14861},{"ColorId":14,"ColorName":"Ivory","SizeId":16,"SizeName":"24","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14862},{"ColorId":14,"ColorName":"Ivory","SizeId":15,"SizeName":"22","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14863},{"ColorId":14,"ColorName":"Ivory","SizeId":14,"SizeName":"20","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14864},{"ColorId":14,"ColorName":"Ivory","SizeId":13,"SizeName":"18","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14865},{"ColorId":14,"ColorName":"Ivory","SizeId":12,"SizeName":"16","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14866},{"ColorId":14,"ColorName":"Ivory","SizeId":11,"SizeName":"14","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14867},{"ColorId":14,"ColorName":"Ivory","SizeId":10,"SizeName":"12","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14868},{"ColorId":14,"ColorName":"Ivory","SizeId":9,"SizeName":"10","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14869},{"ColorId":14,"ColorName":"Ivory","SizeId":8,"SizeName":"8","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14870},{"ColorId":14,"ColorName":"Ivory","SizeId":7,"SizeName":"6","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14871},{"ColorId":14,"ColorName":"Ivory","SizeId":6,"SizeName":"4","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14872},{"ColorId":14,"ColorName":"Ivory","SizeId":5,"SizeName":"2","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14873},{"ColorId":14,"ColorName":"Ivory","SizeId":3,"SizeName":"0","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14874},{"ColorId":11,"ColorName":"White","SizeId":18,"SizeName":"28","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14875},{"ColorId":11,"ColorName":"White","SizeId":17,"SizeName":"26","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14876},{"ColorId":14,"ColorName":"Ivory","SizeId":18,"SizeName":"28","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14877},{"ColorId":11,"ColorName":"White","SizeId":15,"SizeName":"22","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14878},{"ColorId":11,"ColorName":"White","SizeId":3,"SizeName":"0","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14879},{"ColorId":11,"ColorName":"White","SizeId":5,"SizeName":"2","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14880},{"ColorId":11,"ColorName":"White","SizeId":6,"SizeName":"4","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14881},{"ColorId":14,"ColorName":"Ivory","SizeId":17,"SizeName":"26","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14882},{"ColorId":11,"ColorName":"White","SizeId":8,"SizeName":"8","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14883},{"ColorId":11,"ColorName":"White","SizeId":7,"SizeName":"6","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14884},{"ColorId":11,"ColorName":"White","SizeId":10,"SizeName":"12","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14885},{"ColorId":11,"ColorName":"White","SizeId":11,"SizeName":"14","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14886},{"ColorId":11,"ColorName":"White","SizeId":12,"SizeName":"16","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14887},{"ColorId":11,"ColorName":"White","SizeId":13,"SizeName":"18","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14888},{"ColorId":11,"ColorName":"White","SizeId":14,"SizeName":"20","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14889},{"ColorId":11,"ColorName":"White","SizeId":9,"SizeName":"10","UnitsAvailableInWarehouse":0,"UnitsAvailableInStore":0,"AvailableDate":null,"ShowAvailableOnlineOnlyText":false,"Prices":[],"ShowOnline":false,"Id":14890}],
prices: [],
style: 'Masal Style #Y118JKT',
ecommerceEnable: false,
purchasable: true,
disableColorClass: "hidden",
unavailableColorClass: "disabled",
unavailableColorAttr: "disabled",
disableSizeClass: "hidden",
unavailableSizeClass: "disabled",
unavailableSizeAttr: "disabled",
activeControlClass: "active",
disableCartClass: "disabled",
more: {
description: description,
lettersAllowed: 500,
overlayColor: "#fff"
},
hideSizesIfUnavailable: false,
isCompoundProduct: false,
customAvailabilityMessagesEnabled: false,
updateColorTextEnabled: false,
multiStoring: false,
availabilities: {
available: "Available",
notAvailable: "Not Available",
inStore: "in store",
online: "online",
separator: " and ",
onlineOnly: "online only",
fullOnline: "", //Live inventory unavailable. Estimated ship dates may vary
date: "Available date: {0}"
},
localizedMessages: {
separator: " and ",
color: "color",
size: "size",
more: "More",
less: "Less"
},
availabilityMode: null,
cartTooltip: {
availabilityHeaderText: "Ship date:",
chooseHeaderText: "Please select your",
componentsHeaderText: "Please select colors of"
},
quantityTooltip: {
availableItemsCountHeaderText: " item(s) available"
}
});
});

</script>


<script>
jQuery(function ($) {
var description = $("[data-property='description']").html();
description = description || "";
var whatsUp = false;
var pinAny = null;
var tw = null;




pinAny = {
images: ["https://dy9ihb9itgy3g.cloudfront.net/products/2508/y118jkt/y118jkt_f_d.2000.jpg","https://dy9ihb9itgy3g.cloudfront.net/products/2508/y118jkt/y118jkt_b.2000.jpg"]
};


tw = {
message: "Masal Style #Y118JKT - visit our website to discover the latest collection and find your nearest Masal retailer!",
via: "SophiaTolli"
};

window.Syvo.Social_Networks.load({
single: {
url: "https://www.sophiatolli.com/sophia-tolli/accessories/y118jkt",
title: "Masal Style #Y118JKT",
image: "https://dy9ihb9itgy3g.cloudfront.net/products/2508/y118jkt/y118jkt_f_d.670.jpg",
description: description,
fb: {appId: "331370691567172"},
pinterest:{
description: "Masal Style #Y118JKT" + ". Description: " + description.replace(/\.$/, "") + "." + " Details: Fabric: Lace, Tulle;Length: Long;Sleeve Type: Three-Quarter Sleeve",
pinAny: pinAny
},
email: {
url:"/emailshare/share",
data: {
entityId: $("[data-product-id]").data("productId"),
shareType: 1
}
},
whatsApp: whatsUp,
tw: tw
},
customPopupWindowSize: function () {
var viewPort = $.getCurrentViewport();
var windowWidth = viewPort.width - 2 * 50,   // 50 padding
windowHeight = viewPort.height - 2 * 30; // 30 padding

var width = windowWidth > 767 ? 767 : windowWidth,
height = windowHeight > 970 ? 970 : windowHeight;

return { width, height };
}
});
});
</script>

<script>
jQuery(function ($) {
window.Syvo.Product.load({
slider: false,
backface: false
});
});
</script>
<script>
jQuery(function($) {
var recommendedProductsOptions = {};


window.Syvo.Recommended_Products.load($.extend(true, {}, recommendedProductsOptions, {
slider: {
slidesToShow: 4,
infinite: true,
responsive: [{
breakpoint: 992,
settings: {
slidesToShow: 1,
centerMode: true,
centerPadding: '40%'
}
}]
} 
}));
});
</script>
<script>
jQuery(function ($) {
window.Syvo.Login_Attempt.load({
controls: 
{
selector: "[data-trigger=add-wishlist], [data-property=wishlist-header]"
}
});
});
</script>





@endsection