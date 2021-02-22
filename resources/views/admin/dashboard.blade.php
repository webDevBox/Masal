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
  <div class="row match-height">
  <!-- Medal Card -->
  <div class="col-xl-4 col-md-6 col-12">
      <div class="card earnings-card">
          <div class="card-body">
          <div class="row">
              <div class="col-6" style="text-align: center;">
                  <h4 class="card-title mb-1">Earnings</h4>
                  <div class="font-small-2">This Month</div>
                  <h5 class="mb-1">${{ $amount }}</h5>
                  <p class="card-text text-muted font-small-2">
                      <span class="font-weight-bolder">{{ $stat }}</span>
                  </p>
              </div>
              <div class="col-6">
                  <div id="earnings-chart"></div>
                  <input type="text" id="percent" value="{{ $percent }}" style="display: none;">
              </div>
          </div>
          </div>
          </div>
  <!-- <div class="card card-congratulation-medal">
  <div class="card-body">
  <h5>Congratulations 🎉 John!</h5>
  <p class="card-text font-small-3">You have won gold medal</p>
  <h3 class="mb-75 mt-2 pt-50">
  <a href="javascript:void(0);">$48.9k</a>
  </h3>
  <button type="button" class="btn btn-primary">View Sales</button>
  <img src="app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
  </div>
  </div> -->
  </div>
  <!--/ Medal Card -->
  
  <!-- Statistics Card -->
  <div class="col-xl-8 col-md-6 col-12">
  <div class="card card-statistics">
  <div class="card-header">
  <h4 class="card-title">Statistics</h4>
  <div class="d-flex align-items-center">
  </div>
  </div>
  <div class="card-body statistics-body">
  <div class="row">
  <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
  <div class="media">
      <div class="avatar bg-light-primary mr-2">
          <div class="avatar-content">
              <i data-feather="trending-up" class="avatar-icon"></i>
          </div>
      </div>
      <div class="media-body my-auto">
          <h4 class="font-weight-bolder mb-0">{{ $stat_order }}</h4>
          <p class="card-text font-small-3 mb-0">Sales</p>
      </div>
  </div>
  </div>
  <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
  <div class="media">
      <div class="avatar bg-light-info mr-2">
          <div class="avatar-content">
              <i data-feather="user" class="avatar-icon"></i>
          </div>
      </div>
      <div class="media-body my-auto">
          <h4 class="font-weight-bolder mb-0">{{ $customer }}</h4>
          <p class="card-text font-small-3 mb-0">Customers</p>
      </div>
  </div>
  </div>
  <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
  <div class="media">
      <div class="avatar bg-light-danger mr-2">
          <div class="avatar-content">
              <i data-feather="box" class="avatar-icon"></i>
          </div>
      </div>
      <div class="media-body my-auto">
          <h4 class="font-weight-bolder mb-0">{{ $products }}</h4>
          <p class="card-text font-small-3 mb-0">Products</p>
      </div>
  </div>
  </div>
  <div class="col-xl-3 col-sm-6 col-12">
  <div class="media">
      <div class="avatar bg-light-success mr-2">
          <div class="avatar-content">
              <i data-feather="dollar-sign" class="avatar-icon"></i>
          </div>
      </div>
      <div class="media-body my-auto">
          <h4 class="font-weight-bolder mb-0">${{ $sale }}</h4>
          <p class="card-text font-small-3 mb-0">Revenue</p>
      </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <!--/ Statistics Card -->
  </div>
  
  <div class="row match-height">
  <div class="col-lg-4 col-12">
  <div class="row match-height">
  <!-- Bar Chart - Orders -->
  <div class="col-lg-6 col-md-3 col-6">
  <a href="{{route('dater',array('status'=>'month'))}}">     
  <div class="card  text-center " > 
  <div class="card-body pb-50">
  <p style="margin-top: 20px;" >This Month’s Order</p> 
  <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367F0; color:#7367F0; color:#7367F0;" > {{ $monthOrder }} </h2>
  <!-- <div id="statistics-order-chart"></div> -->
  </div>
  </div>
  </a>
  </div>
  <!--/ Bar Chart - Orders -->
  
  <!-- Line Chart - Profit -->
  <div class="col-lg-6 col-md-3 col-6">
      <a href="{{route('dater',array('status'=>'last'))}}">
      <div class="card  text-center " >
      <div class="card-body pb-50">
      <p style="margin-top: 20px;" >Last Month’s Order</p> 
      <h2 class="font-weight-bolder mb-1" style="margin-top: 30px; color:#7367F0; color:#7367F0;" > {{ $lastmonthOrder }} </h2>
      <!-- <div id="statistics-order-chart"></div> -->
      </div>
      </div>
      </a>
      </div>
  <!--/ Line Chart - Profit -->
  
  <!-- Earnings Card -->
  <div class="col-lg-6 col-md-3 col-6">
  <a href="#">    
  <div class="card earnings-card">
  <div class="card-body" >
  <div class="row">
      <div class="col-12 " style="text-align: center;">
          <p style="margin-top: px;">This Week's Orders</p>
          <h2 class="font-weight-bolder mb-1" style="margin-top: 20px; color:#7367F0;">{{ $weekOrder }}</h2>
      </div>
  </div>
  </div>
  </div>
  </a>
  </div>
  
  
  <div class="col-lg-6 col-md-3 col-6">
  <a href="{{route('dater',array('status'=>'today'))}}">    
  <div class="card earnings-card">
  <div class="card-body" >
  <div class="row">
      <div class="col-12 " style="text-align: center;">
          <p style="margin-top: px;">Today’s Orders</p>
          <h2 class="font-weight-bolder mb-1" style="margin-top: 20px; color:#7367F0;">{{ $todayOrder }}</h2>
      </div>
  </div>
  </div>
  </div>
  </a>
  </div>

  <!--/ Earnings Card -->
  </div>
  </div>
  
  <!-- Revenue Report Card -->
  <div class="col-lg-8 col-12">
  <div class="card card-revenue-budget">
  <div class="row mx-0">
  <div class="col-md-7 col-12 revenue-report-wrapper">
  <div class="d-sm-flex justify-content-between align-items-center mb-3">
  <h4 class="card-title mb-50 mb-sm-0">Graphical Statistics</h4>
  </div>
  <div id="revenue-report-chart"></div>
  <input type="text" id="order" value="{{ $stat_order }}" style="display: none;">
  <input type="text" id="product" value="{{ $products }}" style="display: none;">
  <input type="text" id="visit" value="{{ $visits }}" style="display: none;">
  <input type="text" id="customer" value="{{ $customer }}" style="display: none;">


  <input type="text" id="this_year" value="{{ $this_year_rev }}" style="display: none;">
  <input type="text" id="last_year" value="{{ $last_year_rev }}" style="display: none;">
  <input type="text" id="previous_year" value="{{ $previous_year_rev }}" style="display: none;">
  </div>
  <span style="background: #F1F2F2; height:350px; width:10px;"></span>
  <div class="col-md-4 col-12 budget-wrapper">
    <div class="d-sm-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title mb-50 mb-sm-0">Yearly Revenue</h4>
        </div>
  <div class="btn-group" style="zoom: 1.2;">
  <select  onchange="myFunction()" class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown" id="yearer">
      <option class="dropdown-item" value="this" selected> {{ $currentYear }} </option>
      <option class="dropdown-item" value="last"> {{ $lastYear }} </option>
      <option class="dropdown-item" value="previous"> {{ $previousYear }} </option>
  </select>

  </div>
  <h2 style="margin-top: 50px;" id="result">${{ $this_year_rev }}</h2>
  </div>


  </div>
  </div>
  </div>
  <!--/ Revenue Report Card -->
  </div>
  
  <div class="row match-height">
  <!-- Company Table Card -->
  <div class="col-lg-8 col-12">
  <div class="card card-company-table">
  <div class="card-body p-0">
  <div class="table-responsive">
  <table class="table">
  <thead>
      <tr>
          <th>Name</th>
          <th>Star</th>
          <th>Credits</th>
          <th>Purchases</th>
          <th>Weedings</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($retailer as $item)
      @php
          $order = \App\retailerOrder::where('RetailerId',$item->id)->get();
          $total=0;
          if(count($order) > 0)
          {
          foreach ($order as $key) {
              $product=\App\products::find($key->productId);
              $total=$total+$product->wholesalePrice;
          }
        }
        $wedding = \App\wedding::where('retailer',$item->id)->count();
      @endphp
      <tr>
          <td>
              <div class="d-flex align-items-center">
                  <div class="avatar rounded">
                      <div class="avatar-content">
                          @if($item->logo != null)
                          <img src="{{ asset('images/'.$item->logo) }}" style="width: 50px; height:50px; border-radius: 50%;" alt="Toolbar svg" />
                          @else
                          <img src="{{ asset('images/logos/abc.png') }}" style="width: 50px; height:50px; border-radius: 50%;" alt="Toolbar svg" />
                          @endif
                      </div>
                  </div>
                  <div>
                      <div class="font-weight-bolder">{{ $item->name }}</div>
                      <div class="font-small-2 text-muted">{{ $item->email }}</div>
                  </div>
              </div>
          </td>
          <td>
              <div class="d-flex align-items-center">
                  <div class="avatar bg-light-primary mr-1">
                      <div class="avatar-content">
                          <i data-feather="star" class="font-medium-3"></i>
                      </div>
                  </div>
                  <span>{{ $item->star }}</span>
              </div>
          </td>
          <td class="text-nowrap">
              <div class="d-flex flex-column">
                  <span class="font-weight-bolder mb-25">{{ $item->credit }}</span>
              </div>
          </td>
          <td>${{ $total }}</td>
          <td>
              <div class="d-flex align-items-center">
                  <span class="font-weight-bolder mr-1">{{ $wedding }}</span>
                 
              </div>
          </td>
      </tr>
       @endforeach
      
  </tbody>
  </table>
  </div>
  </div>
  </div>
  </div>
  <!--/ Company Table Card -->
  
  <!-- Developer Meetup Card -->
  
  
  
  
  
  <!--/ Browser States Card -->
  
  <!-- Goal Overview Card -->
  <div class="col-lg-4 col-md-6 col-12">
  <div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
  <h4 class="card-title">Orders Overview</h4>
  </div>
  <div class="card-body p-0">
  <div id="goal-overview-radial-bar-chart" class="my-2"></div>
  <input type="text" id="overview" value="{{ $order_over }}" style="display: none;">
  <div class="row border-top text-center mx-0">
  <div class="col-6 border-right py-1">
  <p class="card-text text-muted mb-0">Completed</p>
  <h3 class="font-weight-bolder mb-0">{{ $complete }}</h3>
  </div>
  <div class="col-6 py-1">
  <p class="card-text text-muted mb-0">In Progress</p>
  <h3 class="font-weight-bolder mb-0">{{ $process }}</h3>
  </div>
  </div>
  </div>
  </div>
  </div>
  <!--/ Goal Overview Card -->
  
  <!-- Transaction Card -->
  
  <!--/ Transaction Card -->
  </div>
  </section>
  <!-- Dashboard Ecommerce ends -->
  
  </div>
  </div>
  </div>

<script>
   function myFunction()
   {
    var e = document.getElementById("yearer");
    var data = e.value;
    if(data == 'this')
    {
        var record = document.getElementById('this_year').value;
        document.getElementById('result').innerHTML = '$' + record;
    }
    else if(data == 'last')
    {
        var record1 = document.getElementById('last_year').value;
      
        document.getElementById('result').innerHTML = '$' + record1;
    }
    else if(data == 'previous')
    {
        var record2 = document.getElementById('previous_year').value;
        
        document.getElementById('result').innerHTML ='$' + record2;
    }
   }
</script>

@endsection