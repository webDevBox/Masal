@extends('layout.retailer')
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
    <div class="row match-height">
    <!-- Medal Card -->
    @php
    $star=Auth::user()->star;
    @endphp
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="card card-congratulation-medal">
          <div class="card-body">
              <h5>  @if($star == 0) Welcome @else Congratulations 🎉 @endif{{ Auth::user()->name }}</h5>
              <p class="card-text font-small-3" style="text-align: justify;width: 80%">
                @if($star == 0)
                 When your order reaches the total of 10 quantity, you will get your first bride star which gives you a 3% discount that be applied to your orders automatically on check out.
                @else
                You have {{ $star }} Bride Stars and save @if($star == 1) 3% @elseif($star == 2) 5%  @elseif($star == 3) 7% @elseif($star == 4) 10% @else 15%  @endif discount on check out automatically.
              </p>
                <h3 class="mb-75 mt-2 pt-50" style="text-align: justify;width: 80%">
                  <a href="javascript:void(0);"> You need to achieve 
                    @if($star == 1) 100 @elseif($star == 2) 1000  @elseif($star == 3) 2000  @elseif($star == 4) 5000  @endif orders quantity to have
                    @if($star == 1) 2 @elseif($star == 2) 3  @elseif($star == 3) 4  @elseif($star == 4) 5  @endif Bride Stars that saves you
                    @if($star == 1) 5% @elseif($star == 2) 7%  @elseif($star == 3) 10%  @elseif($star == 4) 15%  @endif 
                      on checkout automatically.</a>
              </h3>
               

                @endif         
             
              
              <img src="{{ asset('app-assets/images/illustration/badge.svg') }}" class="congratulation-medal" />
          </div>
      </div>
  </div>
    

  <div class="col-sm-4 col-xs-4 col-lg-2 col-md-2">     
    <div class="card  text-center  " > 
    <div class="card-body pb-50">
    <h3 style="margin-top: 20px;" >Order This Month</h3> 
    <h2 class="font-weight-bolder mb-1" style="margin-top: 30px;" > 276</h2>
    <!-- <div id="statistics-order-chart"></div> -->
    </div>
    </div>
    </div>
    <!--/ Bar Chart - Orders -->
    
    <!-- Line Chart - Profit -->
    <div class="col-sm-4 col-xs-4 col-lg-2 col-md-2">     
      <div class="card  text-center " >
        <div class="card-body pb-50">
        <h3 style="margin-top: 20px;" >Order Last Month</h3> 
        <h2 class="font-weight-bolder mb-1" style="margin-top: 30px;" > 500 </h2>
        <!-- <div id="statistics-order-chart"></div> -->
        </div>
        </div>
        </div>
    <!--/ Line Chart - Profit -->
    
    <!-- Earnings Card -->
    <div class="col-sm-4 col-xs-4 col-lg-2 col-md-2">     
      <div class="card  text-center " >
        <div class="card-body pb-50">
        <h3 style="margin-top: 20px;" >Order Today</h3> 
        <h2 class="font-weight-bolder mb-1" style="margin-top: 30px;" > 500 </h2>
        <!-- <div id="statistics-order-chart"></div> -->
        </div>
        </div>
        </div>

    
    </div>
    
    <div class="row match-height">
    <div class="col-lg-4 col-12">
    <div class="row match-height">
    <!-- Bar Chart - Orders -->
    
    <!--/ Earnings Card -->
    </div>
    </div>
    
    <!-- Revenue Report Card -->
    <div class="col-lg-8 col-12">
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
          
            <!--Controls-->
            <div class="controls-top text-center">
              <a class="btn-floating float-md-left badge badge-primary badge-glow" href="#multi-item-example" data-slide="prev"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
              <a class=" btn-floating float-md-right badge badge-primary badge-glow" href="#multi-item-example" data-slide="next"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </div>
     
            <!--/.Controls-->
      
            <!--Indicators-->
          
            <ol class="carousel-indicators">
              <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
              <li data-target="#multi-item-example" data-slide-to="1"></li>
              <li data-target="#multi-item-example" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->
      
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
      
              <!--First slide-->
              <div class="carousel-item active">
      
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <img   class="card-img-top" src="images/trunk-img.jpeg"
                        alt="Card image cap">
                        <div class="card-body badge-glow badge-primary">
                            <a href=""> <h4 style="color: white;">Real bride</h4></a>
                            <a href=""></a>  <p class="card-text">Style# fdgdfh65454fgh</p></a>
                            <p class="card-text"></p>
                           
                          </div>
                    </div>
                  </div>
      
                  <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card mb-2">
                      <img style="" class="card-img-top" src="images/new2.jpeg"
                        alt="Card image cap">
                        <div class="card-body badge-glow badge-primary">
                            <a href=""> <h4 style="color: white;">Real bride</h4></a>
                            <a href=""></a>  <p class="card-text">Style# fdgdfh65454fgh</p></a>
                            <p class="card-text"></p>
                           
                          </div>
                    </div>
                  </div>
      
                  <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card mb-2">
                      <img class="card-img-top" src="images/new1.jpeg"
                        alt="Card image cap">
                        <div class="card-body badge-glow badge-primary">
                            <a href=""> <h4 style="color: white;">Real bride</h4></a>
                            <a href=""></a>  <p class="card-text">Style# fdgdfh65454fgh</p></a>
                            <p class="card-text"></p>
                           
                          </div>
                    </div>
                  </div>
                </div>
      
              </div>
              <!--/.First slide-->
      
              <!--Second slide-->
              <div class="carousel-item">
      
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <img class="card-img-top" src="masal.png"
                        alt="Card image cap">
                        <div class="card-body badge-glow badge-primary">
                            <a href=""> <h4 style="color: white;">Real bride</h4></a>
                            <a href=""></a>  <p class="card-text">Style# fdgdfh65454fgh</p></a>
                            <p class="card-text"></p>
                           
                          </div>
                    </div>
                  </div>
      
                  <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card mb-2">
                      <img class="card-img-top" src="masal.png"
                        alt="Card image cap">
                        <div class="card-body badge-glow badge-primary">
                            <a href=""> <h4 style="color: white;">Real bride</h4></a>
                            <a href=""></a>  <p class="card-text">Style# fdgdfh65454fgh</p></a>
                            <p class="card-text"></p>
                           
                          </div>
                    </div>
                  </div>
      
                  <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card mb-2">
                      <img class="card-img-top" src="masal.png"
                        alt="Card image cap">
                        <div class="card-body badge-glow badge-primary">
                            <a href=""> <h4 style="color: white;">Real bride</h4></a>
                            <a href=""></a>  <p class="card-text">Style# fdgdfh65454fgh</p></a>
                            <p class="card-text"></p>
                           
                          </div>
                    </div>
                  </div>
                </div>
      
              </div>
              <!--/.Second slide-->
      
              <!--Third slide-->
              <div class="carousel-item">
      
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <img class="card-img-top" src="masal.png"
                        alt="Card image cap">
                        <div class="card-body badge-glow badge-primary">
                            <a href=""> <h4 style="color: white;">Real bride</h4></a>
                            <a href=""></a>  <p class="card-text">Style# fdgdfh65454fgh</p></a>
                            <p class="card-text"></p>
                           
                          </div>
                    </div>
                  </div>
      
                  <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card mb-2">
                      <img class="card-img-top" src="masal.png"
                        alt="Card image cap">
                        <div class="card-body badge-glow badge-primary">
                            <a href=""> <h4 style="color: white;">Real bride</h4></a>
                            <a href=""></a>  <p class="card-text">Style# fdgdfh65454fgh</p></a>
                            <p class="card-text"></p>
                           
                          </div>
                    </div>
                  </div>
      
                  <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card mb-2">
                      <img class="card-img-top" src="masal.png"
                        alt="Card image cap">
                        <div class="card-body badge-glow badge-primary">
                            <a href=""> <h4 style="color: white;">Real bride</h4></a>
                            <a href=""></a>  <p class="card-text">Style# fdgdfh65454fgh</p></a>
                            <p class="card-text"></p>
                           
                          </div>
                          
                    </div>
                  </div>
                  
                </div>
               
              </div>
              <!--/.Third slide-->
              
            </div>
            <!--/.Slides-->
          
          </div>
          <!--/.Carousel Wrapper-->
        
        </div>
    </div>
    <!--/ Revenue Report Card -->
    </div>
    
    
    </section>
    
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>

@endsection