@extends('layouts.admin-master')
@section('title')
    Shopmama E-com Admin Role Mamagement
@endsection
@section('role')
    active show-sub
@endsection
@section('role-index')
    active
@endsection
@section('dashboard-content')
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">SHopmama</a>
            <span class="breadcrumb-item active">Role Management</span>
        </nav>

        <div class="sl-pagebody" style="min-height: 500px">

            <div class="row row-sm">

                <div class="col-md-6 m-auto">
                    <div class="card">
                        <div class="card-header">Edit Role</div>
                        <div class="card-body">
                            <form action="{{ route('role.update', $role->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="form-control-label">Role Name : <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ $role->name }}"
                                        placeholder="Enter Role Name">
                                    @error('name')
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


        </div><!-- sl-pagebody -->
@endsection
