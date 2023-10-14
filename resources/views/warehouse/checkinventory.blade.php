@extends('layouts.admin')
@section('title')
    <title>Kiểm kho</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Kho thuốc</h1>
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
                {{-- <div class="float-right d-inline-flex pr-2">
              <li class="pr-1"><a href="medicines">Danh sách</a></li>
              <a href="#">/</a>
              <li class="pl-1"><a href="themthuoc">Thêm</a></li>
          </div> --}}
                <div class="pt-4">
                    <div class="col">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Mã thuốc</th>
                                    <th>Tên thuốc</th>
                                    <th>HSD</th>
                                    <th>Nhóm thuốc</th>
                                    <th>Nhà cung cấp</th>
                                    <th>Số lượng</th>
                                    <th>Đơn vị tính</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $previousThuocID = null;
                                @endphp

                                @foreach ($medicines as $medicine)
                                    <tr>
                                        {{-- Kiểm tra xem $medicine->ThuocID có khác với $previousThuocID không --}}
                                        @if ($medicine->ThuocID != $previousThuocID)
                                            <td>{{ $medicine->ThuocID }}</td>
                                            <td class="text-left">{{ $medicine->Tenthuoc }}</td>
                                            <td>{{ $medicine->HSD }}</td>
                                            <td class="text-left">{{ $medicine->Tennhom }}</td>
                                            <td>{{ $medicine->TenNCC }}</td>
                                            {{-- Cập nhật giá trị $previousThuocID --}}
                                            @php
                                                $previousThuocID = $medicine->ThuocID;
                                            @endphp
                                        @endif

                                        @if ($medicine->phieunhap_id == $phieunhaps->first()->PNID)
                                            @php
                                                $soluong = $phieunhaps->first()->Soluong - $medicine->Soluong;
                                            @endphp
                                            <td>{{ $soluong }}</td>
                                            <td>{{ $medicine->DVT }}</td>
                                        @endif
                                    </tr>
                                @endforeach

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
