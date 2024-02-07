<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard') }}">Online Shop Plants</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('dashboard') }}">Osp</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{route('dashboard') }}">Dashboard</a>
                    </li>

                </ul>
            </li>


            <li class="nav-item dropdown {{ Request::is('user') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('user') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('user.index') }}">All Users</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('category') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-list"></i><span>Category</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('category') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('category.index') }}">All Category</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('product') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Product</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('product') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('product.index') }}">All Product</a>
                    </li>

                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('order') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-boxes-packing"></i><span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('order') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('order.index') }}">All Order</a>
                    </li>

                </ul>
            </li>
        </ul>
    </aside>
</div>
