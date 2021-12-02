@extends('layouts.frontend-master')

@section('frontend-content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ route('user.dashboard') }}">Profile</a></li>
                    <li class='active'>Image</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-4 ">
                        {{-- user dashboard sidebar start --}}
                        @include('user.inc.sidebar')
                        {{-- user dashboard sidebar end --}}

                    </div>

                  {{-- user dashboard change password start --}}
                  <div class="col-md-8 mt-1">
                    <div class="card">
                        <h3 class="text-center"> <span class="text-danger">Hi..!</span> <strong class="text-warning">{{ Auth::user()->name }}</strong>
                            Update Your Password</h3>
                        <div class="card-body">
                            <form action="{{ route('update.password') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Old Password</label>
                                    <input type="password" name="old_password" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="old password">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="new password">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Re-Type Passowrd">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- user dashboard change password end --}}



                </div>

            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.inc.brand')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
