@extends('layouts.admin-master')
@section('title') Starlight Admin | Edit Coupon @endsection
@section('coupon') active show-sub @endsection
@section('coupon-index') active @endsection
@section('dashboard-content')

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">Coupon Edit</span>
        </nav>

        <div class="sl-pagebody">
            <div class="col-md-4 m-auto">
                <div class="card">
                    <div class="card-header">Update Coupon</div>
                    <div class="card-body">
                        <form action="{{ route('coupon.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $coupon->id }}">
                            <div class="form-group">
                                <label class="form-control-label">Coupon Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="coupon_name"
                                    value="{{ $coupon->coupon_name }}" placeholder="Enter Coupon Name">
                                @error('coupon_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Coupon Discount (%): <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="coupon_discount"
                                    value="{{ $coupon->coupon_discount }}" placeholder="Enter Coupon Discount">
                                @error('coupon_discount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Coupon Validity: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="date" name="coupon_validity"
                                    value="{{ $coupon->coupon_validity }}"
                                    min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" placeholder="Enter Coupon Validity">
                                @error('coupon_validity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-layout-footer">
                                <button type="submit" style="margin-left: 105px" class="btn btn-info">Update</button>
                            </div><!-- form-layout-footer -->
                        </form>
                    </div>
                </div>
            </div>

        </div>


@endsection
