@extends('layouts.admin-master')
@section('title')
    Shopmama E-com Admin Permission Mamagement
@endsection
@section('permission')
    active show-sub
@endsection
@section('permission-create')
    active
@endsection
@section('dashboard-content')
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">SHopmama</a>
            <span class="breadcrumb-item active">Permission Create</span>
        </nav>

        <div class="sl-pagebody" style="min-height: 500px">

            <div class="row row-sm">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"> Add New Permission</div>
                        <div class="card-body">

                            <form action="{{ route('permission.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                        <div class="form-group">
                                            <label for="role_id">Select Role</label>
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
                                            <button type="submit" class="btn btn-info btn-sm">Create</button>
                                        </div><!-- form-layout-footer -->
                                    </div><!-- col-4 -->

                                    <div class="col-md-8">
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Permission</th>
                                                    <th>List</th>
                                                    <th>Add</th>
                                                    <th>Edit</th>
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                    <th>View</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>Role</td>
                                                    <td>
                                                        <input type="checkbox" name="permission[role][list]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[role][add]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[role][edit]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[role][update]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[role][delete]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[role][view]" value="1">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Permission</td>
                                                    <td>
                                                        <input type="checkbox" name="permission[permission][list]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[permission][add]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[permission][edit]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[permission][update]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[permission][delete]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[permission][view]" value="1">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Subadmin</td>
                                                    <td>
                                                        <input type="checkbox" name="permission[subadmin][list]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[subadmin][add]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[subadmin][edit]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[subadmin][update]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[subadmin][delete]" value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[subadmin][view]" value="1">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div><!-- card -->
                </div>

            </div>


        </div><!-- sl-pagebody -->
@endsection
