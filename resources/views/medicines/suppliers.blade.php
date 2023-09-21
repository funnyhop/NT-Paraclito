@extends('layouts.admin')
@section('title')
    <title>Nhà cung cấp</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Nhà cung cấp</h1>
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
              <li class="pr-1"><a href="/suppliers">Danh sách</a></li>
              <a href="#">/</a>
              <li class="pl-1"><a href="suppliers/create">Thêm</a></li>
          </div>
          <div class="row pt-5 pl-4 d-flex">
              <div class="col-1"></div>
              <div class="col-10">
                  <table class="table table-bordered text-center">
                      <thead>
                          <tr>
                              <th>Mã nhà cung cấp</th>
                              <th>Tên nhà cung cấp</th>
                              <th>Địa chỉ</th>
                              <th>Cập nhật</th>
                              <th>Xóa</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td class="text-left">Công ty Cổ Phần Dược Phẩm FPT Long Châu</td>
                              <td class="text-left">379-381 Hai Bà Trưng, P. Võ Thị Sáu, Q.3, TP. HCM</td>
                              <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
                              <td><a href="#"><i class="fa-solid fa-trash"></i></a></td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td class="text-left">Công Ty Cổ Phần Dược Phẩm Pharmacity</td>
                              <td class="text-left">248A Nơ Trang Long, P.12, Q.Bình Thạnh, TP.Hồ Chí Minh</td>
                              <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
                              <td><a href="#"><i class="fa-solid fa-trash"></i></a></td>
                          </tr>
                          <tr>
                              <td>3</td>
                              <td class="text-left">Công ty TNHH TRUNGSONCARE</td>
                              <td class="text-left">96 Lý Tự Trọng, P. An Cư, Q. Ninh Kiều, Cần Thơ</td>
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



