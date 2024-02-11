<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{Route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-1">Employee Management System </div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{Route('dashboard')}}">
            {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseTwo">
            {{-- <i class="fas fa-fw fa-cog"></i>  --}}
            <span>Employee</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Employee</h6>
                <a class="collapse-item" href="{{Route('employee.list')}}">In servise employee list</a>
                <a class="collapse-item" href="{{Route('employee.all.list')}}">All employee list</a>
                <a class="collapse-item" href="{{Route('employee.create')}}">Create</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            {{-- <i class="fas fa-fw fa-cog"></i> --}}
            <span>Department</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Department</h6>
                <a class="collapse-item" href="{{Route('department.list')}}">List</a>
                <a class="collapse-item" href="{{Route('department.create')}}">Create</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#heading4"
            aria-expanded="true" aria-controls="heading4">
            {{-- <i class="fas fa-fw fa-cog"></i> --}}
            <span>Product</span>
        </a>
        <div id="heading4" class="collapse" aria-labelledby="heading4" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product</h6>
                <a class="collapse-item" href="{{Route('product.list')}}">Product List</a>
                <a class="collapse-item" href="{{Route('product.create')}}">Product Create</a>
            </div>
        </div>
    </li>
    <div>
        <li class="nav-item">
            <a class="nav-link " href="{{Route('ajax.index')}}" data-toggle="" data-target=""
                aria-controls="collapseThree">
                <span>Ajax List</span>
            </a>
        </li>
    </div>
    <li class="nav-item">
        <a class="nav-link " href="{{Route('employee.search')}}" data-toggle="" data-target=""
             aria-controls="collapseThree">
            <span>Search Employee</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{Route('employee.search')}}" data-toggle="" data-target=""
             aria-controls="collapseThree">
            <span>Send Email to Employee</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{Route('general.report')}}" data-toggle="" data-target=""
             aria-controls="collapseThree">
            <span>Dep.& Date wise Report</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{Route('report.selary.ditails.total')}}" data-toggle="" data-target=""
             aria-controls="collapseThree">
            <span>Salary Distribution Report</span>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link " href="{{Route('report.list')}}" data-toggle="" data-target="#collapseThree"
             aria-controls="collapseThree">
            <span>Report</span>
        </a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
