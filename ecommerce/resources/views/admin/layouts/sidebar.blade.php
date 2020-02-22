<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{ asset('diamond.png') }}"
             alt="logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Jewellery Shop</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('profile.png')}}" class="img-circle elevation-2" alt="User Profile">
            </div>
            <div class="info">
                <a href="{{route('home')}}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('users.index')}}" class="nav-link @yield('user')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link @yield('user')">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Users List</p>
                            </a>
                        </li>
                        @can('user-create')
                            <li class="nav-item">
                                <a href="{{ route('users.create') }}" class="nav-link @yield('user')">
                                    <i class="fa fa-user nav-icon"></i>
                                    <p>Add New User</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('roles.index')}}" class="nav-link @yield('roles')">
                        <i class="nav-icon fab fa-critical-role"></i>
                        <p>Roles<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link @yield('roles')">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Roles List</p>
                            </a>
                        </li>
                        @can('role-create')
                            <li class="nav-item">
                                <a href="{{ route('roles.create') }}" class="nav-link @yield('roles')">
                                    <i class="fa fa-user nav-icon"></i>
                                    <p>Add New Role</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('permissions.index')}}" class="nav-link @yield('permissions')">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Permissions<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('permissions.index')}}" class="nav-link @yield('permissions')">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Permission List</p>
                            </a>
                        </li>
                        @can('permission-create')
                            <li class="nav-item">
                                <a href="{{ route('permissions.create') }}" class="nav-link @yield('permission')">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Add New Permission</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link @yield('category')">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('products.index')}}" class="nav-link @yield('product')">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user_orders.index')}}" class="nav-link @yield('order')">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>Orders</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>