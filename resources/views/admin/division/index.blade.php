@extends('layouts.admin-master')
@section('title') Starlight Admin | All Division @endsection
@section('shipping') active show-sub @endsection
@section('division-index') active @endsection
@section('dashboard-content')

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">Division List</span>
        </nav>

        <div class="sl-pagebody">

            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Division List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">Sl No</th>
                                            <th class="wd-25p">Division name en</th>
                                            <th class="wd-25p">Division name bn</th>
                                            <th class="wd-20p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($divisions as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ ucwords($item->division_name_en) }}</td>
                                                <td>{{ $item->division_name_bn }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-success badge-pill">active</span>
                                                    @else
                                                        <span class="badge badge-danger badge-pill">inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('division.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ route('division.delete', $item->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                            class="fa fa-trash"></i></a>
                                                    @if ($item->status == 1)
                                                        <a href="{{ route('division.unpublished', $item->id ) }}"
                                                            class="btn btn-sm btn-success" title="inactive now"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ route('division.published', $item->id) }}"
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
                        <div class="card-header">Add New Division</div>
                        <div class="card-body">
                            <form action="{{ route('division.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Division Name English: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="division_name_en"
                                        value="{{ old('division_name_en') }}" placeholder="Enter Division Name English">
                                    @error('division_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Division Name Bangla: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="division_name_bn"
                                        value="{{ old('division_name_bn') }}" placeholder="Enter Division Name Bangla">
                                    @error('division_name_bn')
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
