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
                                <input class="form-control form-control-navbar" name="key" type="search"
                                    placeholder="Search" aria-label="Search">
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
                                    <th>Kho</th>
                                    <th>Số lượng</th>
                                    <th>Đơn vị tính</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $previousThuocID = null;
                                    $previoustk = null;
                                @endphp

                                @foreach ($medicines as $medicine)
                                    <tr>
                                        @foreach ($tonkho as $tk)
                                            {{-- Kiểm tra xem $medicine->ThuocID có khác với $previousThuocID không --}}
                                            @if ($medicine->ThuocID != $previousThuocID && $medicine->ThuocID == $tk->medicine_id)
                                                <td>{{ $medicine->ThuocID }}</td>
                                                <td class="text-left">{{ $medicine->Tenthuoc }}</td>
                                                <td>{{ $medicine->HSD }}</td>
                                                <td>{{ $medicine->druggr_id }}</td>
                                                <td>{{ $medicine->supplier_id }}</td>
                                                {{-- Cập nhật giá trị $previousThuocID --}}
                                                @php
                                                    $previousThuocID = $medicine->ThuocID;
                                                @endphp
                                            @endif
                                            @if ($tk->medicine_id != $previoustk && $tk->medicine_id == $medicine->ThuocID )
                                                <td>{{ $tk->warehouse_id }}</td>
                                                <td>{{ $tk->Soluong }}</td>
                                                <td>{{ $medicine->DVT }}</td>
                                                <td><a
                                                        href="{{ route('checkinventory.edit', ['warehouse_id' => $tk->warehouse_id, 'medicine_id' => $tk->medicine_id]) }}">
                                                        <i class="fa-solid fa-pen-to-square"></i></a>
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ route('checkinventory.destroy', ['warehouse_id' => $tk->warehouse_id, 'medicine_id' => $tk->medicine_id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-trash">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                @php
                                                    $previoustk = $tk->medicine_id;
                                                @endphp
                                            @endif
                                        @endforeach
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
