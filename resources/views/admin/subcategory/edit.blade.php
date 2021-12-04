@extends('layouts.admin-master')
@section('title') Starlight Admin | Edit SubCategory @endsection
@section('category') active show-sub @endsection
@section('subcategory-index') active @endsection
@section('dashboard-content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
        <span class="breadcrumb-item active">SubCategory Edit</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update SubCategory</h6>
            <p></p>
            <form action="{{ route('update.subcategory') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $subcategory->id }}">
                <div class="row row-sm">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                            <select name="category_id" class="form-control select2-show-search"
                                data-placeholder="Choose one">
                                <option label="Choose one"></option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_name_en }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">SubCategory Name English: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="subcategory_name_en"
                                value="{{ $subcategory->subcategory_name_en }}"
                                placeholder="Enter SubCategory Name English">
                            @error('subcategory_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">SubCategory Name Bangla: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="subcategory_name_bn"
                                value="{{ $subcategory->subcategory_name_bn }}"
                                placeholder="Enter SubCategory Name Bangla">
                            @error('subcategory_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-layout-footer mt-3">
                        <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update
                            subcategory</button>
                    </div><!-- form-layout-footer -->
                </div><!-- row -->
            </form>
        </div>
    </div>


@endsection
