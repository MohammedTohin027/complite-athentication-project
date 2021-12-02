@extends('layouts.admin-master')
@section('title')
    Shopmama E-com | Admin All Users
@endsection
@section('dashboard')

@endsection

@section('dashboard-content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">SHopmama</a>
        <span class="breadcrumb-item active">All User</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">
                @php
                    $online_user = 0;
                    foreach ($users as $user) {
                        if ($user->onlineUser()) {
                            $online_user = $online_user + 1;
                        }
                    }
                @endphp
                <span>Active User : <span class="badge badge-pill badge-success">{{ $online_user }}</span> </span>
                <span class="pull-right">Total Users : <span
                        class="badge badge-pill badge-info">{{ @count($users) }}</span> </span>
            </h6>
            <br>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-13p">Image</th>
                            <th class="wd-10p">Type</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">E-mail</th>
                            <th class="wd-15p">Phone</th>
                            <th class="wd-15p">Online / Offline</th>
                            <th class="wd-13p">Acount</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ asset($user->image) }}" style="width: 60px; height:60px">
                                </td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @if ($user->onlineUser())
                                        <span class="badge badge-pill badge-success">Active Now</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">
                                            {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                    @endif


                                </td>
                                <td>
                                    @if ($user->isban == 0)
                                        <span class="badge badge-pill badge-info">Unbanned</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">Banned</span>
                                    @endif

                                </td>
                                <td>
                                    @if ($user->isban == 0)
                                        <a href="{{ route('user.banned', $user->id) }}" class="btn btn-danger btn-sm"> <i
                                                class="fa fa-arrow-down"></i> Banned</a>
                                    @else
                                        <a href="{{ route('user.unbanned', $user->id) }}" class="btn btn-info btn-sm"> <i
                                                class="fa fa-arrow-up"></i> Unbanned</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->



    </div><!-- sl-pagebody -->
@endsection
