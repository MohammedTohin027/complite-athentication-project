@extends('layouts.admin-master')
@section('title') Starlight Admin | Edit State @endsection
@section('shipping') active show-sub @endsection
@section('state-index') active @endsection
@section('dashboard-content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
        <span class="breadcrumb-item active">State Edit</span>
    </nav>

    <div class="sl-pagebody">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">Update State</div>
                <div class="card-body">
                    <form action="{{ route('state.update') }}" method="POST">
                        @csrf
                        <input name="id" type="hidden" value="{{ $state->id }}">
                        <div class="form-group">
                            <label class="form-control-label">Select Division: <span class="tx-danger">*</span></label>
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
                            <label class="form-control-label">Select District: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One"
                                name="district_id">
                            </select>
                            @error('district_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">State Name English: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="state_name_en"
                                value="{{ $state->state_name_en }}" placeholder="Enter State Name English">
                            @error('state_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">State Name Bangla: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="state_name_bn"
                                value="{{ $state->state_name_bn }}" placeholder="Enter State Name Bangla">
                            @error('state_name_bn')
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
