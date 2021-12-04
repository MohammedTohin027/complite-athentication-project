@extends('layouts.admin-master')
@section('title') Starlight Admin | Edit Division @endsection
@section('shipping') active show-sub @endsection
@section('division-index') active @endsection
@section('dashboard-content')

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">Division Edit</span>
        </nav>

        <div class="sl-pagebody">
            <div class="col-md-4 m-auto">
                <div class="card">
                    <div class="card-header">Update Division</div>
                    <div class="card-body">
                        <form action="{{ route('division.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $division->id }}">
                            <div class="form-group">
                                <label class="form-control-label">Division Name English: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="division_name_en"
                                    value="{{ $division->division_name_en }}" placeholder="Enter Division Name English">
                                @error('division_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Division Name Bangla: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="division_name_bn"
                                    value="{{ $division->division_name_bn }}" placeholder="Enter Division Name Bangla">
                                @error('division_name_bn')
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
