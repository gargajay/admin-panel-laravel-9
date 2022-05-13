<nav id="sidebar">
    <div class="sidebar-header">
        <img src="{{publicPath()}}/assets/images/logo.png" alt="logo">
    </div>

    <ul id="metismenu" class="list-unstyled components">
        <li class="{{request()->routeIs('dashboard*') ? 'active':""}} ">
            <a href="{{url('/dashboard')}}"><i class="fas fa-house"></i>Dashboard
                 <div class="top"></div><div class="bottom"></div>
            </a>
        </li>
       
        @can("role-list")
        <li class="{{ request()->is('backend/role*') ? 'active':""}}">
            <a href="{{url('backend/role')}}"><i class="fas fa-list"></i>Roles
                <div class="top"></div><div class="bottom"></div>
            </a>
        </li>
        @endcan
        @can("role-list")
        <li class="{{ request()->is('backend/permission*') ? 'active':""}}">
            <a href="{{url('backend/permission')}}"><i class="fas fa-list"></i>permissions
                <div class="top"></div><div class="bottom"></div>
            </a>
        </li>
        @endcan
        @can("role-user")
        <li {{request()->routeIs('backend/user*') ? 'active':""}}>
            <a href="{{url('backend/user')}}"><i class="fas fa-user"></i>Users
                <div class="top"></div><div class="bottom"></div>
            </a>
        </li>
        @endcan
        <li>
            <a href="#"><i class="fas fa-file-invoice"></i>Orders
                <div class="top"></div><div class="bottom"></div>
            </a>
        </li>
        <li>
            <a href="#"><i class="fas fa-cube"></i>Products
                <div class="top"></div><div class="bottom"></div>
            </a>
        </li>
    </ul>
</nav>