@extends('layouts.admin-master')
@section('title')
Shopmama E-com | Admin Profile Image
@endsection

@section('dashboard-content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">SHopmama</a>
    <a class="breadcrumb-item" href="{{ route('view.profile') }}">Profile</a>
    <span class="breadcrumb-item active">Profile Image</span>
</nav>

<div class="sl-pagebody" style="min-height: 500px">
    <div class="row row-sm">

        @include('admin.profile.inc.sidebar')

        {{-- change image start --}}
        <div class="col-md-8 mt-1">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.update.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="">
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
        {{-- change image end --}}

    </div><!-- row -->

</div>

@endsection
