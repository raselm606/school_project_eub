<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/admin')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('/admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item {{ Request::is('admin/slider') ? 'active' : '' }} ">
            <a class="nav-link" href="{{route('admin.all.slider')}}">
                <i class="fas fa-fw fa-arrow-right"></i>
                <span>Slider</span></a>
        </li>

    <li class="nav-item {{ Request::is('admin/category') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCat"
           aria-expanded="true" aria-controls="collapseCat">
            <i class="fas fa-fw fa-database"></i>
            <span>Category</span>
        </a>
        <div id="collapseCat" class="collapse {{ Request::is('admin/category') ? 'show' : '' }}" aria-labelledby="collapseCat" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/category') ? 'active' : '' }}" href="{{route('admin.category')}}"><i class="fas fa-fw fa-arrow-right"></i> All Category</a>
                <a class="collapse-item " href="#addcat" data-toggle="modal"><i class="fas fa-fw fa-plus-square"></i> Add Category</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('admin/product') ? 'active' : '' }} {{ Request::is('admin/product/create') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Products</span>
        </a>
        <div id="collapseTwo" class="collapse {{ Request::is('admin/product') ? 'show' : '' }} {{ Request::is('admin/product/create') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/product') ? 'active' : '' }}" href="{{route('admin.all.product')}}"><i class="fas fa-fw fa-arrow-right"></i> All Products</a>
                <a class="collapse-item {{ Request::is('admin/product/create') ? 'active' : '' }}" href="{{route('admin.product.store')}}"><i class="fas fa-fw fa-arrow-right"></i> Add Products</a>
            </div>
        </div>
    </li>

{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrand"--}}
{{--           aria-expanded="true" aria-controls="collapseBrand">--}}
{{--            <i class="fas fa-fw fa-arrow-right"></i>--}}
{{--            <span>Brand</span>--}}
{{--        </a>--}}
{{--        <div id="collapseBrand" class="collapse" aria-labelledby="collapseBrand" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <h6 class="collapse-header">Manage All Brand</h6>--}}
{{--                <a class="collapse-item" href="#"><i class="fas fa-fw fa-arrow-right"></i> All Brand</a>--}}
{{--                <a class="collapse-item" href="#"><i class="fas fa-fw fa-arrow-right"></i> Add Brand</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <!-- Nav Item - Utilities Collapse Menu -->
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"--}}
{{--           aria-expanded="true" aria-controls="collapseUtilities">--}}
{{--            <i class="fas fa-fw fa-wrench"></i>--}}
{{--            <span>Products</span>--}}
{{--        </a>--}}
{{--        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"--}}
{{--             data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <h6 class="collapse-header">Manage Products</h6>--}}
{{--                <a class="collapse-item" href="#">All products</a>--}}
{{--                <a class="collapse-item" href="#">Add products</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <!-- Nav Item - Charts -->
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="#">--}}
{{--            <i class="fas fa-fw fa-envelope"></i>--}}
{{--            <span>All Message</span></a>--}}
{{--    </li>--}}

    <!-- Nav Item - Tables -->
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="#">--}}
{{--            <i class="fas fa-fw fa-table"></i>--}}
{{--            <span>Tables</span></a>--}}
{{--    </li>--}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->


