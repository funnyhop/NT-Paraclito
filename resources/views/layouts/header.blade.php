<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class=""></i></a>
            {{-- class="fas fa-bars" --}}
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <!-- Sidebar user panel (optional) -->
            <div class="d-flex" data-toggle="dropdown">
                <a href="#">Welcome, {{ Auth::check() && Auth::user()->NVID ? Auth::user()->TenNV : '' }}</a>
                <i class="fa-solid fa-user pl-3 pr-2"></i>
            </div>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item dropdown-header">Thông tin cá nhân</a>
                <a href="{{ route('logout') }}" class="dropdown-item dropdown-header">Đăng xuất</a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
