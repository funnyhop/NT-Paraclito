@extends('layouts.admin')
@section('title')
    <title>Nhà cung cấp</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Nhà cung cấp</h1>
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
                <div class="float-right d-inline-flex pr-2">
                    <li class="pr-1"><a href="{{ route('suppliers') }}">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="{{ route('suppliers.create') }}">Thêm</a></li>
                </div>
                <div class="row pt-5 pl-4 d-flex">
                    <div class="col-3"></div>
                    <div class="col-7">
                        <form action="{{ route('suppliers.store') }}" method="post">
                            @csrf
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1" class="pr-2">Mã nhà cung cấp:</label>
                                <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                    placeholder="LC207">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Tên nhà cung cấp:</label>
                                <input type="text" class="input-form pl-2" name="name" id="exampleInput2"
                                    placeholder="Công ty Cổ Phần Dược Phẩm FPT Long Châu">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Địa chỉ:</label>
                                <input type="text" class="input-form pl-2" name="address" id="exampleInput2"
                                    placeholder="379-381 Hai Bà Trưng, P. Võ Thị Sáu, Q.3, TP. HCM">
                            </div>
                            <div class="float-right pr-1 pt-2">
                                <button type="reset" class="btn btn-secondary">Hủy</button>
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
