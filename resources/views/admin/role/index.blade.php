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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Role List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-25p">Sl No</th>
                                            <th class="wd-40p">Role name</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucwords($item->name) }}</td>
                                                <td>
                                                    <a href="{{ route('role.edit', $item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ route('role.delete', $item->id) }}" class="btn btn-sm btn-danger" id="delete"
                                                        title="delete data"><i class="fa fa-trash"></i></a>
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
                        <div class="card-header">Add New Role</div>
                        <div class="card-body">
                            <form action="{{ route('role.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Role Name : <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                        placeholder="Enter Role Name">
                                    @error('name')
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
