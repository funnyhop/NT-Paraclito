@extends('layouts.admin')
@section('title')
    <title>Danh sách phiếu nhập</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Phiếu nhập</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3 float-right">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="key" placeholder="Search"
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
                <div class="pt-5 pl-4 col-11">
                    <table class="table table-bordered text-center">
                        <thead>
                            <th>IDPN</th>
                            <th>Mã kho</th>
                            <th>Ngày nhập</th>
                            <th>Số lô sản xuất</th>
                            <th>Mã nhân viên</th>
                            <th>Tên thuốc</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                        </thead>
                        <tbody>
                            @php
                                $previousPNID = null;
                                $row = 0;

                                if ($listpn && $listpn->first() && $listpn->first()->PNID !== null) {
                                    $row = $listpn->first()->PNID;
                                    $rowCount = count($listgpn->where('phieunhap_id', $row));
                                }
                            @endphp
                            @foreach ($listpn as $item)
                                <tr>
                                    @if ($item->PNID != $previousPNID)
                                        <td rowspan="{{ $listpn ? $rowCount + 1 : 0 }}">{{ $item->PNID }}</td>
                                        <td rowspan="{{ $listpn ? $rowCount + 1 : 0 }}">{{ $item->warehouse_id }}</td>
                                        <td rowspan="{{ $listpn ? $rowCount + 1 : 0 }}">{{ $item->created_at }}</td>
                                        <td rowspan="{{ $listpn ? $rowCount + 1 : 0 }}">{{ $item->Lothuoc }}</td>
                                        <td rowspan="{{ $listpn ? $rowCount + 1 : 0 }}">{{ $item->staff_id }}</td>
                                        @php
                                            $previousPNID = $item->PNID;
                                        @endphp
                                    @endif

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
