@extends('layouts.admin-master')
@section('title') Starlight Admin | All Coupon @endsection
@section('coupon') active show-sub @endsection
@section('coupon-index') active @endsection
@section('dashboard-content')

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">Coupon List</span>
        </nav>

        <div class="sl-pagebody">

            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Coupon List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            {{-- <th class="wd-10p">Sl No</th> --}}
                                            <th class="wd-20p">Coupon name</th>
                                            <th class="wd-10p">Disc(%)</th>
                                            <th class="wd-20p">Validity Date</th>
                                            <th class="wd-20p">valid / invalid</th>
                                            <th class="wd-10p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $item)
                                            <tr>
                                                {{-- <td>{{ $loop->index + 1 }}</td> --}}
                                                <td>{{ strtoupper($item->coupon_name) }}</td>
                                                <td>{{ $item->coupon_discount }}%</td>
                                                <td>{{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d M Y') }}
                                                </td>
                                                <td>
                                                    @if ($item->coupon_validity >= Carbon\Carbon::now())
                                                        <span class="badge badge-success badge-pill">valid</span>
                                                        {{-- <span class="badge badge-danger badge-pill">invalid</span> --}}
                                                    @else
                                                        <span class="badge badge-danger badge-pill">invalid</span>
                                                        {{-- <span class="badge badge-success badge-pill">valid</span> --}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-success badge-pill">active</span>
                                                    @else
                                                        <span class="badge badge-danger badge-pill">inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('coupon.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ route('coupon.delete', $item->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                            class="fa fa-trash"></i></a>
                                                    @if ($item->status == 1)
                                                        <a href="{{ route('coupon.unpublished', $item->id ) }}"
                                                            class="btn btn-sm btn-success" title="inactive now"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ route('coupon.published', $item->id) }}"
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
                        <div class="card-header">Add New Coupon</div>
                        <div class="card-body">
                            <form action="{{ route('coupon.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Coupon Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="coupon_name"
                                        value="{{ old('coupon_name') }}" placeholder="Enter Coupon Name">
                                    @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Coupon Discount (%): <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="coupon_discount"
                                        value="{{ old('coupon_discount') }}" placeholder="Enter Coupon Discount">
                                    @error('coupon_discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Coupon Validity: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" name="coupon_validity" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                        placeholder="Enter Coupon Validity">
                                    @error('coupon_validity')
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
