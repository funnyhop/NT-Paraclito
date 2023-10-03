@extends('layouts.admin')
@section('title')
    <title>Khách hàng</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0 text-dark">Cập nhật thông tin khách hàng</h3>
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
            <div class="container-fluid">
                <div class="row pl-5 pt-3">
                    <div class="mx-auto col-8">
                        <form action="/customers/{{ $customer->KHID }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1">Mã khách hàng:</label>
                                <input type="text" class="input-form" name="id" id="exampleInput1"
                                    value="{{ $customer->KHID }}" placeholder="KH001">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1">Tên khách hàng:</label>
                                <input type="text" class="input-form" name="name" id="exampleInput1"
                                    value="{{ $customer->TenKH }}" placeholder="Nguyen Van A">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1">Số điện thoại:</label>
                                <input type="text" class="input-form" name="sdt" id="exampleInput1"
                                    value="{{ $customer->SDT }}" placeholder="039287593">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1">Địa chỉ:</label>
                                <input type="text" class="input-form" name="address" id="exampleInput1"
                                    value="{{ $customer->Diachi }}" placeholder="Ninh Kieu-CT">
                            </div>
                            <div class="float-right pt-2">
                                <a href="/customers" class="btn btn-secondary">Hủy</a>
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
