@extends('layouts.admin')
@section('title')
    <title>Thông tin chi tiết</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thông tin chi tiết</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <a class="float-right" href="{{ route('bills') }}"><i class="fa-solid fa-arrow-left-long fa-xl"></i></a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2"></div>
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
                                                    href="{{ route('chitiet.edit', ['bill_id' => $ghihd->bill_id, 'medicine_id' => $ghihd->medicine_id]) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('chitiet.destroy', ['bill_id' => $ghihd->bill_id, 'medicine_id' => $ghihd->medicine_id]) }}" method="POST">
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
