  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/sales" class="brand-link">
        <img src="{{ asset('admin/img/logo.png') }}" alt="logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">NT Paraclito</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#salescollapse" class="nav-link" data-toggle="collapse">
                <i class="fa-solid fa-cart-shopping i-sidebar"></i>
              <p>Bán hàng<span class="right badge badge-danger">Sales</span></p>
            </a>
            <div class="pl-4">
                <a href="sales" class="nav-link nav-dopdown collapse" id="salescollapse">
                    <p>Bán thuốc</p>
                </a>
                <a href="customers" class="nav-link nav-dopdown collapse" id="salescollapse">
                    <p>Khách hàng</p>
                </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="#collapse1" class="nav-link" data-toggle="collapse" >
                <i class="fa-solid fa-pills i-sidebar"></i>
              <p>Thuốc<span class="right badge badge-tealgr">Medicine</span></p>
            </a>
            <div class="pl-4">
                <a href="producers" class="nav-link nav-dopdown collapse" id="collapse1">
                    <p>Nhà sản xuất</p>
                </a>
                <a href="suppliers" class="nav-link nav-dopdown collapse" id="collapse1">
                    <p>Nhà cung cấp</p>
                </a>
                <a href="druggr" class="nav-link nav-dopdown collapse" id="collapse1">
                    <p>Thêm nhóm thuốc</p>
                </a>
                <a href="medicines" class="nav-link nav-dopdown collapse" id="collapse1">
                    <p>Thêm thuốc</p>
                </a>
                <a href="prices" class="nav-link nav-dopdown collapse" id="collapse1">
                    <p>Giá thuốc</p>
                </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="#collapse2" class="nav-link" data-toggle="collapse" >
                <i class="fa-solid fa-warehouse i-sidebar"></i>
              <p>Quản lý kho</p>
            </a>
            <div class="pl-4">
                <a href="{{ route('importmedicines.createpn') }}" class="nav-link nav-dopdown collapse" id="collapse2">
                    <p>Nhập thuốc từ phiếu</p>
                </a>
                <a href="{{ route('importmedicines') }}" class="nav-link nav-dopdown collapse" id="collapse2">
                    <p>Danh sách phiếu nhập</p>
                </a>
                <a href="checkinventory" class="nav-link nav-dopdown collapse" id="collapse2">
                    <p>Kiểm kho</p>
                </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="staffs" class="nav-link">
                <i class="fa-solid fa-user-doctor i-sidebar"></i>
                <p>Nhân viên</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#collapse4" class="nav-link" data-toggle="collapse" >
                <i class="fa-solid fa-file-invoice i-sidebar"></i>
              <p>Quản lý hóa đơn</p>
            </a>
            <div class="pl-4">
                <a href="bills" class="nav-link nav-dopdown collapse" id="collapse4">
                    <p>Hóa đơn bán</p>
                </a>
                <a href="revenue" class="nav-link nav-dopdown collapse" id="collapse4">
                    <p>Doanh thu</p>
                </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
