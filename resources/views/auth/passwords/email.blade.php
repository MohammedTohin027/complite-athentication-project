@extends('layouts.frontend-master')
@section('title')
    Shopmama E-com Password Reset
@endsection
@section('frontend-content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Password Reset</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">

                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-12 col-sm-12 sign-in">
                        <h4 class="">Reset Password</h4>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" class="register-form outer-top-xs" role="form">
                            @csrf
                            <div class="form-group">

                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input id="email" type="email" placeholder="Enter your e-mail" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>


                            {{-- <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button> --}}
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                {{ __('Send Password Reset Link') }}
                            </button>
                            <a href="{{ route('login') }}" class="forgot-password pull-right">Return to login?</a>

                        </form>
                    </div>
                    <!-- Sign-in -->

                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.inc.brand')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
