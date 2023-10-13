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
                <div class="row pl-5 pt-2 border-right">
                    <div class="col-4">
                        <b>Thêm khách hàng:</b>
                    </div>
                    <div class="col-4 pl-2 pr-2">
                        <b>Thêm hóa đơn:</b>
                    </div>
                    <div class="col-4">
                        <b>Ghi đơn thuốc:</b>
                    </div>
                </div>
                <div class="row pt-1 pl-5">
                    <div class="col-4">
                        <form action="/customers" method="">
                            @csrf
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1">Mã khách hàng:</label>
                                <input type="text" class="input-form" name="id" id="exampleInput1"
                                    placeholder="KH001">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1">Tên khách hàng:</label>
                                <input type="text" class="input-form" name="name" id="exampleInput1"
                                    placeholder="Nguyen Van A">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1">Số điện thoại:</label>
                                <input type="text" class="input-form" name="sdt" id="exampleInput1"
                                    placeholder="039287593">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1">Địa chỉ:</label>
                                <input type="text" class="input-form" name="address" id="exampleInput1"
                                    placeholder="Ninh Kieu-CT">
                            </div>
                            <div class="float-right pt-2">
                                <button type="reset" class="btn btn-secondary">Hủy</button>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-4 pl-2 pr-2">
                        <form action="">
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1">Mã hóa đơn:</label>
                                <input type="text" class="input-form" id="exampleInput1" placeholder="HD001">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1">Toa thuốc:</label>
                                {{-- <input type="text" class="input-form" id="exampleInput1"
                                    placeholder="T0000/không có toa"> --}}
                                <select class="input-select pl-2" name="prescription_id" id="manv">
                                    <option selected disabled>Chọn toa thuốc</option>
                                    @foreach ($pres as $pre)
                                        <option value="{{ $pre->ToaID }}">{{ $pre->ToaID }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="manv">Mã nhân viên lập hóa đơn:</label>
                                {{-- <input type="text" class="input-form" id="exampleInput1" placeholder="BT001"> --}}
                                <select class="input-select pl-2" name="staff_id" id="manv">
                                    <option selected disabled>Chọn nhân viên</option>
                                    @foreach ($staffs as $staff)
                                        <option value="{{ $staff->NVID }}">{{ $staff->TenNV }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1">Mã khách hàng:</label>
                                {{-- <input type="text" class="input-form" id="exampleInput1" placeholder="KH001"> --}}
                                <select class="input-select pl-2" name="customer_id" id="mat">
                                    <option selected disabled>Chọn mã KH</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->KHID }}">{{ $customer->KHID }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1">Đối tượng sử dụng:</label>
                                <input type="text" class="input-form" id="exampleInput1" placeholder="TE001">
                            </div>
                            <div class="float-right pt-2 pb-5">
                                <button type="button" class="btn btn-secondary">Hủy</button>
                                <button type="button" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-4 pr-5 pb-5">
                        <form action="" class="pb-1">
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Mã hóa đơn:</label>
                                        {{-- <input type="text" class="input-form" id="exampleInput1" placeholder="HD001"> --}}
                                        <select class="input-select pl-2" name="bill_id" id="mat">
                                            <option selected disabled>Chọn HD</option>
                                            @foreach ($bills as $bill)
                                                <option value="{{ $bill->HDID }}">{{ $bill->HDID }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group d-flex pb-2">
                                        <label for="exampleInput1">Số lượng:&nbsp;&nbsp;<i>(viên)</i></label>
                                        <input type="text" class="input-form" id="exampleInput1" placeholder="1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group d-flex pb-2">
                                        <label for="mat">Mã thuốc:</label>
                                        {{-- <input type="text" class="input-form" id="exampleInput1" placeholder="TKV01"> --}}
                                        <select class="input-select pl-2" name="medicine_id" id="mat">
                                            <option selected disabled>Chọn thuốc</option>
                                            @foreach ($drs as $dr)
                                                <option value="{{ $dr->ThuocID }}">{{ $dr->Tenthuoc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="pt-1 mt-4 pb-1 float-right ">
                                        <button type="button" class="btn btn-primary">Ghi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- <form action="/pre_create" method="post">
                            <div class="pb-1"><b>Thêm toa thuốc:</b></div>
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
                        </form> --}}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
