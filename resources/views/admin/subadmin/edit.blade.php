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

                <div class="col-md-6 m-auto">
                    <div class="card">
                        <div class="card-header">Edit Subadmin</div>
                        <div class="card-body">
                            <form action="{{ route('subadmin.update', $user->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="form-control-label">Subadmin Name : <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ $user->name }}"
                                        placeholder="Enter Subadmin Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-control-label">E-mail : <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="{{ $user->email }}"
                                        placeholder="Enter E-mail Name">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password : <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="password" name="password"
                                        placeholder="Enter Password">
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
                                            <option value="{{ $role->id }}" {{ ($role->id == $user->role_id) ? 'Selected' : ''  }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
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
