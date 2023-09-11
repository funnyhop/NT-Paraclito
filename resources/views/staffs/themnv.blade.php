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
        <div class="container-fluid  pb-5">
          <div class="float-right d-inline-flex pr-2">
              <li class="pr-1"><a href="staffs">Danh sách</a></li>
              <a href="#">/</a>
              <li class="pl-1"><a href="themnv">Thêm</a></li>
          </div>
          <div class="row pt-5 pl-4 d-flex">
            <div class="col-3"></div>
            <div class="col-7">
                <form>
                    <div class="input-group d-flex pb-2">
                      <label for="exampleInput1" class="pr-2">Mã nhân viên:</label>
                      <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="BT001">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput2" class="pr-2">Tên nhân viên:</label>
                        <input type="text" class="input-form pl-2" id="exampleInput2" placeholder="Nguyen Van A">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput2" class="pr-2">Số điện thoại:</label>
                        <input type="text" class="input-form pl-2" id="exampleInput2" placeholder="0912012122">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput2" class="pr-2">Địa chỉ:</label>
                        <input type="text" class="input-form pl-2" id="exampleInput2" placeholder="63/6 Khu dân cư Hậu Thạnh Mỹ, Lê Bình, Cái Răng-Cần Thơ">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput2" class="pr-2">Chức vụ:</label>
                        <input type="text" class="input-form pl-2" id="exampleInput2" placeholder="Bán thuốc">
                    </div>
                    <div class="float-right pr-1 pt-2">
                        <button type="button" class="btn btn-secondary">Hủy</button>
                        <button type="button" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

