@extends('layouts.admin-master')
@section('title') Starlight Admin | Slider Edit @endsection
@section('slider') active @endsection
@section('dashboard-content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
        <span class="breadcrumb-item active">Slider Edit</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Slider</h6>
            <p></p>
            <form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="id" type="hidden" value="{{ $slider->id }}">
                <input name="old_image" type="hidden" value="{{ $slider->image }}">
                <div class="row row-sm">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Slider Title English: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="title_en" value="{{ $slider->title_en }}"
                                placeholder="Enter Slider Title English">
                            @error('title_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Slider Title Bangla: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="title_bn" value="{{ $slider->title_bn }}"
                                placeholder="Enter Slider Title Bangla">
                            @error('title_bn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">SLider Description English: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="description_en"
                                value="{{ $slider->description_en }}" placeholder="Enter Description English">
                            @error('description_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">SLider Description Bangla: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="description_bn"
                                value="{{ $slider->description_bn }}" placeholder="Enter Description Bangla">
                            @error('description_bn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="image" placeholder="Enter Slider Image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Old Image: <span class="tx-danger">*</span></label>
                            <img src="{{ asset($slider->image) }}" height="60px" width="150px;" alt="">
                        </div>
                    </div>
                    <div class="form-layout-footer mt-3">
                        <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update Slider</button>
                    </div><!-- form-layout-footer -->
                </div><!-- row -->
            </form>
        </div>
    </div>




@endsection
