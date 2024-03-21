<!-- Sidebar -->
<ul class="navbar-nav sidebar" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text text-side mx-3">
            <div class="start mb-4">
                <img src="./img/logo-dash.png" class="img-fluid" style="width: 100px; height: auto;">
            </div>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (Auth::user()->role=='user')
        
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="/chat"
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                <path strokeLinecap="round" strokeLinejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
              </svg>
              
            <span>Message</span></a>
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