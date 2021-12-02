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


                        <form method="POST" action="{{ route('password.update') }}" class="register-form outer-top-xs" role="form">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address :<span>*</span></label>
                                <input id="email" type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password :<span>*</span></label>
                                    <input id="password" type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Enter Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password :<span>*</span></label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Enter Re-Type Password">
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                {{ __('Reset Password') }}
                            </button>
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
