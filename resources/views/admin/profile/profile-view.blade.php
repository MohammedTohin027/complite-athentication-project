@extends('layouts.admin-master')
@section('title')
Shopmama E-com | Admin Profile View
@endsection

@section('dashboard-content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">SHopmama</a>
    <span class="breadcrumb-item active">Profile View</span>
</nav>

<div class="sl-pagebody" style="min-height: 500px">
    <div class="row row-sm">

        @include('admin.profile.inc.sidebar')

        {{-- profile start --}}
        <div class="col-md-8 mt-1">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.update.profile-info') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ Auth::user()->phone }}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- profile end --}}
        
    </div><!-- row -->

</div>

@endsection
