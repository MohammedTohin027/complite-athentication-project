@extends('layouts.admin-master')
@section('title') Starlight Admin | Edit District @endsection
@section('shipping') active show-sub @endsection
@section('district-index') active @endsection
@section('dashboard-content')

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">District Edit</span>
        </nav>

        <div class="sl-pagebody">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">Update District</div>
                    <div class="card-body">
                        <form action="{{ route('district.update') }}" method="POST">
                            @csrf

                            <input name="id" type="hidden" value="{{ $district->id }}">
                            <div class="form-group">
                                <label class="form-control-label">Division Name: <span
                                        class="tx-danger">*</span></label>
                                <select name="division_id" class="form-control select2-show-search"
                                    data-placeholder="Choose one">
                                    <option label="Choose one"></option>
                                    @foreach ($divisions as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $district->division_id ? 'selected' : '' }}>
                                            {{ $item->division_name_en }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">District Name English: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="district_name_en"
                                    value="{{ ucwords($district->district_name_en) }}"
                                    placeholder="Enter District Name English">
                                @error('district_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">District Name Bangla: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="district_name_bn"
                                    value="{{ $district->district_name_bn }}" placeholder="Enter District Name Bangla">
                                @error('district_name_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div><!-- form-layout-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>


@endsection
