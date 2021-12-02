@extends('layouts.admin-master')
@section('title')
    Shopmama E-com Admin Subadmin Mamagement
@endsection
@section('subadmin')
    active show-sub
@endsection
@section('subadmin-index')
    active
@endsection
@section('dashboard-content')
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">SHopmama</a>
            <span class="breadcrumb-item active">Subadmin Management</span>
        </nav>

        <div class="sl-pagebody" style="min-height: 500px">

            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Subadmin List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">Image</th>
                                            <th class="wd-20p">Subadmin name</th>
                                            <th class="wd-40p">E-mail</th>
                                            <th class="wd-15p">Role</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($item->image) }}" width="60px">
                                                </td>
                                                <td>{{ ucwords($item->name) }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td><span
                                                        class="badge badge-pill badge-success">{{ $item->role->name }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('subadmin.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ route('subadmin.delete', $item->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                            class="fa fa-trash"></i></a>
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
                        <div class="card-header">Add New Subadmin</div>
                        <div class="card-body">
                            <form action="{{ route('subadmin.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Subadmin Name : <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                        placeholder="Enter Subadmin Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-control-label">E-mail : <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                        placeholder="Enter E-mail Name">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password : <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="password" name="password"
                                        value="{{ old('password') }}" placeholder="Enter Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="confirm-password" class="form-control-label">Confirm Password : <span
                                            class="tx-danger">*</span></label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password"
                                        placeholder="Re-type Password">
                                        @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="confirm-password" class="form-control-label">Select Role : <span
                                            class="tx-danger">*</span></label>
                                    <select name="role_id" class="form-control select2-show-search"
                                        data-placeholder="Choose one">
                                        <option label="Choose one"></option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
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
