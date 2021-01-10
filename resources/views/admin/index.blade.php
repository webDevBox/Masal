@extends('layout.web')
@section('content')

<section class="section-showcase section-showcase-top">
  <div class="container">
      <div class="row">
          <div class="showcase">
                  <div class="shocase-section showcase-header" >
                      <div class="list">

                              <div class="list-item">
                                  <div class="header header-title">
                                          <h2  role="heading" aria-level="1">Admin Login</h2>
                                          @if(Session::has('success'))
                                          <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                                          @endif
                                          @if(Session::has('error'))
                                          <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                                          @endif
                                  </div>
                              </div>
                      </div>
                  </div>
          </div>
      </div>
  </div>
</section>


<div class="auth-form login-form">
  <div class="auth-container clearfix" id="sign-in">

    
    <form action="#" method="post">
      @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Email </label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Your Email" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password </label>
      <input type="password" name="password" class="form-control" placeholder="Your Password" id="exampleInputPassword1">
    </div>
    <center><button type="submit" name="login" class="btn btn-lg btn-success btn-block">Login</button> </center>
  </form>


  </div>
</div>

@endsection