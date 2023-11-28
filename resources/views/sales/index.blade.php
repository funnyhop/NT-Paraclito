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
                    <div class="row pl-4 pr-3">
                        <form class="pb-5" action="{{ route('sales') }}" method="post">
                            @csrf
                            <div>
                                <b>Ghi đơn thuốc:</b>
                            </div>
                            <div class="d-flex ">
                                <div class="input-group d-flex pb-2 pr-3">
                                    <label for="exampleInput1">Mã hóa đơn:</label>
                                    {{-- <input type="text" class="input-form" id="exampleInput1" placeholder="HD001"> --}}
                                    <select class="input-select pl-2" name="bill_id" id="mat">
                                        <option selected value="{{ $newID }}">{{ $newID }}</option>
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
                        <table class="table table-bordered text-center">
                            <thead>
                                <!-- Table Header Row -->
                                <tr>
                                    <!-- Hóa đơn Header Columns -->
                                    <th>Mã hóa đơn</th>
                                    <th>Ngày lập</th>
                                    <th>Nhân viên</th>
                                    <th>Khách hàng</th>
                                    <th>Mã toa</th>
                                    <th>Đối tượng SD</th>
                                    <th>Trị giá <i>(vnđ)</i></th>
                                    <th>Thanh toán</th>
                                    <!-- Thuốc Header Columns -->
                                    <th>Tên thuốc</th>
                                    <th>Số lượng <i>(viên)</i></th>
                                    <th>Đơn giá <i>(vnđ)</i></th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through main Hóa đơn (invoices) -->
                                @php
                                    $previousHDID = null;
                                    $row = 0;
                                @endphp
                                @foreach ($listhd as $item)
                                    @php
                                        // Calculate the number of rows for the current main row
                                        $rowCount = count($listghd->where('bill_id', $item->HDID));
                                    @endphp
                                    <tr>
                                        @if ($item->HDID == $newID)
                                                <!-- Hóa đơn Main Row -->
                                            <td rowspan="{{ $rowCount + 1 }}"><a href="{{ route('chitiet',['HDID' => $item->HDID]) }}">{{ $item->HDID }}</a></td>
                                            <td rowspan="{{ $rowCount + 1 }}">{{ $item->created_at }}</td>
                                            <td rowspan="{{ $rowCount + 1 }}">{{ $item->staff_id }}</td>
                                            <td rowspan="{{ $rowCount + 1 }}">{{ $item->customer_id }}</td>
                                            <td rowspan="{{ $rowCount + 1 }}">{{ $item->prescription_id }}</td>
                                            <td rowspan="{{ $rowCount + 1 }}">{{ $item->DoituongSD }}</td>
                                            <td rowspan="{{ $rowCount + 1 }}">{{ number_format($item->Tongtien, 2, '.', ',') }}</td>
                                            <td rowspan="{{ $rowCount + 1 }}">
                                                <a href="{{ route('pay', ['HDID' => $item->HDID]) }}"><i
                                                        class="fa-solid fa-money-bill-1-wave"></i></a>
                                            </td>
                                            <!-- Loop through associated ghd (medicine details) -->
                                            @foreach ($listghd as $value)
                                                <!-- Check if the ghd belongs to the current main Hóa đơn -->
                                                @if ($value->bill_id == $item->HDID)
                                                    <!-- Nested Row for ghd details -->
                                                    <tr>
                                                        <td>{{ $value->Tenthuoc }}</td>
                                                        <td>{{ $value->Soluong }}</td>
                                                        <!-- Loop through prices to find corresponding Đơn giá -->
                                                        @foreach ($prices as $price)
                                                            @if ($value->medicine_id == $price->medicine_id)
                                                                <td>{{ number_format($price->Gia, 2) }}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>
                                                            <a
                                                            href="{{ route('chitiet.edit', ['bill_id' => $value->bill_id, 'medicine_id' => $value->medicine_id]) }}">
                                                            <i class="fa-solid fa-pen-to-square"></i></a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('chitiet.destroy', ['bill_id' => $value->bill_id, 'medicine_id' => $value->medicine_id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn-trash">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

