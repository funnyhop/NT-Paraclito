@extends('layouts.admin')
@section('title')
    <title>Ghi đơn thuốc</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Ghi đơn thuốc</h1>
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
                <div class="float-right d-inline-flex ghihd-2">
                    <li class="ghihd-1"><a href="{{ route('ghihds') }}">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="{{ route('ghihds.create') }}">Thêm</a></li>
                </div>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="pt-5 pl-0 ml-0 col-8">
                        <div class="table-responsive ">
                            <h6><b>Giá thuốc:</b></h6>
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã thuốc</th>
                                        <th>Mã hóa đơn</th>
                                        <th>Số lượng <i>(viên)</i></th>
                                        <th>Cập nhật</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ghihds as $ghihd)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $ghihd->medicine_id }}</td>
                                            <td>{{ $ghihd->bill_id }}</td>
                                            <td>{{ $ghihd->Soluong }}</td>
                                            <td><a
                                                    href="{{ route('ghihds.edit', ['bill_id' => $ghihd->bill_id, 'medicine_id' => $ghihd->medicine_id]) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('ghihds.destroy', ['bill_id' => $ghihd->bill_id, 'medicine_id' => $ghihd->medicine_id]) }}" method="POST">
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
