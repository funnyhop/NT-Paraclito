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
                                    <th>Đơn vị tính</th>
                                    <th>Số lượng</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $previousThuocID = null;
                                    $row = 0;

                                    if ($medicines && $medicines->first() && $medicines->first()->ThuocID !== null) {
                                        $row = $medicines->first()->ThuocID;
                                        $rowCount = count($tonkho->where('medicine_id', $row));
                                    }
                                @endphp
                                @foreach ($medicines as $medicine)
                                    <tr>
                                        <td rowspan="{{ $medicines ? $rowCount + 1 : 0 }}">{{ $medicine->ThuocID }}</td>
                                        <td rowspan="{{ $medicines ? $rowCount + 1 : 0 }}">{{ $medicine->Tenthuoc }}</td>
                                        <td rowspan="{{ $medicines ? $rowCount + 1 : 0 }}">{{ $medicine->HSD }}</td>
                                        <td rowspan="{{ $medicines ? $rowCount + 1 : 0 }}">{{ $medicine->druggr_id }}</td>
                                        <td rowspan="{{ $medicines ? $rowCount + 1 : 0 }}">{{ $medicine->supplier_id }}</td>
                                        <td rowspan="{{ $medicines ? $rowCount + 1 : 0 }}">{{ $medicine->DVT }}</td>
                                        @foreach ($tonkho as $value)
                                            @if ($value->medicine_id == $medicine->ThuocID)
                                                <tr>
                                                    <td>{{ $value->warehouse_id }}</td>
                                                    <td>{{ $value->Soluong }}</td>
                                                    <td><a
                                                        href="{{ route('checkinventory.edit', ['warehouse_id' => $value->warehouse_id, 'medicine_id' => $value->medicine_id]) }}">
                                                        <i class="fa-solid fa-pen-to-square"></i></a>
                                                    </td>
                                                    <td>
                                                        <form
                                                            action="{{ route('checkinventory.destroy', ['warehouse_id' => $value->warehouse_id, 'medicine_id' => $value->medicine_id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-trash">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
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
