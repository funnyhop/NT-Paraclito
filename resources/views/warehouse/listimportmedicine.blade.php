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
            <div class="container-fluid">
                <div class="float-right d-inline-flex pr-2">
                    <li class="pr-1"><a href="/items">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="items/create">Thêm</a></li>
                </div>
                <div class="pt-5 pl-4 col-11">
                    <table class="table table-bordered text-center">
                        <thead>
                            <th>IDPN</th>
                            <th>Tên kho</th>
                            <th>Ngày nhập</th>
                            <th>Số lô sản xuất</th>
                            <th>Tên nhân viên</th>
                            <th>Tên thuốc</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </thead>
                        <tbody>
                            @foreach ($listpn as $item)
                                <tr>
                                    <td rowspan="{{ $item->PNID ? (int) $item->PNID + 3 : 1 }}">{{ $item->PNID }}</td>
                                    <td rowspan="{{ $item->PNID ? (int) $item->PNID + 3 : 1 }}">{{ $item->Tenkho }}</td>
                                    <td rowspan="{{ $item->PNID ? (int) $item->PNID + 3 : 1 }}">{{ $item->created_at }}
                                    </td>
                                    <td rowspan="{{ $item->PNID ? (int) $item->PNID + 3 : 1 }}">{{ $item->Lothuoc }}</td>
                                    <td rowspan="{{ $item->PNID ? (int) $item->PNID + 3 : 1 }}">{{ $item->TenNV }}</td>
                                    @foreach ($listgpn as $value)
                                        @if ($value->phieunhap_id == $item->PNID)
                                            <tr>
                                                <td>{{ $value->Tenthuoc }}</td>
                                                <td>{{ $value->Soluong }}</td>
                                                <td>{{ $value->Gia }} vnđ</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
