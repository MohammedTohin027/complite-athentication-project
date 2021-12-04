@extends('layouts.admin-master')
@section('title') Starlight Admin | Edit Sub-SubCategory @endsection
@section('category') active show-sub @endsection
@section('subsubcategory-index') active @endsection
@section('dashboard-content')

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">Sub-SubCategory Edit</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Sub-SubCategory</h6>
                <p></p>
                <form action="{{ route('update.subsubcategory') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $subsubcategory->id }}">
                    <div class="row row-sm">

                        <div class="col-md-6">
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
                                <label class="form-control-label">Sub-SubCategory Name English: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="subsubcategory_name_en"
                                    value="{{ $subsubcategory->subsubcategory_name_en }}"
                                    placeholder="Enter Sub-SubCategory Name English">
                                @error('subsubcategory_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6">
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
                                <label class="form-control-label">Sub-SubCategory Name Bangla: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="subsubcategory_name_bn"
                                    value="{{ $subsubcategory->subsubcategory_name_bn }}"
                                    placeholder="Enter Sub-SubCategory Name Bangla">
                                @error('subsubcategory_name_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-layout-footer mt-3">
                            <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update Data</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- row -->
                </form>
            </div>
        </div>


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
