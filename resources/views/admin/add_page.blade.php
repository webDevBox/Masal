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
    
        <div class=" row" >
            <div class="col-md-4 offset-md-4" style=" margin-top:30px; border: 1px solid black; background-color: rgb(253, 253, 253);  box-shadow: 5px 5px 5px 5px #C0BCBC;">
            <div class="block full" style="padding: 50px;">
            
            <!-- eShop Overview Title -->
            
            <div class="block-title">
            <h2 class="text-center"><strong>Add New</strong> Page </h2>
            @if(Session::has('success'))

            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            
            @endif
            
            @if(Session::has('error'))
            
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            
            @endif
            </div>
            
            <!-- END eShop Overview Title -->
            <form action="{{route('add_page')}}" method="POST">
                @csrf
                <div class="row">
                <div class="form-group">
                <label class="col-md-12 control-label"> Enter Page Name <span style="color: red"> * </span></label>
                <div class="col-md-12">
                <input type="text" placeholder="Enter Page Name" name="page" class="form-control" required>
                </div>
                </div>
                </div>
                
                
                <div class="row">
                <div class="form-group">
                <label class="col-md-12 control-label"> Enter Page Title <span style="color: red"> * </span></label>
                <div class="col-md-12">
                <input type="text" placeholder="Enter Page Title" name="title" class="form-control" required>
                </div>
                </div>
                </div>
            
                <div class="row">
                <div class="form-group">
                <label class="col-md-12 control-label"> Enter Page Keywords <span style="color: red"> * </span></label>
                <div class="col-md-12">
                <input type="text" id="product_name" name="key" class="form-control" placeholder="Enter product Keyword with , Separation.." required>
                </div>
                </div>
                </div>
               
                    <center>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary"> 
            </center>
                </form>
            
            </div>
            
            </div>
            </div>
            
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>

@endsection