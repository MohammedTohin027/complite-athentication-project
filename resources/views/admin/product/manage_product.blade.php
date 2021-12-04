@extends('layouts.admin-master')
@section('title') Starlight Admin | Add-Product @endsection
@section('product') active show-sub @endsection
@section('add-product') active @endsection
@section('dashboard-content')
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">Add Product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Products List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">Image</th>
                                            <th class="wd-15p">Product En</th>
                                            {{-- <th class="wd-15p">Product Bn</th> --}}
                                            <th class="wd-15p">Selling Price</th>
                                            <th class="wd-9p">Discount Price</th>
                                            <th class="wd-5p">Discount(%)</th>
                                            <th class="wd-10p">Quantity</th>
                                            <th class="wd-10p">Status</th>
                                            <th class="wd-16p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($item->product_thambnail) }}" alt=""
                                                        style="height: 60px; width:60px;">
                                                </td>
                                                <td>{{ $item->product_name_en }}</td>
                                                {{-- <td>{{ $item->product_name_bn }}</td> --}}
                                                <td>{{ $item->selling_price }}.tk</td>
                                                <td>{{ $item->discount_price }}.tk</td>
                                                <td>
                                                    @if ($item->discount_price)
                                                        @php
                                                            $amount = $item->selling_price - $item->discount_price;
                                                            $discount = ($amount / $item->selling_price) * 100;
                                                        @endphp
                                                        <span
                                                            class="badge badge-pill badge-danger">{{ round($discount) }}%</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->product_qty }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('/admin/product/view/'.$item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-eye"></i></a>

                                                    <a href="{{ url('/admin/product/edit/'.$item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>



                                                    <a href="{{ url('/admin/product/delete/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete"
                                                        title="delete data"><i class="fa fa-trash"></i></a>


                                                    @if ($item->status == 1)
                                                        <a href="{{ url('/admin/product/unpublished/'.$item->id) }}" class="btn btn-sm btn-danger" title="inactive"> <i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ url('/admin/product/published/'.$item->id) }}" class="btn btn-sm btn-success" title="active now data">
                                                            <i class="fa fa-arrow-up"></i></a>
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



            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/admin/sub-subcategory/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value) {

                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subsubcategory_name_en + '</option>');

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
