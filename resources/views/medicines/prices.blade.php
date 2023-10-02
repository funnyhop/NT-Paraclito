@extends('layouts.admin')
@section('title')
    <title>Thêm giá thuốc</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Giá thuốc tây</h1>
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
                    <li class="pr-1"><a href="/prices">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="prices/create">Thêm</a></li>
                </div>
                <div class="pt-5 pl-4 col-8">
                    <div class="table-responsive">
                        <h6><b>Giá thuốc:</b></h6>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã thuốc</th>
                                    <th>Ngày</th>
                                    <th>Giá</th>
                                    <th>Cập nhật</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prs as $pr)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $pr->medicine_id }}</td>
                                        <td>{{ $pr->ngay_id }}</td>
                                        <td>{{ $pr->Gia }}</td>
                                        <td><a
                                                href="{{ route('prices.priceEdit', ['ngay_id' => $pr->ngay_id, 'medicine_id' => $pr->medicine_id]) }}">
                                                <i class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('prices.priceDestroy', ['ngay_id' => $pr->ngay_id, 'medicine_id' => $pr->medicine_id]) }}" method="POST">
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
