@extends('layouts.admin-master')
@section('title')
Shopmama E-com | Admin Profile Password
@endsection

@section('dashboard-content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">SHopmama</a>
    <a class="breadcrumb-item" href="{{ route('view.profile') }}">Profile</a>
    <span class="breadcrumb-item active">Password Change</span>
</nav>

<div class="sl-pagebody" style="min-height: 500px">
    <div class="row row-sm">

        @include('admin.profile.inc.sidebar')

        {{-- password change start --}}
        <div class="col-md-8 mt-1">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.update.password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Current Password</label>
                            <input type="password" name="old_password" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Current password">
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
        {{-- password change end --}}


    </div><!-- row -->

</div>

@endsection
