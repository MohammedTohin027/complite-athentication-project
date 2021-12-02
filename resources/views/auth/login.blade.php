@extends('layouts.frontend-master')
@section('title')
    Shopmama E-com Login
@endsection

@section('frontend-content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">


                @error('message')
                    {{ $message }}
                @enderror

                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <div class="social-sign-in outer-top-xs">
                            <a href="{{ route('login.facebook') }}" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with
                                Facebook</a>
                            <a href="{{ route('login.google') }}" class="twitter-sign-in"><i class="fa fa-google"></i> Sign In with Google</a>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="register-form outer-top-xs" role="form">
                            @csrf
                            <div class="form-group">

                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                {{-- <input type="email" class="form-control unicase-form-control text-input"
                                id="exampleInputEmail1"> --}}
                                <input id="email" type="email"
                                    class="form-control unicase-form-control text-input @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Enter your email"
                                    autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                {{-- <input type="password" class="form-control unicase-form-control text-input"
                                id="exampleInputPassword1"> --}}
                                <input id="password" type="password"
                                    class="form-control unicase-form-control text-input @error('password') is-invalid @enderror"
                                    name="password" placeholder="Enter your password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="radio outer-xs">
                                <input class="" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="" for="remember">
                                    {{ __('Remember Me!') }}
                                </label>


                                <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
                            </div>
                            {{-- <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button> --}}
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                {{ __('Login') }}
                            </button>

                        </form>
                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Create a new account</h4>
                        <p class="text title-tag-line">Create your new account.</p>
                        <form method="POST" action="{{ route('register') }}" class="register-form outer-top-xs"
                            role="form">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>

                                <input id="email" type="email"
                                    class="form-control unicase-form-control text-input @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Enter your email"
                                    autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input id="name" type="text"
                                    class="form-control unicase-form-control text-input @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" placeholder="Enter your name"
                                    autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>

                                <input id="phone" type="text"
                                    class="form-control unicase-form-control text-input @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" placeholder="Enter your phone number"
                                    autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>

                                <input id="password" type="password"
                                    class="form-control unicase-form-control text-input @error('password') is-invalid @enderror"
                                    name="password" placeholder="Enter your password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password
                                    <span>*</span></label>
                                <input id="password-confirm" type="password"
                                    class="form-control unicase-form-control text-input" name="password_confirmation"
                                    placeholder="Re-type password" autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign
                                Up</button>
                        </form>


                    </div>
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.inc.brand')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
