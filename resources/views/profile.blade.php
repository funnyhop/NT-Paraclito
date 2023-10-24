@extends('layouts.admin')
@section('title')
    <title>Thông tin cá nhân</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thông tin cá nhân</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row pt-5 pl-4 d-flex">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ và tên</th>
                                    <th>SDT</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Chức vụ</th>
                                    <th>Vai trò</th>
                                    <th>Chỉnh sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ $user->NVID }}</td>
                                        <td class="text-left">{{ $user->TenNV }}</td>
                                        <td class="text-left">{{ $user->SDT }}</td>
                                        <td class="text-left">{{ $user->email }}</td>
                                        <td class="text-left">{{ $user->Diachi }}</td>
                                        <td class="text-left">{{ $user->Chucvu }}</td>
                                        <td class="text-left">{{ $user->role_id }}</td>
                                        <td><a href="{{ route('profile.edit', ['NVID' => $user->NVID]) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    </tr>
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
