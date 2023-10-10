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
                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3 float-right">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
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
                    {{-- <formthem> --}}
                    <div class="col-6">
                        <form action="" method="POST">
                            @csrf
                            <div class="d-block">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Mã phiếu nhập:</label>
                                            <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                                placeholder="PN001">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Mã kho:</label>
                                            <input type="text" class="input-form pl-2" name="warehouse_id" id="exampleInput1"
                                                placeholder="K0001">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Số lô sản xuất:</label>
                                            <input type="text" class="input-form pl-2" name="solo" id="exampleInput1"
                                                placeholder="210319">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Mã nhân viên:</label>
                                            <input type="text" class="input-form pl-2" name="staff_id" id="exampleInput1"
                                                placeholder="210319">
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <div class="pt-2 pb-1 float-right ">
                                        <button type="reset" class="btn btn-secondary">Hủy</button>
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- </formthem> --}}
                    {{-- <formghi> --}}
                    <div class="col-6">
                        <form action="" method="POST">
                            @csrf
                            <div class="d-block">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Mã phiếu nhập:</label>
                                            <input type="text" class="input-form pl-2" name="phieunhap_id" id="exampleInput1"
                                                placeholder="PN001">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Mã thuốc:</label>
                                            <input type="text" class="input-form pl-2" name="medicine_id" id="exampleInput1"
                                                placeholder="KV001">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Số lượng:&nbsp;&nbsp;<i>(tính theo hộp)</i></label>
                                            <input type="text" class="input-form pl-2" name="sl" id="exampleInput1" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Giá:&nbsp;&nbsp;<i>(vd: 30viênx5vỉx1hộp)</i></label>
                                            <input type="text" class="input-form pl-2" name="gia" id="exampleInput1" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 float-right ">
                                <button type="reset" class="btn btn-secondary">Hủy</button>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                    {{-- </formghi> --}}
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
