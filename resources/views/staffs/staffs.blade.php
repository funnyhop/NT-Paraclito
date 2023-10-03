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
            <div class="container-fluid">
                <div class="float-right d-inline-flex pr-2">
                    <li class="pr-1"><a href="staffs">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="staffs/create">Thêm</a></li>
                </div>
                <div class="row pt-5 pl-4 d-flex">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ và tên</th>
                                    <th>SDT</th>
                                    <th>Địa chỉ</th>
                                    <th>Chức vụ</th>
                                    <th>Cập nhật</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)
                                    <tr>
                                        <td>{{ $staff->NVID }}</td>
                                        <td class="text-left">{{ $staff->TenNV }}</td>
                                        <td class="text-left">{{ $staff->SDT }}</td>
                                        <td class="text-left">{{ $staff->Diachi }}</td>
                                        <td class="text-left">{{ $staff->Chucvu }}</td>
                                        <td><a href="staffs/{{ $staff->NVID }}/edit"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td>
                                            <form action="/staffs/{{ $staff->NVID }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn-trash">
                                                    <i class="fa-solid fa-trash "></i>
                                                </button>
                                            </form>
                                        </td>                                    </tr>
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
