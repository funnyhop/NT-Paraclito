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
                                <input class="form-control form-control-navbar" name="key" type="search" placeholder="Search"
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
                    <li class="pr-1"><a href="{{ route('medicines') }}">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="{{ route('medicines.create') }}">Thêm</a></li>
                </div>
                <div class="pt-5 pb-5">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Mã thuốc</th>
                                    <th>Tên thuốc</th>
                                    <th>ĐVT</th>
                                    <th>NSX</th>
                                    <th>HSD</th>
                                    <th>Thành phần hoạt chất</th>
                                    <th>Điều trị</th>
                                    <th>HDSD</th>
                                    <th>Chống chỉ định</th>
                                    <th>Nhóm thuốc</th>
                                    <th>NCC</th>
                                    <th>NSX</th>
                                    <th>Cập nhật</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicines as $medicine)
                                    <tr>
                                        <td>{{ $medicine->ThuocID }}</td>
                                        <td class="text-left">{{ $medicine->Tenthuoc }}</td>
                                        <td>{{ $medicine->DVT }}</td>
                                        <td>{{ $medicine->NSX }}</td>
                                        <td>{{ $medicine->HSD }}</td>
                                        <td class="text-left">{{ $medicine->TPhoatchat }}</td>
                                        <td class="text-left">{{ $medicine->Dieutri }}</td>
                                        <td class="text-left">{{ $medicine->HDSD }}</td>
                                        <td class="text-left">{{ $medicine->Chongchidinh }}</td>
                                        <td class="text-left">{{ $medicine->druggr_id }}</td>
                                        <td class="text-left">{{ $medicine->supplier_id }}</td>
                                        <td class="text-left">{{ $medicine->producer_id }}</td>
                                        <td><a href="{{ route('medicines.edit', ['ThuocID' => $medicine->ThuocID]) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td>
                                            <form action="{{ route('medicines.destroy', ['ThuocID' => $medicine->ThuocID]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn-trash">
                                                    <i class="fa-solid fa-trash "></i>
                                                </button>
                                            </form>
                                        </td>
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
