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
                    <li class="pl-1"><a href="#">Thêm</a></li>
                </div>
                <div class="pt-4 mx-auto col-7">
                    <form action="/pre_create" method="post">
                        @csrf
                        <div class="input-group d-flex pb-2">
                            <label for="exampleInput1">Mã toa thuốc:</label>
                            <input type="text" class="input-form" name="id" id="exampleInput1" placeholder="T0001">
                        </div>
                        <div class="input-group d-flex pb-2">
                            <label for="exampleInput1">Tên bác sĩ:</label>
                            <input type="text" class="input-form" name="bs" id="exampleInput1" placeholder="Nguyen Van A">
                        </div>
                        <div class="input-group d-flex pb-2">
                            <label for="exampleInput1">Tên bệnh viện</label>
                            <input type="text" class="input-form" name="bv" id="exampleInput1"
                                placeholder="Bệnh viện Hoàn Mỹ Cần Thơ">
                        </div>
                        <div class="input-group d-flex pb-2">
                            <label for="exampleInput1">Ngày tạo</label>
                            <input type="text" class="input-form" name="nt" id="exampleInput1"
                                placeholder="2023-10-12">
                        </div>
                        <div class="float-right pt-2 pb-5">
                            <button type="reset" class="btn btn-secondary">Hủy</button>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
