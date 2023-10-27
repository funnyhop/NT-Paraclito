@extends('layouts.admin')
@section('title')
    <title>Cập nhật phiếu nhập</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0 text-dark">Cập nhật phiếu nhập</h3>
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
                    <li class="pr-1"><a href="{{ route('importmedicines') }}">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="{{ route('importmedicines.createpn') }}">Thêm</a></li>
                </div>
                <div class="pt-4 mx-auto col-7 pb-4">
                        <form action="{{ route('importmedicines.update', ['PNID' => $importmedicine->PNID]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Mã phiếu nhập:</label>
                                        <input type="text" class="input-form" name="PNID" id="exampleInput1"
                                            value="{{ $importmedicine->PNID }}" placeholder="PN001">
                                    </div>
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Ngày nhập:</label>
                                        <input type="text" class="input-form" name="created_at" id="exampleInput1"
                                            value="{{ $importmedicine->created_at }}" placeholder="2023-12-12 12:32:59">
                                    </div>
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Mã kho:</label>
                                        <input type="text" class="input-form" name="warehouse_id" id="exampleInput1"
                                            value="{{ $importmedicine->warehouse_id }}" placeholder="K0001">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Số lô:</label>
                                        <input type="text" class="input-form" name="Lothuoc" id="exampleInput1"
                                            value="{{ $importmedicine->Lothuoc }}" placeholder="20231012">
                                    </div>
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Mã nhân viên:</label>
                                        <input type="text" class="input-form" name="staff_id" id="exampleInput1"
                                            value="{{ $importmedicine->staff_id }}" placeholder="BT001">
                                    </div>
                                    <div class="float-right pt-4 mt-2">
                                        <button type="reset" class="btn btn-secondary">Hủy</button>
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
