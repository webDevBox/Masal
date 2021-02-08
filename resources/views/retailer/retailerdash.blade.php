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
              <p class="card-text font-small-3" style="text-align: justify;width: 80%; color:#A6A4B0">
                @if($star == 0)
                 When your order reaches the total of 10 quantity, you will get your first bride star which gives you a 3% discount that be applied to your orders automatically on check out.
                @else
                You have {{ $star }} Bride Stars and save @if($star == 1) 3% @elseif($star == 2) 5%  @elseif($star == 3) 7% @elseif($star == 4) 10% @else 15%  @endif discount on check out automatically.
              </p>
                <p class="mb-75 mt-2 pt-50" style="text-align: justify;width: 80%">
                  <a href="javascript:void(0);"> You need to achieve 
                    @if($star == 1) 100 @elseif($star == 2) 1000  @elseif($star == 3) 2000  @elseif($star == 4) 5000  @endif orders quantity to have
                    @if($star == 1) 2 @elseif($star == 2) 3  @elseif($star == 3) 4  @elseif($star == 4) 5  @endif Bride Stars that saves you
                    @if($star == 1) 5% @elseif($star == 2) 7%  @elseif($star == 3) 10%  @elseif($star == 4) 15%  @endif 
                      on checkout automatically.</a>
              </p>
                @endif     
              <img src="{{ asset('app-assets/images/illustration/badge.svg') }}" class="congratulation-medal" />
          </div>
      </div>
  </div>
    

  <div class="col-sm-4 col-xs-4 col-lg-2 col-md-2">     
    <div class="card  text-center  " > 
    <div class="card-body pb-50">
    <p style="margin-top: 20px;" >Order This Month</p> 
    <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367F0;" > {{ $monthOrder }}</h2>
    <!-- <div id="statistics-order-chart"></div> -->
    </div>
    </div>
    </div>
    <!--/ Bar Chart - Orders -->
    
    <!-- Line Chart - Profit -->
    <div class="col-sm-4 col-xs-4 col-lg-2 col-md-2">     
      <div class="card  text-center " >
        <div class="card-body pb-50">
        <p style="margin-top: 20px;" >Order Last Month</p> 
        <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367F0;" > {{ $lastmonthOrder }} </h2>
        <!-- <div id="statistics-order-chart"></div> -->
        </div>
        </div>
        </div>
    <!--/ Line Chart - Profit -->
    
    <!-- Earnings Card -->
    <div class="col-sm-4 col-xs-4 col-lg-2 col-md-2">     
      <div class="card  text-center " >
        <div class="card-body pb-50">
        <p style="margin-top: 20px;" >Order Today</p> 
        <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367F0;" > {{ $todayOrder }} </h2>
        <!-- <div id="statistics-order-chart"></div> -->
        </div>
        </div>
        </div>

    
    </div>
    

    @php
        $count=0;
         foreach($collection as $row)
         {
            $prod[$count]=\App\products::where('delete_status',0)->where('category',$row->id)->count();
            $image[$count]=$row->image;
            $name[$count]=$row->name;
            $id[$count]=$row->id;
            $count++;
         }
    @endphp

    <div class="row match-height">
  
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
        <h2 class="text-center"> Latest Collections </h2>
                  @if(Session::has('success'))
                  <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                  @endif
                  @if(Session::has('error'))
                  <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                  @endif
        <!--Controls-->
        <div class="controls-top text-center">
          <a style="margin-bottom: 10px;" class="btn-floating float-md-left badge badge-primary badge-glow" href="#multi-item-example" data-slide="prev"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
          <a style="margin-bottom: 10px;" class=" btn-floating float-md-right badge badge-primary badge-glow" href="#multi-item-example" data-slide="next"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
 
        <!--/.Controls-->
  
        <!--Indicators-->
      
        {{-- <ol class="carousel-indicators">
          <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
          <li data-target="#multi-item-example" data-slide-to="1"></li>
        </ol> --}}
        <!--/.Indicators-->
  
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
  
          <!--First slide-->
          <div class="carousel-item active">
  
            <div class="row">
              <div class="col-md-3">
                <a href="{{ route('go_cat',array('id'=>$id[0])) }}">
                <div class="card mb-2">
                  <img class="card-img-top" style="height:350px;" src="{{ asset('images/'.$image[0]) }}">
                    <div class="card-body badge-glow badge-primary">
                        <h4 class="text-uppercase text-center text-white">{{ $name[0] }}</h4>
                        <h6 class="text-center text-white"> Total Products: {{ $prod[0] }}</h6>
                       
                      </div>
                </div>
              </a>
              </div>
           
  
              <div class="col-md-3 ">
                <a href="{{ route('go_cat',array('id'=>$id[1])) }}">
                <div class="card mb-2">
                  <img class="card-img-top" style="height:350px;" src="{{ asset('images/'.$image[1]) }}">
                    <div class="card-body badge-glow badge-primary">
                        <h4 class="text-uppercase text-center text-white">{{ $name[1] }}</h4>
                        <p class="text-center text-white"> Total Products: {{ $prod[1] }}</p>
                       
                      </div>
                </div>
                </a>
              </div>
  
              <div class="col-md-3 ">
                <a href="{{ route('go_cat',array('id'=>$id[2])) }}">
                <div class="card mb-2">
                  <img class="card-img-top" style="height:350px;" src="{{ asset('images/'.$image[2]) }}">
                    <div class="card-body badge-glow badge-primary">
                         <h4 class="text-uppercase text-center text-white">{{ $name[2] }}</h4>
                        <p class="text-center text-white"> Total Products: {{ $prod[2] }}</p>
                       
                      </div>
                </div>
                </a>
              </div>

              <div class="col-md-3">
                <a href="{{ route('go_cat',array('id'=>$id[3])) }}">
                <div class="card mb-2">
                  <img class="card-img-top" style="height:350px;" src="{{ asset('images/'.$image[3]) }}">
                    <div class="card-body badge-glow badge-primary">
                        <h4 class="text-uppercase text-center text-white">{{ $name[3] }}</h4>
                        <p class="text-center text-white"> Total Products: {{ $prod[3] }}</p>
                       
                      </div>
                </div>
                </a>
              </div>
            </div>
  
          </div>
          <!--/.First slide-->
  
          <!--Second slide-->
          <div class="carousel-item">
  
            <div class="row">
             
  
              <div class="col-md-3 ">
                <a href="{{ route('go_cat',array('id'=>$id[4])) }}">
                <div class="card mb-2">
                  <img class="card-img-top" style="height:350px;" src="{{ asset('images/'.$image[4]) }}">
                    <div class="card-body badge-glow badge-primary">
                        <h4 class="text-uppercase text-center text-white">{{ $name[4] }}</h4>
                        <p class="text-center text-white"> Total Products: {{ $prod[4] }}</p>
                       
                      </div>
                </div>
                </a>
              </div>
  
              <div class="col-md-3 ">
                <a href="{{ route('go_cat',array('id'=>$id[5])) }}">
                <div class="card mb-2">
                  <img class="card-img-top" style="height:350px;" src="{{ asset('images/'.$image[5]) }}">
                    <div class="card-body badge-glow badge-primary">
                         <h4 class="text-uppercase text-center text-white">{{ $name[5] }}</h4>
                        <p class="text-center text-white"> Total Products: {{ $prod[5] }}</p>
                       
                      </div>
                </div>
                </a>
              </div>

              <div class="col-md-3">
                <a href="{{ route('go_cat',array('id'=>$id[6])) }}">
                <div class="card mb-2">
                  <img class="card-img-top" style="height:350px;" src="{{ asset('images/'.$image[6]) }}">
                    <div class="card-body badge-glow badge-primary">
                      <h4 class="text-uppercase text-center text-white">{{ $name[6] }} </h4>
                        <p class="text-center text-white"> Total Products: {{ $prod[6] }}</p>
                       
                      </div>
                </div>
                </a>
              </div>

              <div class="col-md-3 ">
                <a href="{{ route('go_cat',array('id'=>$id[7])) }}">
                <div class="card mb-2">
                  <img class="card-img-top" style="height:350px;" src="{{ asset('images/'.$image[7]) }}">
                    <div class="card-body badge-glow badge-primary">
                         <h4 class="text-uppercase text-center text-white">{{ $name[7] }} </h4>
                        <p class="text-center text-white"> Total Products: {{ $prod[7] }}</p>
                       
                      </div>
                </div>
                </a>
              </div>
  
             


            </div>
  
          </div>
         
          
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