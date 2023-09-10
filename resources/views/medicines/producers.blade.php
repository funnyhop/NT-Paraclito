@extends('layouts.admin')
@section('title')
    <title>Nhà sản xuất</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Nhà sản xuất</h1>
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
              <li class="pr-1"><a href="producers">Danh sách</a></li>
              <a href="#">/</a>
              <li class="pl-1"><a href="themnsx">Thêm</a></li>
          </div>
          <div class="row pt-5 pl-4 d-flex">
              {{-- <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              </div> --}}
              <div class="col-1"></div>
              <div class="col-10">
                  <table class="table table-bordered text-center">
                      <thead>
                          <tr>
                              <th>Mã nhà sản xuất</th>
                              <th>Tên nhà sản xuất</th>
                              <th>Quốc gia</th>
                              <th>Cập nhật</th>
                              <th>Xóa</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td class="text-left">John Doe</td>
                              <td>Russia</td>
                              <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
                              <td><a href="#"><i class="fa-solid fa-trash"></i></a></td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td class="text-left">SmithJane ShJane ShJane ShJane SSmith</td>
                              <td>United States</td>
                              <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
                              <td><a href="#"><i class="fa-solid fa-trash"></i></a></td>
                          </tr>
                          <tr>
                              <td>3</td>
                              <td class="text-left">Bob JohnsoJohnsoJohnsoJon</td>
                              <td>UK</td>
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

