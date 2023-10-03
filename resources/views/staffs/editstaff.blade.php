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
            <div class="container-fluid  pb-5">
                <div class="row pt-5 pl-4 d-flex">
                    <div class="col-3"></div>
                    <div class="col-7">
                        <form action="/staffs/{{ $staff->NVID }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1" class="pr-2">Mã nhân viên:</label>
                                <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                    value="{{ $staff->NVID }}" placeholder="BT001">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Tên nhân viên:</label>
                                <input type="text" class="input-form pl-2" name="name" value="{{ $staff->TenNV }}"
                                    id="exampleInput2" placeholder="Nguyen Van A">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Số điện thoại:</label>
                                <input type="text" class="input-form pl-2" name="sdt" id="exampleInput2"
                                    value="{{ $staff->SDT }}" placeholder="0912012122">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Địa chỉ:</label>
                                <input type="text" class="input-form pl-2" name="address" id="exampleInput2"
                                    value="{{ $staff->Diachi }}"
                                    placeholder="63/6 Khu dân cư Hậu Thạnh Mỹ, Lê Bình, Cái Răng-Cần Thơ">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Chức vụ:</label>
                                <input type="text" class="input-form pl-2" name="cv" id="exampleInput2"
                                    value="{{ $staff->Chucvu }}" placeholder="Bán thuốc">
                            </div>
                            <div class="float-right pr-1 pt-2">
                                <a href="/staffs" class="btn btn-secondary">Hủy</a>
                                <button type="submit" class="btn btn-primary">Thêm</button>
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
