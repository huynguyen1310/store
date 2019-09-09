<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>
    
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
    
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>    
        <!-- Divider -->
        <hr class="sidebar-divider">
    
        <!-- Heading -->
        <div class="sidebar-heading">
        Pages
        </div>
    
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categories-menu" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>Category</span>
        </a>
        <div id="categories-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('category.index') }}">List</a>
                <a class="collapse-item" href="{{ route('category.create') }}">Add</a>
            </div>
        </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product-type-menu" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-cog"></i>
                <span>Product Type</span>
            </a>
            <div id="product-type-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('product-type.index') }}">List</a>
                    <a class="collapse-item" href="{{ route('product-type.create') }}">Add</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product-menu" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-cog"></i>
                <span>Product</span>
            </a>
            <div id="product-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('product.index') }}">List</a>
                    <a class="collapse-item" href="{{ route('product.create') }}">Add</a>
                </div>
            </div>
        </li>
    
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    
    </ul>
    <!-- End of Sidebar -->