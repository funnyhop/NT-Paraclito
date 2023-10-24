@extends('layouts.admin')
@section('title')
    <title>Cập nhật thông tin cá nhân</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Cập nhật thông tin cá nhân</h1>
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
            <div class="container-fluid  pb-5">
                <div class="row pt-5 pl-4 d-flex">
                    <div class="col-3"></div>
                    <div class="col-7">
                        <form action="{{ route('profile.update', ['NVID' => $user->NVID]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1" class="pr-2">Mã nhân viên:</label>
                                <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                    value="{{ $user->NVID }}" placeholder="BT001">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Tên nhân viên:</label>
                                <input type="text" class="input-form pl-2" name="name" value="{{ $user->TenNV }}"
                                    id="exampleInput2" placeholder="Nguyen Van A">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Số điện thoại:</label>
                                <input type="text" class="input-form pl-2" name="sdt" id="exampleInput2"
                                    value="{{ $user->SDT }}" placeholder="0912012122">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Email:</label>
                                <input type="text" class="input-form pl-2" name="email" id="exampleInput2"
                                    value="{{ $user->email }}" placeholder="email@gmail.com">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Password:</label>
                                <input type="password" class="input-form pl-2" name="password" id="exampleInput2"
                                    value="{{ $user->password }}" placeholder="123">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Địa chỉ:</label>
                                <input type="text" class="input-form pl-2" name="address" id="exampleInput2"
                                    value="{{ $user->Diachi }}"
                                    placeholder="63/6 Khu dân cư Hậu Thạnh Mỹ, Lê Bình, Cái Răng-Cần Thơ">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Chức vụ:</label>
                                <input type="text" class="input-form pl-2" name="cv" id="exampleInput2"
                                    value="{{ $user->Chucvu }}" placeholder="Bán thuốc">
                            </div>
                            <div class="float-right pr-1 pt-2">
                                <a href="/users" class="btn btn-secondary">Hủy</a>
                                <button type="submit" class="btn btn-primary">Thêm</button>
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
