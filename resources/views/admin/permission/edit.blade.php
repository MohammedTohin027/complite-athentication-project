@extends('layouts.admin-master')
@section('title')
    Shopmama E-com Admin Permission Mamagement
@endsection
@section('permission')
    active show-sub
@endsection
@section('permission-index')
    active
@endsection
@section('dashboard-content')
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">SHopmama</a>
            <span class="breadcrumb-item active">Permission Edit</span>
        </nav>

        <div class="sl-pagebody" style="min-height: 500px">

            <div class="row row-sm">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Edit Permission</div>
                        <div class="card-body">

                            <form action="{{ route('permission.update', $permission->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                        <div class="form-group">
                                            <label for="role_id">Select Role</label>
                                            <select name="role_id" class="form-control select2-show-search"
                                                data-placeholder="Choose one">
                                                <option label="Choose one"></option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ ($permission->role_id == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-layout-footer">
                                            <button type="submit" class="btn btn-info btn-sm">Update</button>
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
                                                        <input type="checkbox" name="permission[role][list]" @isset($permission['permission']['role']['list']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[role][add]" @isset($permission['permission']['role']['add']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[role][edit]" @isset($permission['permission']['role']['edit']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[role][update]" @isset($permission['permission']['role']['update']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[role][delete]" @isset($permission['permission']['role']['delete']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[role][view]" @isset($permission['permission']['role']['view']) checked @endisset value="1">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Permission</td>
                                                    <td>
                                                        <input type="checkbox" name="permission[permission][list]" @isset($permission['permission']['permission']['list']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[permission][add]" @isset($permission['permission']['permission']['add']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[permission][edit]" @isset($permission['permission']['permission']['edit']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[permission][update]" @isset($permission['permission']['permission']['update']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[permission][delete]" @isset($permission['permission']['permission']['delete']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[permission][view]" @isset($permission['permission']['permission']['view']) checked @endisset value="1">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Subadmin</td>
                                                    <td>
                                                        <input type="checkbox" name="permission[subadmin][list]" @isset($permission['permission']['subadmin']['list']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[subadmin][add]" @isset($permission['permission']['subadmin']['add']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[subadmin][edit]" @isset($permission['permission']['subadmin']['edit']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[subadmin][update]" @isset($permission['permission']['subadmin']['update']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[subadmin][delete]" @isset($permission['permission']['subadmin']['delete']) checked @endisset value="1">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="permission[subadmin][view]" @isset($permission['permission']['subadmin']['view']) checked @endisset value="1">
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
