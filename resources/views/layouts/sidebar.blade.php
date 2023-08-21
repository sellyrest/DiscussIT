<!-- Sidebar -->
<ul class="navbar-nav sidebar" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <h3 style="color: #87AEB7">S</h3>
        <div class="sidebar-brand-text mx-3">Forume</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw">
                <img style="height :20px; " src="img/settings-icon.png" alt="">
            </i>
            <span>Setting</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login">Login</a>
                <a class="collapse-item" href="register">Register</a>
                <a class="collapse-item" href="forgot-password">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw">
                <i class="fas fa-fw">
                    <img style="height :20px; " src="img/home-icon.png" alt="">
                </i>
            </i>
            <span>Home</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('topic/create')}}">
            <i class="fas fa-fw">
                <img style="height :20px; " src="img/thread-icon.png" alt="">
            </i>
            <span>Your Thread</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('topic')}}">
            <i class="fas fa-fw">
                <img style="height :20px; " src="img/save-icon.png" alt="">
            </i>
            <span>My Topic</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="saved">
            <i class="fas fa-fw">
                <img style="height :20px; " src="img/save-icon.png" alt="">
            </i>
            <span>Saved</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->