@extends('layouts.admin')
@section('title')
    <title>Kiểm kho</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kho thuốc</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
                <!-- SEARCH FORM -->
            <form class="form-inline ml-3 float-right">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit"
                    style="background-color: #e0f8f1;
                            border-color: silver;">
                        <i class="fas fa-search"></i>
                    </button>
                    </div>
                </div>
            </form>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          {{-- <div class="float-right d-inline-flex pr-2">
              <li class="pr-1"><a href="medicines">Danh sách</a></li>
              <a href="#">/</a>
              <li class="pl-1"><a href="themthuoc">Thêm</a></li>
          </div> --}}
          <div class="pt-4">
              <div class="col">
                  <table class="table table-bordered text-center">
                      <thead>
                          <tr>
                              <th>Mã thuốc</th>
                              <th>Tên thuốc</th>
                              <th>HSD</th>
                              <th>Nhóm thuốc</th>
                              <th>Mã phiếu nhập</th>
                              <th>Ngày nhập</th>
                              <th>Nhà cung cấp</th>
                              <th>Số lô sản xuất</th>
                              <th>Số lượng</th>
                              <th>Đơn vị tính</th>
                              <th>Giá</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td class="text-left">KV001</td>
                              <td class="text-left">Amoxicillin</td>
                              <td>01/11/2023</td>
                              <td class="text-left">Kháng sinh</td>
                              <td class="text-left">PN001</td>
                              <td>01/01/2019</td>
                              <td class="text-left">Công ty Cổ Phần Dược Phẩm FPT Long Châu</td>
                              <td class="text-left">210319</td>
                              <td class="text-left">10</td>
                              <td class="text-left">Hộp</td>
                              <td class="text-left">100000</td>
                          </tr>
                          <tr>
                            <td class="text-left">KVS01</td>
                            <td class="text-left">Paracetamol</td>
                            <td>01/09/2022</td>
                            <td class="text-left">Kháng viêm, hạ sốt</td>
                            <td class="text-left">PN001</td>
                            <td>01/01/2019</td>
                            <td class="text-left">Công ty Cổ Phần Dược Phẩm FPT Long Châu</td>
                            <td class="text-left">210319</td>
                            <td class="text-left">300</td>
                            <td class="text-left">Viên</td>
                            <td class="text-left">200</td>
                          </tr>
                          <tr>
                            <td class="text-left">KV002</td>
                            <td class="text-left">Aspirin</td>
                            <td>01/01/2022</td>
                            <td class="text-left">Kháng viêm</td>
                            <td class="text-left">PN002</td>
                            <td>01/01/2019</td>
                            <td class="text-left">Công Ty Cổ Phần Dược Phẩm Pharmacity</td>
                            <td class="text-left">220319</td>
                            <td class="text-left">100</td>
                            <td class="text-left">Hộp</td>
                            <td class="text-left">100000</td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection





