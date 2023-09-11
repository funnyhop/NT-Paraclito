@extends('layouts.admin')
@section('title')
    <title>Nhập thuốc từ phiếu</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Nhập thuốc</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol> --}}
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
            <div class="row pl-2">
                <b class="col-6 pl-5 pt-4 pb-1">Thêm phiếu nhập:</b>
                <b class="col-6 pl-4 pt-4 pb-1">Ghi phiếu nhập:</b>
            </div>
            <div class="row pl-5 d-flex">
                <div class="col-6 d-block">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Mã phiếu nhập:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="PN001">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Ngày nhập:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="01/01/2019">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Mã kho:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="NTP07">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-2 mt-4 pb-1 float-right ">
                                <button type="button" class="btn btn-secondary">Hủy</button>
                                <button type="button" class="btn btn-primary">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-block pr-5">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Mã phiếu nhập:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="PN001">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Mã thuốc:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="KV001">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Số lô sản xuất:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="210319">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Số lượng:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="50/1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Đơn vị tính:</label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="Viên/hộp">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group pb-1">
                                <label for="exampleInput1">Giá:&nbsp;&nbsp;<i>(100/viên, 100000/hộp)</i></label>
                                <input type="text" class="input-form pl-2" id="exampleInput1" placeholder="100/100000">
                            </div>
                        </div>
                    </div>
                    <div class="float-right pt-2">
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

