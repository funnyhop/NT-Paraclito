@extends('layouts.admin')
@section('title')
    <title>Cập nhật chi tiết đơn thuốc (HD)</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0 text-dark">Cập nhật chi tiết đơn thuốc (HD)</h3>
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
            <div class="container-fluid pb-5">
                <div class="float-right d-inline-flex pr-2">
                    <li class="pr-1"><a href="{{ route('ghihds') }}">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="{{ route('ghihds.create') }}">Thêm</a></li>
                </div>
                <div class="row pt-5 pl-5">
                    <form
                        action="{{ route('ghihds.update', ['bill_id' => $ghihd->bill_id, 'medicine_id' => $ghihd->medicine_id]) }}"
                        method="post">
                        @csrf
                        @method('put')
                        <div class="row pr-2">
                            <div class="col-4">
                                <div class="input-group pb-1">
                                    <label for="exampleInput1">Mã thuốc:</label>
                                    <input type="text" class="input-form pl-2" name="medicine_id" id="exampleInput1"
                                        value="{{ $ghihd->medicine_id }}" placeholder="TKV01">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="exampleInput1">Mã hóa đơn:</label>
                                <div class="input-group pb-1">
                                    <input type="text" class="input-form pl-2" name="bill_id" id="exampleInput1"
                                        value="{{ $ghihd->bill_id }}" placeholder="HD001">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group pb-1">
                                    <label for="exampleInput1">Số lượng: &nbsp;<i>(viên)</i></label>
                                    <input type="text" class="input-form pl-2" name="Soluong" id="exampleInput1"
                                        value="{{ $ghihd->Soluong }}" placeholder="1000">
                                </div>
                            </div>
                        </div>
                        <div class="row pl-5  d-flex">
                            <div class="col">
                                <div class="pt-2 float-right pr-2">
                                    <a href="{{ route('ghihds') }}" class="btn btn-secondary">Hủy</a>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection