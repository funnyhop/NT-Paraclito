@extends('layouts.admin')
@section('title')
    <title>Hóa đơn bán</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Hóa đơn bán</h1>
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
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="pt-5">
                    <div style="border: 1px solid #bfdfd5">
                        <form action="">
                            <div class="d-block text-lg-center pt-3 mb-3">
                                <b>NHÀ THUỐC PARACLITO</b>
                                <p class="m-0">CT262/01/07, 304/D2-CTU</p>
                                <b>Hotline: 0909056789</b>
                            </div>
                            <div class="d-block text-lg-center mb-2">
                                <b class="">HOÁ ĐƠN</b>
                                <p class="m-0">Ngày: 12/02/2023</p>
                                <p class="m-0">Mã hóa đơn: HD001</p>
                                <p class="m-0">Nhân viên: Nguyễn Văn B</p>
                                <p class="m-0">Khách hàng: Nguyễn Văn A</p>
                                <p class="m-0">ĐT: 0927354758</p>
                            </div>
                            <div class="pl-1 pr-1">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>SL</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Amoxicillin</td>
                                            <td>30 viên</td>
                                            <td>1000</td>
                                            <td>30000</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <i style="font-size: 15px;">(*)Cảm ơn quý khách đã sử dụng dịch vụ Nhà thuốc
                                    Paralito</i>
                            </div>
                            <div class="float-right pt-1">
                                <button type="button" class="btn btn-primary">In</button>
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
