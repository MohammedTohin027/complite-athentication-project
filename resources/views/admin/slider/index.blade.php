@extends('layouts.admin-master')
@section('title') Starlight Admin | Slider-all @endsection
@section('slider') active @endsection
@section('dashboard-content')

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">Slider List</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Sliders List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-20p">Slider Image</th>
                                            <th class="wd-25p">Slider Title En</th>
                                            <th class="wd-25p">Description En</th>
                                            <th class="wd-10p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($sliders as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($item->image) }}" alt="Slider Image"
                                                        style="width: 80px;">
                                                </td>
                                                <td>
                                                    @if ($item->title_en == '')
                                                        <span class="badge badg-pill badge-danger">No Title Found</span>
                                                    @else
                                                        {{ $item->title_en }}
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($item->description_en == null)
                                                        <span class="badge badg-pill badge-danger">No Descp Found</span>
                                                    @else
                                                        {{ $item->description_en }}
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-pill badge-success">active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('slider.edit', $item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ route('slider.delete', $item->id) }}" class="btn btn-sm btn-danger" id="delete"
                                                        title="delete data"><i class="fa fa-trash"></i></a>

                                                    @if ($item->status == 1)
                                                        <a href="{{ route('slider.unpublished', $item->id) }}" class="btn btn-sm btn-success" title="inactive"> <i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ route('slider.published', $item->id) }}" class="btn btn-sm btn-warning" title="active now data">
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
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add New Slider</div>
                        <div class="card-body">
                            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Slider Title English: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="title_en"
                                        value="{{ old('title_en') }}" placeholder="Enter Slider Title English">
                                    @error('title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Slider Title Bangla: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="title_bn"
                                        value="{{ old('title_bn') }}" placeholder="Enter Slider Title Bangla">
                                    @error('title_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">SLider Description English: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="description_en"
                                        value="{{ old('description_en') }}" placeholder="Enter Description English">
                                    @error('description_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">SLider Description Bangla: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="description_bn"
                                        value="{{ old('description_bn') }}" placeholder="Enter Description Bangla">
                                    @error('description_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Slider Image: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="image" placeholder="Enter Slider Image">
                                    @error('image')
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
        </div>

@endsection
