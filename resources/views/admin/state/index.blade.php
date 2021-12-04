@extends('layouts.admin-master')
@section('title') Starlight Admin | All State @endsection
@section('shipping') active show-sub @endsection
@section('state-index') active @endsection
@section('dashboard-content')

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
            <span class="breadcrumb-item active">State List</span>
        </nav>

        <div class="sl-pagebody">

            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">State List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15">Division</th>
                                            <th class="wd-20">District</th>
                                            <th class="wd-20p">State En</th>
                                            <th class="wd-20p">State Bn</th>
                                            <th class="wd-10p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($states as $item)
                                            <tr>
                                                <td>{{ $item->division->division_name_en }}</td>
                                                <td>{{ $item->district->district_name_en }}</td>
                                                <td>{{ ucwords($item->state_name_en) }}</td>
                                                <td>{{ $item->state_name_bn }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-success badge-pill">active</span>
                                                    @else
                                                        <span class="badge badge-danger badge-pill">inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('state.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ route('state.delete', $item->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                            class="fa fa-trash"></i></a>
                                                    @if ($item->status == 1)
                                                        <a href="{{ route('state.unpublished', $item->id) }}"
                                                            class="btn btn-sm btn-success" title="inactive now"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ route('state.published', $item->id) }}"
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
                        <div class="card-header">Add New State</div>
                        <div class="card-body">
                            <form action="{{ route('state.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label class="form-control-label">Select Division: <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control select2-show-search" data-placeholder="Select One"
                                        name="division_id">
                                        <option label="Choose one"></option>
                                        @foreach ($divisions as $item)
                                            <option value="{{ $item->id }}">{{ $item->division_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Select District: <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control select2-show-search" data-placeholder="Select One"
                                        name="district_id">
                                        <option label="Choose one"></option>
                                    </select>
                                    @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">State Name English: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="state_name_en"
                                        value="{{ old('state_name_en') }}"
                                        placeholder="Enter State Name English">
                                    @error('state_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">State Name Bangla: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="state_name_bn"
                                        value="{{ old('state_name_bn') }}"
                                        placeholder="Enter State Name Bangla">
                                    @error('state_name_bn')
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
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('/admin/district/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="district_id"]').html('');

                            var d = $('select[name="district_id"]').empty();
                            $.each(data, function(key, value) {

                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .district_name_en + '</option>');

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
