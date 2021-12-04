@extends('layouts.admin-master')
@section('title') Starlight Admin | Edit-Product @endsection
@section('product') active show-sub @endsection
@section('manage-product') active @endsection
@section('dashboard-content')

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">Edit Product</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit product</h6>
                <p></p>
                <form action="{{ route('update.product') }}" method="POST" enctype="multipart/form-data"
                    name="product_edit_form">
                    @csrf
                    <input name="product_id" value="{{ $product->id }}" type="hidden">
                    <div class="row row-sm">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Brand: <span
                                        class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select One"
                                    name="brand_id">
                                    @foreach ($all_publish_brands as $item)
                                        <option value="{{ $item->id }}">{{ ucwords($item->brand_name_en) }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Category: <span
                                        class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select One"
                                    name="category_id">
                                    {{-- <option label="Choose one"></option> --}}
                                    @foreach ($all_publish_categories as $item)
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
                                <label class="form-control-label">Select Sub-Category: <span
                                        class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search"
                                    data-placeholder="{{ $product->subcategory->subcategory_name_en }}"
                                    name="subcategory_id">
                                    {{-- <option label="Choose one"></option> --}}
                                </select>
                                @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Sub-SubCategory: <span
                                        class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search"
                                    data-placeholder="{{ $product->subsubcategory->subsubcategory_name_en }}"
                                    name="subsubcategory_id">
                                    {{-- <option label="Choose one"></option> --}}
                                </select>
                                @error('subsubcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name English: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name_en"
                                    value="{{ $product->product_name_en }}" placeholder="Enter Product Name English">
                                @error('product_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name Bangla: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name_bn"
                                    value="{{ $product->product_name_bn }}" placeholder="Product Name Bangla">
                                @error('product_name_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_code"
                                    value="{{ $product->product_code }}" placeholder="Enter Product Code">
                                @error('product_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Quantity: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_qty"
                                    value="{{ $product->product_qty }}" placeholder="Enter Product Quantity">
                                @error('product_qty')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Tags English: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_tags_en"
                                    value="{{ $product->product_tags_en }}" placeholder="Product Tags English"
                                    data-role="tagsinput">
                                @error('product_tags_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Tags Bangla: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_tags_bn"
                                    value="{{ $product->product_tags_bn }}" placeholder="product tags bangla"
                                    data-role="tagsinput">
                                @error('product_tags_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size English: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_size_en"
                                    value="{{ $product->product_size_en }}" placeholder="Product Size English"
                                    data-role="tagsinput">
                                @error('product_size_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size Bangla: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_size_bn"
                                    value="{{ $product->product_size_bn }}" placeholder="Product Size Bangla"
                                    data-role="tagsinput">
                                @error('product_size_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color English: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_color_en"
                                    value="{{ $product->product_color_en }}" placeholder="Product Color Rnglish"
                                    data-role="tagsinput">
                                @error('product_color_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color Bangla: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_color_bn"
                                    value="{{ $product->product_color_bn }}" placeholder="Enter Product Color Bangla"
                                    data-role="tagsinput">
                                @error('product_color_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="selling_price"
                                    value="{{ $product->selling_price }}" placeholder="Selling Price">
                                @error('selling_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Discount Price: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="discount_price"
                                    value="{{ $product->discount_price }}" placeholder="Discount Price">
                                @error('discount_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Sale Tag: <span
                                        class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select One"
                                    name="sale_tag">
                                    <option label="Choose one"></option>
                                    <option value="new">New</option>
                                    <option value="hot">Hot</option>
                                    <option value="sale">Sale</option>
                                </select>
                                @error('sale_tag')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Short Description English: <span
                                        class="tx-danger">*</span></label>
                                <textarea name="short_descp_en" id="summernote">{{ $product->short_descp_en }}</textarea>
                                @error('short_descp_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Short Description Bangla: <span
                                        class="tx-danger">*</span></label>
                                <textarea name="short_descp_bn"
                                    id="summernote2">{{ $product->short_descp_bn }}</textarea>
                                @error('short_descp_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Long Description English: <span
                                        class="tx-danger">*</span></label>
                                <textarea name="long_descp_en" id="summernote3">{{ $product->long_descp_en }}</textarea>
                                @error('long_descp_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Long Description Bangla: <span
                                        class="tx-danger">*</span></label>
                                <textarea name="long_descp_bn" id="summernote4">{{ $product->long_descp_bn }}</textarea>
                                @error('long_descp_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_deals" value="1"
                                    {{ $product->hot_deals == 1 ? 'checked' : '' }}><span>Hot Deals</span>
                            </label>
                        </div>

                        <div class="col-md-4">
                            <label class="ckbox">
                                <input type="checkbox" name="featured" value="1"
                                    {{ $product->featured == 1 ? 'checked' : '' }}><span>Featured</span>
                            </label>
                        </div>

                        <div class="col-md-4">
                            <label class="ckbox">
                                <input type="checkbox" name="special_offer" value="1"
                                    {{ $product->special_offer == 1 ? 'checked' : '' }}><span>special_offer</span>
                            </label>
                        </div>

                        <div class="col-md-4">
                            <label class="ckbox">
                                <input type="checkbox" name="special_deals" value="1"
                                    {{ $product->special_deals == 1 ? 'checked' : '' }}><span>special_deals</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-layout-footer mt-3">
                        <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update Product</button>
                    </div><!-- form-layout-footer -->
                </form>

                <form action="{{ route('update.product_thambnail') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input name="product_id" value="{{ $product->id }}" type="hidden">
                    <input name="old_product_thambnail" type="hidden" value="{{ $product->product_thambnail }}">
                    <br>
                    <h4>Update Product Thambnail</h4>
                    <div class="row row-sm" style="margin-top:30px;">
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset($product->product_thambnail) }}"
                                    alt="Card image cap" style="height: 150px; width:150px;">
                                <div class="card-body">
                                    <p class="card-text">
                                    <div class="form-group">
                                        <label class="form-control-label">Change Image<span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="product_thambnail"
                                            onchange="mainThambUrl(this)">
                                    </div>
                                    <img src="" id="mainThmb">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info">Update Thambnail</button>
                    </div><!-- form-layout-footer -->
                </form>

                <form action="{{ route('product.multi_img.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <h4>Update Product Multiple Image</h4>
                    <div class="row row-sm" style="margin-top:50px;">

                        @foreach ($multi_images as $image)
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="{{ asset($image->photo_name) }}"
                                        alt="Card image cap" style="height: 150px; width:150px;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ url('/admin/product/multi_image/delete/' . $image->id) }}"
                                                class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                    class="fa fa-trash"></i></a>
                                        </h5>
                                        <p class="card-text">
                                        <div class="form-group">
                                            <label class="form-control-label">Change Image<span
                                                    class="tx-danger">*</span></label>
                                            <input class="form-control" type="file"
                                                name="multiImg[{{ $image->id }}]">
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info">Update Image</button>
                    </div><!-- form-layout-footer -->
                </form>

            </div><!-- row -->

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

    <script>
        document.forms['product_edit_form'].elements['brand_id'].value = {{ old('brand_id') }};
        document.forms['product_edit_form'].elements['category_id'].value = {{ old('category_id') }};
    </script>
@endsection
