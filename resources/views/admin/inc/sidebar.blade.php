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

        <!-- Slider -->
        <a href="{{ route('slider.index') }}" class="sl-menu-link @yield('slider')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-navigate-outline tx-22"></i>
                <span class="menu-item-label">Slider</span>
            </div>
        </a>

         <!-- Brand -->
         <a href="{{ route('brand.index') }}" class="sl-menu-link @yield('brand')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-navigate-outline tx-22"></i>
                <span class="menu-item-label">Brand</span>
            </div>
        </a>

        <!-- Category -->
        <a href="#" class="sl-menu-link @yield('category')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                <span class="menu-item-label">Category Info</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('category.index') }}"
                    class="nav-link @yield('category-index')">
                    Category</a></li>
            <li class="nav-item"><a href="{{ route('subcategory.index') }}"
                    class="nav-link @yield('subcategory-index')">
                    Sub Category</a></li>
            <li class="nav-item"><a href="{{ route('subsubcategory.index') }}"
                    class="nav-link @yield('subsubcategory-index')">
                    Sub Sub Category</a></li>
        </ul>

        <!-- product -->
        <a href="#" class="sl-menu-link @yield('product')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                <span class="menu-item-label">Product</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('add.product') }}" class="nav-link @yield('add-product')">Add
                    Product</a></li>
            <li class="nav-item"><a href="{{ route('manage.product') }}"
                    class="nav-link @yield('manage-product')">Manage
                    Product</a></li>
        </ul>

        <!-- Coupon -->
        <a href="{{ route('coupon.index') }}" class="sl-menu-link @yield('coupon')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-navigate-outline tx-22"></i>
                <span class="menu-item-label">Coupon</span>
            </div>
        </a>

         <!-- Shipping -->
         <a href="#" class="sl-menu-link @yield('shipping')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                <span class="menu-item-label">Shipping Info</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('division.index') }}"
                    class="nav-link @yield('division-index')">
                    Division</a></li>
            <li class="nav-item"><a href="{{ route('district.index') }}"
                    class="nav-link @yield('district-index')">
                    District</a></li>
            <li class="nav-item"><a href="{{ route('state.index') }}"
                    class="nav-link @yield('state-index')">
                    State</a></li>
        </ul>

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
