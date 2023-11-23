@extends('layouts.admin')
@section('title')
    <title>Bán thuốc</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Bán thuốc</h1>
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
                <div class="row pl-4 pt-2 border-right">
                    <div class="col-4 pl-2 pr-2">
                        <b>Thêm hóa đơn:</b>
                    </div>
                </div>
                <div class=" pt-1 pl-2">
                    <div class="row pl-4">
                        <form action="{{ route('sales') }}" method="post">
                            @csrf
                            <div class="d-flex ">
                                <div class="input-group d-flex pb-2 pr-3">
                                    <label for="exampleInput1">Mã hóa đơn:</label>
                                    <input type="text" class="input-form" name="idhd" value="{{ $newHDID }}" id="exampleInput1" placeholder="HD001">
                                </div>
                                <div class="input-group d-flex pb-2 pr-3">
                                    <label for="manv">Nhân viên lập hóa đơn:</label>
                                    {{-- <input type="text" class="input-form" id="exampleInput1" placeholder="BT001"> --}}
                                    <select class="input-select pl-2" name="staff_id" id="manv">
                                        <option value="{{ Auth::check() && Auth::user()->NVID ? Auth::user()->NVID : '' }}">{{ Auth::user()->TenNV }}</option>
                                        {{-- <option selected disabled>Chọn nhân viên</option> --}}
                                        {{-- @foreach ($staffs as $staff)
                                            <option value="{{ $staff->NVID }}">{{ $staff->TenNV }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="input-group d-flex pb-2 pr-3">
                                    <label for="exampleInput1">Toa thuốc:</label>
                                    {{-- <input type="text" class="input-form" id="exampleInput1"
                                        placeholder="T0000/không có toa"> --}}
                                    <select class="input-select pl-2" name="prescription_id" id="manv">
                                        <option value="" selected disabled>Chọn toa thuốc</option>
                                        @foreach ($pres as $pre)
                                            <option value="{{ $pre->ToaID }}">{{ $pre->ToaID }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group d-flex pb-2 pr-3">
                                    <label for="exampleInput1">Mã khách hàng:</label>
                                    {{-- <input type="text" class="input-form" id="exampleInput1" placeholder="KH001"> --}}
                                    <select class="input-select pl-2" name="customer_id" id="mat">
                                        <option selected disabled>Chọn mã KH</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->KHID }}">{{ $customer->KHID }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group d-flex pb-2 pr-3">
                                    <label for="exampleInput1">Đối tượng sử dụng:</label>
                                    <input type="text" class="input-form" name="DoituongSD" id="exampleInput1" placeholder="TE001">
                                </div>
                            </div>
                            <div class="float-right pt-2 pr-3">
                                <button type="reset" class="btn btn-secondary">Hủy</button>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                    <div class="row pl-4">
                        <form action="{{ route('sales') }}" method="post">
                            @csrf
                            <div>
                                <b>Ghi đơn thuốc:</b>
                            </div>
                            <div class="d-flex ">
                                <div class="input-group d-flex pb-2 pr-3">
                                    <label for="exampleInput1">Mã hóa đơn:</label>
                                    {{-- <input type="text" class="input-form" id="exampleInput1" placeholder="HD001"> --}}
                                    <select class="input-select pl-2" name="bill_id" id="mat">
                                        <option selected disabled>Chọn HD</option>
                                        @foreach ($bills as $bill)
                                            <option value="{{ $bill->HDID }}">{{ $bill->HDID }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group d-flex pb-2 pr-3">
                                    <label for="mat">Mã thuốc:</label>
                                    {{-- <input type="text" class="input-form" id="exampleInput1" placeholder="TKV01"> --}}
                                    <select class="input-select pl-2" name="medicine_id" id="mat">
                                        <option selected disabled>Chọn thuốc</option>
                                        @foreach ($drs as $dr)
                                            <option value="{{ $dr->ThuocID }}">{{ $dr->Tenthuoc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group d-flex pb-2 ">
                                    <label for="exampleInput1">Số lượng:&nbsp;&nbsp;<i>(viên)</i></label>
                                    <input type="text" class="input-form" name="sl" id="exampleInput1" placeholder="1">
                                </div>
                            </div>
                            <div class="float-right pt-2">
                                <button type="submit" class="btn btn-primary">Ghi</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

