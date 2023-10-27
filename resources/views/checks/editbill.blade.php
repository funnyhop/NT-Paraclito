@extends('layouts.admin')
@section('title')
    <title>Cập nhật hóa đơn</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0 text-dark">Cập nhật hóa đơn</h3>
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
                    <li class="pr-1"><a href="{{ route('bills') }}">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="{{ route('sales') }}">Thêm</a></li>
                </div>
                <div class="pt-4 mx-auto col-7 pb-4">
                        <form action="{{ route('bills.update', ['HDID' => $bill->HDID]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Mã hóa đơn:</label>
                                        <input type="text" class="input-form" name="HDID" id="exampleInput1"
                                            value="{{ $bill->HDID }}" placeholder="HD001">
                                    </div>
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Ngày lập:</label>
                                        <input type="text" class="input-form" name="created_at" id="exampleInput1"
                                            value="{{ $bill->created_at }}" placeholder="2023-12-12 12:32:59">
                                    </div>
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Đối tượng sử dụng:</label>
                                        <input type="text" class="input-form" name="DoituongSD" id="exampleInput1"
                                            value="{{ $bill->DoituongSD }}" placeholder="K0001">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Mã toa:</label>
                                        <input type="text" class="input-form" name="prescription_id" id="exampleInput1"
                                            value="{{ $bill->prescription_id }}" placeholder="T0001">
                                    </div>
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Mã nhân viên:</label>
                                        <input type="text" class="input-form" name="staff_id" id="exampleInput1"
                                            value="{{ $bill->staff_id }}" placeholder="BT001">
                                    </div>
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Mã khách hàng:</label>
                                        <input type="text" class="input-form" name="customer_id" id="exampleInput1"
                                            value="{{ $bill->customer_id }}" placeholder="KH001">
                                    </div>
                                </div>
                            </div>
                            <div class="float-right pt-2">
                                <a href="{{ route('bills') }}" class="btn btn-secondary">Hủy</a>
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
