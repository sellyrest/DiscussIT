<!-- Sidebar -->
<ul class="navbar-nav sidebar" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <h3 style="color: #87AEB7">S</h3>
        <div class="sidebar-brand-text mx-3">Forume</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (Auth::user()->role=='user')
        
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item @if (Request::segment(1) == '') active @endif">
        <a class="nav-link " href="{{url('/')}}">
            <i class="fa-solid fa-house-user"></i>
            <span>Home</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item @if (Request::segment(1) == 'topic' && Request::segment(2) == 'create') active @endif">
        <a class="nav-link" href="{{url('topic/create')}}">
            <i class="fa-solid fa-plus"></i>
            <span>Your Thread</span></a>
    </li>

    <li class="nav-item @if (Request::segment(1) == 'topic' && Request::segment(2) == '') active @endif">
        <a class="nav-link" href="{{url('topic')}}">
            <i class="fa-solid fa-file"></i>
            <span>My Topic</span></a>
    </li>

    <li class="nav-item @if (Request::segment(1) == 'saved') active @endif">
        <a class="nav-link" href="{{url('saved')}}">
            <i class="fa-solid fa-floppy-disk"></i>
            <span>Saved</span></a>
    </li>
    @endif
    <!-- Nav Item - Dashboard -->

    @if (Auth::user()->role=='admin')
        
    <li class="nav-item @if (Request::segment(2) == 'dashboard') active @endif">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
            <i class="fa-solid fa-gauge"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesadmin"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-solid fa-bars"></i>
            <span>Menu</span>
        </a>
        <div id="collapsePagesadmin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/user')}}">User</a>
                <a class="collapse-item" href="{{url('admin/topic')}}">Topic</a>
                <a class="collapse-item" href="{{url('admin/topic-category')}}">Topic Category</a>
                <a class="collapse-item" href="{{url('admin/response')}}">Response</a>
                <a class="collapse-item" href="{{url('admin/report')}}">Report</a>
                
            </div>
        </div>
    </li>
    @endif

  

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->