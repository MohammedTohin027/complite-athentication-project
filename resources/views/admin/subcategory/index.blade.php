@extends('layouts.admin-master')
@section('title') Starlight Admin | All SubCategory @endsection
@section('category') active show-sub @endsection
@section('subcategory-index') active @endsection
@section('dashboard-content')
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">SubCategory List</span>
        </nav>

        <div class="sl-pagebody">

            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">SubCategory List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-20">Category</th>
                                            <th class="wd-25p">SubCat name En</th>
                                            <th class="wd-25p">SubCat name Bn</th>
                                            <th class="wd-10p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $item)
                                            <tr>
                                                <td>{{ $item->category->category_name_en }}</td>
                                                <td>{{ ucwords($item->subcategory_name_en) }}</td>
                                                <td>{{ $item->subcategory_name_bn }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-success badge-pill">active</span>
                                                    @else
                                                        <span class="badge badge-danger badge-pill">inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('/admin/subcategory/edit/' . $item->id) }}"
                                                        class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ url('/admin/subcategory/delete/' . $item->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                            class="fa fa-trash"></i></a>
                                                    @if ($item->status == 1)
                                                        <a href="{{ url('/admin/subcategory/unpublished/' . $item->id) }}"
                                                            class="btn btn-sm btn-success" title="inactive now"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ url('/admin/subcategory/published/' . $item->id) }}"
                                                            class="btn btn-sm btn-warning" title="active now"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div>
                    </div><!-- card -->
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add New SubCategory</div>
                        <div class="card-body">
                            <form action="{{ route('subcategory.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label class="form-control-label">Category Name: <span
                                            class="tx-danger">*</span></label>
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

                                <div class="form-group">
                                    <label class="form-control-label">SubCategory Name English: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subcategory_name_en"
                                        value="{{ old('subcategory_name_en') }}"
                                        placeholder="Enter SubCategory Name English">
                                    @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">SubCategory Name Bangla: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subcategory_name_bn"
                                        value="{{ old('subcategory_name_bn') }}"
                                        placeholder="Enter SubCategory Name Bangla">
                                    @error('subcategory_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Add New</button>
                                </div><!-- form-layout-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- sl-pagebody -->


@endsection
