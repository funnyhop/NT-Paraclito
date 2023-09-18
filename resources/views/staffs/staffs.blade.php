@extends('layouts.admin')
@section('title')
    <title>Nhân viên</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Nhân viên</h1>
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
          <div class="float-right d-inline-flex pr-2">
              <li class="pr-1"><a href="staffs">Danh sách</a></li>
              <a href="#">/</a>
              <li class="pl-1"><a href="themnv">Thêm</a></li>
          </div>
          <div class="row pt-5 pl-4 d-flex">
            <div class="col-2"></div>
            <div class="col-10">
                  <table class="table table-bordered text-center">
                      <thead>
                          <tr>
                              <th>Mã nhân viên</th>
                              <th>Tên nhân viên</th>
                              <th>Số điện thoại</th>
                              <th>Địa chỉ</th>
                              <th>Chức vụ</th>
                              <th>Cập nhật</th>
                              <th>Xóa</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td class="text-left">Nguyen Van A</td>
                              <td class="text-left">0912012122</td>
                              <td class="text-left">63/6 Khu dân cư Hậu Thạnh Mỹ, Lê Bình, Cái Răng-Cần Thơ</td>
                              <td class="text-left">Bán thuốc</td>
                              <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
                              <td><a href="#"><i class="fa-solid fa-trash"></i></a></td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td class="text-left">Nguyen Van B</td>
                              <td class="text-left">0914738296</td>
                              <td class="text-left">107/32/1 đường 30/4, Hưng Lợi, Ninh Kiều-Cần Thơ</td>
                              <td class="text-left">Bán thuốc</td>
                              <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
                              <td><a href="#"><i class="fa-solid fa-trash"></i></a></td>
                          </tr>
                          <tr>
                              <td>3</td>
                              <td class="text-left">Nguyen Van C</td>
                              <td class="text-left">0939485602</td>
                              <td class="text-left">46 Đường Hai Bà Trưng, Tân An, Ninh Kiều-Cần Thơ</td>
                              <td class="text-left">Quản lý kho</td>
                              <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
                              <td><a href="#"><i class="fa-solid fa-trash"></i></a></td>
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

