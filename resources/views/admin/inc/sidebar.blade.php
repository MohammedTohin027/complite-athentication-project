<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> SHopmama</a></div>
<div class="sl-sideleft">

    <div class="sl-sideleft-menu">

        {{-- dashboard menu start --}}
        <a href="{{ route('admin.dashboard') }}" class="sl-menu-link @yield('dashboard')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        {{-- dashboard menu end --}}


        {{-- role menu start --}}
        @isset(auth()->user()->role->permission['permission']['role']['list'])
            <a href="#" class="sl-menu-link @yield('role')">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                    <span class="menu-item-label">Role Manage</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                @isset(auth()->user()->role->permission['permission']['role']['list'])
                    <li class="nav-item"><a href="{{ route('role.index') }}" class="nav-link @yield('role-index')">All Role
                            </a></li>
                @endisset
            </ul>
        @endisset
        {{-- role menu end --}}


        {{-- permission menu start --}}
        @isset(auth()->user()->role->permission['permission']['permission']['list'])
            <a href="#" class="sl-menu-link @yield('permission')">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                    <span class="menu-item-label">Permission Manage</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                @isset(auth()->user()->role->permission['permission']['permission']['add'])
                    <li class="nav-item"><a href="{{ route('permission.create') }}"
                            class="nav-link @yield('permission-create')">Add Permission</a></li>
                @endisset
                @isset(auth()->user()->role->permission['permission']['permission']['list'])
                    <li class="nav-item"><a href="{{ route('permission.index') }}"
                            class="nav-link @yield('permission-index')">All Permission</a></li>
                @endisset
            </ul>
        @endisset
        {{-- permission menu end --}}

        {{-- subadmin menu start --}}
        @isset(auth()->user()->role->permission['permission']['subadmin']['list'])
            <a href="#" class="sl-menu-link @yield('subadmin')">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                    <span class="menu-item-label">Subadmin Manage</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                @isset(auth()->user()->role->permission['permission']['subadmin']['list'])
                    <li class="nav-item"><a href="{{ route('subadmin.index') }}" class="nav-link @yield('subadmin-index')">All Subadmin
                            </a></li>
                @endisset
            </ul>
        @endisset
        {{-- role menu end --}}

    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
