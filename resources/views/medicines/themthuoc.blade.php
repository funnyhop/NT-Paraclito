@extends('layouts.admin')
@section('title')
    <title>Thêm thuốc</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Thuốc tây</h1>
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
        <div class="container-fluid pb-5">
            <div class="float-right d-inline-flex pr-2">
                <li class="pr-1"><a href="medicines">Danh sách</a></li>
                <a href="#">/</a>
                <li class="pl-1"><a href="themthuoc">Thêm</a></li>
            </div>
            <div class="row pt-5 pl-5 d-flex">
                <div class="col-6 d-block">
                    <div class="row">
                        <div class="col">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Mã nhóm thuốc:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="KV001">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Mã thuốc:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="TKV01">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Tên thuốc:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="Amoxicillin">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Thành phần hoạt chất:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="Amoxicillin">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-block">
                    <div class="row">
                        <div class="col">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Mã nhà cung cấp:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="LC207">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Ngày sản xuất:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="01/01/2019">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Hạn sử dụng:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="01/01/2025">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Điều trị:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="Nhiễm trùng hô hấp (viêm phổi, viêm xoang,..)">
                            </div>
                        </div>
                    </div>
                    <div class="float-right pt-2">
                        <button type="button" class="btn btn-secondary">Hủy</button>
                        <button type="button" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
                <b class="pb-1 pt-1">Thêm giá bán:</b>
                <div class="row pr-2">
                    <div class="col-3">
                        <div class="input-group pb-1">
                            <label for="exampleInput1">Mã thuốc:</label>
                            <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="KV001">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group pb-1">
                            <label for="exampleInput1">Ngày:</label>
                            <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="01/01/2019">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group pb-1">
                            <label for="exampleInput1">Đơn vị tính:</label>
                            <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="Viên/hộp">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group pb-1">
                            <label for="exampleInput1">Giá:</label>
                            <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="1000/100000">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pl-5 pr-5 d-flex">
                <div class="col-11">
                    <div class="pt-2 float-right pr-3">
                        <button type="button" class="btn btn-secondary">Hủy</button>
                        <button type="button" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection



