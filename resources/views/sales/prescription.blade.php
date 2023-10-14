@extends('layouts.admin')
@section('title')
    <title>Toa thuốc</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0 text-dark">Toa thuốc</h3>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3 float-right">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" name="key" placeholder="Search"
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
                    <li class="pr-1"><a href="{{ route('prescription') }}">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="{{ route('prescription.pre_create') }}">Thêm</a></li>
                </div>
                <div class="pt-5 pl-4 col-10">
                    <table class="table table-bordered text-center">
                        <thead>
                            <th>Mã toa thuốc</th>
                            <th>Tên bác sĩ</th>
                            <th>Bệnh viện</th>
                            <th>Ngày tạo</th>
                            <th>Cập nhật</th>
                            <th>Xóa</th>
                        </thead>
                        <tbody>
                            @foreach ($prs as $pre)
                                <tr>
                                    <td>{{ $pre->ToaID }}</td>
                                    <td>{{ $pre->TenBS }}</td>
                                    <td>{{ $pre->TenBV }}</td>
                                    <td>{{ $pre->Ngaytao }}</td>
                                    <td><a href="{{ route('prescription.pre_edit', ['ToaID' => $pre->ToaID]) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td>
                                        <form action="{{ route('prescription.pre_destroy', ['ToaID' => $pre->ToaID]) }}" method="post">
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
