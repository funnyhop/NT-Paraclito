@extends('layouts.admin')
@section('title')
    <title>Ghi phiếu nhập</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Ghi phiếu nhập</h1>
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
                <div class="float-right d-inline-flex ghihd-2">
                    <li class="ghihd-1"><a href="{{ route('ghipns') }}">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="{{ route('ghipns.create') }}">Thêm</a></li>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="pt-5 pl-4 ml-0 col-8">
                        <div class="table-responsive ">
                            <h6><b>Giá thuốc:</b></h6>
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã thuốc</th>
                                        <th>Mã phiếu nhập</th>
                                        <th>Số lượng <i>(viên)</i></th>
                                        <th>Đơn giá</th>
                                        <th>Cập nhật</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ghipns as $ghipn)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $ghipn->medicine_id }}</td>
                                            <td>{{ $ghipn->phieunhap_id }}</td>
                                            <td>{{ $ghipn->Soluong }}</td>
                                            <td>{{ $ghipn->Gia }}</td>
                                            <td><a
                                                    href="{{ route('ghipns.edit', ['phieunhap_id' => $ghipn->phieunhap_id, 'medicine_id' => $ghipn->medicine_id]) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('ghipns.destroy', ['phieunhap_id' => $ghipn->phieunhap_id, 'medicine_id' => $ghipn->medicine_id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-trash">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
