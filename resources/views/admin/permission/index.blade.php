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
            <span class="breadcrumb-item active">Permission Management</span>
        </nav>

        <div class="sl-pagebody" style="min-height: 500px">

            <div class="row row-sm">
                <div class="col-md-8 m-auto">
                    <div class="card">
                        <div class="card-header">Permission List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-25p">Sl No</th>
                                            <th class="wd-40p">Role Permission</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucwords($item->role->name) }}</td>
                                                <td>
                                                    <a href="{{ route('permission.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ route('permission.delete', $item->id) }}"
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

            </div>


        </div><!-- sl-pagebody -->
@endsection
