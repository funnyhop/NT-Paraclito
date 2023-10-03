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
                <div class="float-right d-inline-flex pr-2">
                    <li class="pr-1"><a href="/medicines">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="#">Thêm</a></li>
                </div>
                <div class="row pt-5 pl-5">
                    {{-- <themthuoc> --}}
                    <form action="/medicines" method="post">
                        @csrf
                        <div class="d-flex">
                            <div class="col-6 d-block">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Mã thuốc:</label>
                                            <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                                placeholder="TKV01">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Mã nhóm thuốc:</label>
                                            <input type="text" class="input-form pl-2" name="dr_id" id="exampleInput1"
                                                placeholder="KV001">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Tên thuốc:</label>
                                            <input type="text" class="input-form pl-2" name="name" id="exampleInput1"
                                                placeholder="Amoxicillin">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Đơn vị tính:</label>
                                            <input type="text" class="input-form pl-2" name="dvt" id="exampleInput1"
                                                placeholder="10Viênx5Vỉx1Hộp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Thành phần hoạt chất:</label>
                                            <input type="text" class="input-form pl-2" name="tp" id="exampleInput1"
                                                placeholder="Amoxicillin">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Hướng dẫn sử dụng:</label>
                                            <input type="text" class="input-form pl-2" name="hdsd" id="exampleInput1"
                                                placeholder="1 đến 3 tháng tuổi: 20-30mg/kg chia 2 lần/ngày uống.">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-block">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Mã nhà cung cấp:</label>
                                            <input type="text" class="input-form pl-2" name="sl_id" id="exampleInput1"
                                                placeholder="LC207">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Mã nhà sản xuất:</label>
                                            <input type="text" class="input-form pl-2" name="pd_id" id="exampleInput1"
                                                placeholder="NSX01">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Ngày sản xuất:</label>
                                            <input type="text" class="input-form pl-2" name="mfg" id="exampleInput1"
                                                placeholder="2023-01-01">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Hạn sử dụng:</label>
                                            <input type="text" class="input-form pl-2" name="exp"
                                                id="exampleInput1" placeholder="2023-10-01">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Điều trị:</label>
                                            <input type="text" class="input-form pl-2" name="dt"
                                                id="exampleInput1"
                                                placeholder="Nhiễm trùng hô hấp (viêm phổi, viêm xoang,..)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Chống chỉ định:</label>
                                            <input type="text" class="input-form pl-2" name="ccd"
                                                id="exampleInput1"
                                                placeholder="Viêm đường hô hấp, nhiễm trùng đường mật.">
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right pt-2">
                                    <button type="reset" class="btn btn-secondary">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- </themthuoc> --}}
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
