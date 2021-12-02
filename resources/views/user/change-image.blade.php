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

                    {{-- user dashboard change image  start --}}
                    <div class="col-md-8 mt-1">
                        <div class="card">
                            <h3 class="text-center"> <span class="text-danger">Hi..!</span> <strong class="text-warning">{{ Auth::user()->name }}</strong>
                                Upload Your Image</h3>
                            <div class="card-body">
                                <form action="{{ route('update.image') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- user dashboard change image  end --}}



                </div>

            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.inc.brand')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
