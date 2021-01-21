@extends('layout.web')
@section('content')

<div class="main-content" id="main" role="main">


    <div class="listing-cmp common-cmp bootstrap-iso  moncheri-cmp">
    
    
    
    <section class="section-listing section-listing-moncheri">
    <div class="container">
    <div class="row">
    
    
    
    <div class="listing-content listing-moncheri listing-content-main">
    <div class="list">
    <div class="list-item hidden-gt-sm">
    
    
    
    <div class="showcase plp-hero">
    <div class="content-blocks">
    
    <div class="content-block content-title">
    <h2
    role="heading" aria-level="1">
    Modern Romance
    </h2>
    </div>
    <div class="content-block content-count">
    <p>
    79 items
    </p>
    </div>
    
    
    
    
    </div>
    </div>
    
    </div>
    
    <div class="list-item filter-controls-item hidden-gt-sm">
    <div class="control-panels">
    <div class="control-panel mobile-filter-buttons">
        <div class="list">
            <div class="list-item">
                <label class="mobile-control control btn-filter"
                        toggle-accordeon=".filters-accordeon">
                    <span>Filter By</span>
                    <i class="icon-syvo icon-chevron-down sign" aria-hidden="true"></i>
                </label>
            </div>
        </div>
    </div>
    </div>
    </div>
    
    <div class="list-item layout-controls-item hidden-gt-sm">
    <div class="control-panels">
    
    <div class="control-panel layout-controls">
    <div class="list" role="list" 
    aria-label="Layout Controls">
    <div class="list-item" 
    role="listitem">
    <span
    class="layout-control control active" 
    data-layout-col="3" 
    role="button"
    aria-label="Switch layout to 3 columns">
    <i class="icon-syvo icon-layout-row-col-3" aria-hidden="true"></i>
    </span>
    </div>
    <div class="list-item" 
    role="listitem">
    <span
    class="layout-control control" 
    data-layout-col="2" 
    role="button"
    aria-label="Switch layout to 2 columns">
    <i class="icon-syvo icon-layout-row-col-2" aria-hidden="true"></i>
    </span>
    </div>
    <div class="list-item" 
    role="listitem">
    <span
    class="layout-control control" 
    role="button"
    data-layout-col="1" 
    aria-label="Switch layout to 1 columns">
    <i class="icon-syvo icon-layout-col-1" aria-hidden="true"></i>
    </span>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    
    
    
    <div class="list-item desktop-left">
    <div class="control-panels">
    
    <div class="control-panels aside-filters has-sticky-submit" data-property="sticky-submit-parent">
    <div class="control-panel hidden-xs hidden-sm">
    <div class="control-heading">
    <h2>Filter By</h2>
    </div>
    </div>
    
    <form action="{{route('filter',array('id'=>$cat->id))}}" method="POST">
        @csrf
    <div class="control-panel filters-accordeon" plp-filter>
    <div class="panel-group">
    
    <div class="panel" id="attributeFabric">
    <div class="panel-heading has-dropdown">
    <span>Fabric</span>
    </div>
    <div id="attribute0" class="panel-collapse collapse in">
    <div class="panel-body attrs">
    <ul class="checkbox-list filter-list size-buttons">
        @foreach ($fabric as $item)
    <li>
        <label class="pretty-input filter-input">
            <input name="fabric[]"
                    type="checkbox"
                    value="{{$item->id}}"
                    data-property="attrs"
                    data-value="57"
                    aria-label="Attribute: Chiffon">
            <i class="fake" aria-hidden="true"></i>
            <span>{{$item->name}}</span>
        </label>
    </li>
   @endforeach
   
    </ul>
    </div>
    </div>
    </div>
    <div class="panel" id="attributeNeckline">
    <div class="panel-heading has-dropdown">
    <span>Neckline</span>
    </div>
    <div id="attribute1" class="panel-collapse collapse in">
    <div class="panel-body attrs">
    <ul class="checkbox-list filter-list size-buttons">

        @foreach ($neck as $item)
    <li>
        <label class="pretty-input filter-input">
            <input name="neckline[]"
                    type="checkbox"
                    value="{{$item->id}}"
                    data-property="attrs"
                    data-value="167"
                    aria-label="Attribute: Bateau">
            <i class="fake" aria-hidden="true"></i>
            <span>{{$item->name}}</span>
        </label>
    </li>
    @endforeach

    </ul>
    </div>
    </div>
    </div>
    <div class="panel" id="attributeSilhouette">
    <div class="panel-heading has-dropdown">
    <span>Silhouette</span>
    <div class="dropdown dropdown-info">
    <span class="info-addon" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" aria-label="Open Silhouette Info Popup">
  
    </span>
    <div class="dropdown-menu silhouette-menu">
    <span class="fl-right close-dropdown"
            data-trigger="cart"
            role="button"
            aria-label="Close Silhouette Filter"
            aria-haspopup="false" 
            aria-expanded="false"
            aria-hidden="true">
    </span>
    </div>
    </div>
    </div>
    <div id="attribute2" class="panel-collapse collapse in">
    <div class="panel-body attrs">
    <ul class="checkbox-list filter-list size-buttons">

        @foreach ($silhouette as $item)
        <li>
            <label class="pretty-input filter-input">
                <input name="silhouette[]"
                        type="checkbox"
                        value="{{$item->id}}"
                        data-property="attrs"
                        data-value="47"
                        aria-label="Attribute: A-Line">
                <i class="fake" aria-hidden="true"></i>
                <span>{{$item->name}}</span>
            </label>
        </li>
        @endforeach
   
    
   
    </ul>
    </div>
    </div>
    </div>
    <div class="panel" id="attributeSleeve Type">
    <div class="panel-heading has-dropdown">
    <span>Sleeve Type</span>
    </div>
    <div id="attribute3" class="panel-collapse collapse in">
    <div class="panel-body attrs">
    <ul class="checkbox-list filter-list size-buttons">

        @foreach ($seleve as $item)
        <li>
            <label class="pretty-input filter-input">
                <input name="sleeve[]"
                        type="checkbox"
                        value="{{$item->id}}"
                        data-property="attrs"
                        data-value="14"
                        aria-label="Attribute: Cap Sleeve">
                <i class="fake" aria-hidden="true"></i>
                <span>{{$item->name}}</span>
            </label>
        </li>
        @endforeach
   
  
   
   
    </ul>
    </div>
    </div>
    </div>
    </div>
    <div class="control-btns sticky-submit" data-property="sticky-submit">
        <input type="submit" name="submit" value="Apply Filter" class="btn btn-success">
        <input type="reset" value="Reset" class="btn btn-success-invert">
    
    </div>
    </div>
    </form>
    </div>
    
    </div>
    </div>
    
    
    
    
    
    
    
    <div class="list-item hidden-sm hidden-xs">
    
    
    
    <div class="showcase plp-hero">
    <div class="content-blocks">
    
    <div class="content-block content-title">
    <h2
    role="heading" aria-level="1">
    {{$cat->name}}
    </h2>
    </div>
    <div class="content-block content-count">
    <p>
    {{count($products)}} items
    </p>
    </div>
    
    
    
    
    </div>
    </div>
    
    </div>
    
   
    <div class="list-item">
    
    <div class="product-list">
    <div class="list" data-list="products" 
    role="listbox" aria-label="Product List">
    

    @foreach ($products as $row)
    <div class="list-item" data-layout-width 
    role="option" aria-label="Masal Kalani">
    
    <div class="product mc-item" data-property="parent" data-product-id="522">
    <div class="product-images">
    <div class="product-images--list list" data-list="images">
    <div class="list-item">
    <a href="{{route('detail', array('id' => $row->id))}}" class="product-image has-background"
    aria-label="Go to Masal Kalani product details page"
    style="background:url({{asset('images/'.$row->image1)}});  background-size:cover;" data-img="default">
    <img src="{{ asset('images/'.$row->image1) }}" alt="Masal Kalani"/>
    </a>
    </div>
    </div>
    <div class="product-images--top controls controls-top controls-right">
    <div class="list">
    
    <div class="list-item">
    
    
    <div
    class="control btn color-favorite "
    data-trigger="add-wishlist" data-product-id="522">
   
    </div>
    </div>
    </div>
    </div>
    
    
    </div>
    <div class="descriptions">
    <div class="description description-title">
    
    <h4 title="Masal Kalani">
    <span data-layout-font="">{{$row->name}} | #{{$row->styleNumber}}</span>
    </h4>
    
    
    </div>
    <div class="description description-options description-prices placeholder">
    <div class="prices">
    <div class="list">
    <div class="list-item">
    <div class="price placeholder"></div>
    </div>
    </div>
    </div>
    </div>
    
    <div class="description description-options description-colors placeholder">
    <div class="colors">
    <div class="list">
    <div class="list-item">
    <div class="color placeholder"></div>
    </div>
    </div>
    </div>
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
    </div>
    </div>
    </section>
    
    
    <center>
    {{$products->links()}}
</center>
    
    </div>
    
    
    
    </div>

@endsection