@extends('layouts.admin-master')
@section('title') Starlight Admin | All Category @endsection
@section('category') active show-sub @endsection
@section('category-index') active @endsection
@section('dashboard-content')
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">Category List</span>
        </nav>

        <div class="sl-pagebody">

            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Category List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">Sl No</th>
                                            <th class="wd-10p">Icon</th>
                                            <th class="wd-25p">Category name En</th>
                                            <th class="wd-25p">Category name Bn</th>
                                            <th class="wd-10p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td><span class="{{ $item->category_icon }}"></span></td>
                                                <td>{{ ucwords($item->category_name_en) }}</td>
                                                <td>{{ $item->category_name_bn }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-success badge-pill">active</span>
                                                    @else
                                                        <span class="badge badge-danger badge-pill">inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('/admin/category/edit/' . $item->id) }}"
                                                        class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ url('/admin/category/delete/' . $item->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                            class="fa fa-trash"></i></a>
                                                    @if ($item->status == 1)
                                                        <a href="{{ url('/admin/category/unpublished/' . $item->id) }}"
                                                            class="btn btn-sm btn-success" title="inactive now"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ url('/admin/category/published/' . $item->id) }}"
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
                        <div class="card-header">Add New Category</div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Category Name English: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name_en"
                                        value="{{ old('category_name_en') }}" placeholder="Enter Category Name English">
                                    @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Category Name Bangla: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name_bn"
                                        value="{{ old('category_name_bn') }}" placeholder="Enter Category Name Bangla">
                                    @error('category_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Category Icon: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_icon"
                                        placeholder="Enter Category Icon">
                                    @error('category_icon')
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
