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
                    <div class="col-sm-6">
                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3 float-right">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="key"
                                    placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit"
                                        style="background-color: #e0f8f1; border-color: silver;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                            <th>Sửa</th>
                            <th>Xóa</th>
                            <th>Tên thuốc</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                        </thead>
                        <tbody>
                            @php
                                $previousPNID = null;
                                $row = 0;
                            @endphp

                            @foreach ($listpn as $item)
                                <tr>
                                    @if ($item->PNID != $previousPNID)
                                        <td rowspan="{{ count($listgpn->where('phieunhap_id', $item->PNID)) + 1 }}">
                                            {{ $item->PNID }}
                                        </td>
                                        <td rowspan="{{ count($listgpn->where('phieunhap_id', $item->PNID)) + 1 }}">
                                            {{ $item->warehouse_id }}
                                        </td>
                                        <td rowspan="{{ count($listgpn->where('phieunhap_id', $item->PNID)) + 1 }}">
                                            {{ $item->created_at }}
                                        </td>
                                        <td rowspan="{{ count($listgpn->where('phieunhap_id', $item->PNID)) + 1 }}">
                                            {{ $item->Lothuoc }}
                                        </td>
                                        <td rowspan="{{ count($listgpn->where('phieunhap_id', $item->PNID)) + 1 }}">
                                            {{ $item->staff_id }}
                                        </td>
                                        <td rowspan="{{ count($listgpn->where('phieunhap_id', $item->PNID)) + 1 }}">
                                            <a href="{{ route('importmedicines.edit', ['PNID' => $item->PNID]) }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                        <td rowspan="{{ count($listgpn->where('phieunhap_id', $item->PNID)) + 1 }}">
                                            <form action="{{ route('importmedicines.destroy', ['PNID' => $item->PNID]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-trash">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @php
                                            $previousPNID = $item->PNID;
                                        @endphp
                                    @endif

                                    @foreach ($listgpn->where('phieunhap_id', $item->PNID) as $value)
                                        <tr>
                                            <td>{{ $value->Tenthuoc }}</td>
                                            <td>{{ $value->Soluong }}</td>
                                            <td>{{ $value->Gia }} vnđ</td>
                                        </tr>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
