@extends('layouts.admin-master')
@section('title') Starlight Admin | All Sub-SubCategory @endsection
@section('category') active show-sub @endsection
@section('subsubcategory-index') active @endsection
@section('dashboard-content')
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">Sub-SubCategory List</span>
        </nav>

        <div class="sl-pagebody">

            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Sub-SubCategory List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15">Cat</th>
                                            <th class="wd-20">Sub Cat</th>
                                            <th class="wd-20p">Sub-SubCat En</th>
                                            <th class="wd-20p">Sub-SubCat Bn</th>
                                            <th class="wd-10p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subsubcategories as $item)
                                            <tr>
                                                <td>{{ $item->category->category_name_en }}</td>
                                                <td>{{ $item->subcategory->subcategory_name_en }}</td>
                                                <td>{{ ucwords($item->subsubcategory_name_en) }}</td>
                                                <td>{{ $item->subsubcategory_name_bn }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-success badge-pill">active</span>
                                                    @else
                                                        <span class="badge badge-danger badge-pill">inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('/admin/sub-subcategory/edit/' . $item->id) }}"
                                                        class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ url('/admin/sub-subcategory/delete/' . $item->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                            class="fa fa-trash"></i></a>
                                                    @if ($item->status == 1)
                                                        <a href="{{ url('/admin/sub-subcategory/unpublished/' . $item->id) }}"
                                                            class="btn btn-sm btn-success" title="inactive now"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ url('/admin/sub-subcategory/published/' . $item->id) }}"
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
                        <div class="card-header">Add New Sub-SubCategory</div>
                        <div class="card-body">
                            <form action="{{ route('subsubcategory.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label class="form-control-label">Select Category: <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control select2-show-search" data-placeholder="Select One"
                                        name="category_id">
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
                                    <label class="form-control-label">Select Sub-Category: <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control select2-show-search" data-placeholder="Select One"
                                        name="subcategory_id">
                                        <option label="Choose one"></option>
                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Sub-SubCategory Name English: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subsubcategory_name_en"
                                        value="{{ old('subsubcategory_name_en') }}"
                                        placeholder="Enter Sub-SubCategory Name English">
                                    @error('subsubcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Sub-SubCategory Name Bangla: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subsubcategory_name_bn"
                                        value="{{ old('subsubcategory_name_bn') }}"
                                        placeholder="Enter Sub-SubCategory Name Bangla">
                                    @error('subsubcategory_name_bn')
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

    <script src="{{ asset('common/jquery-2.2.4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').html('');

                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {

                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');

                            });

                        },

                    });
                } else {
                    alert('danger');
                }

            });

        });
    </script>

@endsection
