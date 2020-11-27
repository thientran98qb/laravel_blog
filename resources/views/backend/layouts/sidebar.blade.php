<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/AdminAssets/plugins/lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">
                @if (session()->has('admin_users'))
                    {{ session('admin_users')->get()->first()->name }}
                @endif
            </a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item has-treeview  {{ isset($sidebar['parent']) && $sidebar['parent'] == 'user' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        User Manage
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{route("admin-user-index")}}" class="nav-link {{ (isset($sidebar['parent']) && $sidebar['parent']=='user' && isset($sidebar['child']) && $sidebar['child']=='index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{route('admin-user-add')}}" class="nav-link {{ (isset($sidebar['parent']) && $sidebar['parent']=='user' && isset($sidebar['child']) && $sidebar['child']=='add') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User Add</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Post Manage
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin-post-index')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Post List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin-post-add')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Post Add</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Categories Manage
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin-category-index')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Categories List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin-category-add')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Categories Add</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Receipt Manage
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Receipt List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview ">
                <a href="{{route('admin-logout')}}" class="nav-link btn btn-success">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Logout</p>
                </a>
            </li>
            
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>