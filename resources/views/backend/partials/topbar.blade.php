<nav class="navbar navbar-expand navbar-light topbar static-top mb-4 bg-white shadow">

    <!-- Sidebar Toggle -->
    <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop">
        <i class="fa fa-bars"></i>

    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Divider -->
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- User Info -->
        <li class="nav-item dropdown no-arrow">
            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="userDropdown" role="button">
                <span class="d-none d-lg-inline small mr-2 text-gray-600">{{ auth()->user()->name }}</span>
                <div class="img-profile rounded-circle"><i class="fas fa-user"></i></div>
            </a>
            <!-- Dropdown - User Info -->
            <div aria-labelledby="userDropdown" class="dropdown-menu dropdown-menu-right animated--grow-in shadow">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
