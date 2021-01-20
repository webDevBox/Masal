@extends('layout.web')
@section('content')

    <section class="section-showcase section-showcase-top">
        <div class="container">
            <div class="row">
                <div class="showcase">
                    <div class="shocase-section showcase-header" style="">
                        <div class="list">

                            <div class="list-item">
                                <div class="header header-title">
                                    <h2 style="" role="heading" aria-level="1">Login</h2>
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

            <form action="{{ route('retailerlogin') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12 col-sm-12">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" id="Shop Name" placeholder="Your Email"
                            required>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" id="Shop Name"
                            placeholder="Your Password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="login" value="Login" class="btn btn-lg btn-success btn-block">
            </form>

        </div>
    </div>

@endsection
