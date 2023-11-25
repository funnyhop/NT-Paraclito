@extends('layouts.admin')

@section('title')
    <title>Hóa đơn bán</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- Page Title -->
                        <h1 class="m-0 text-dark">Hóa đơn bán</h1>
                    </div>
                    <div class="col-sm-6">
                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3 float-right">
                            <div class="input-group input-group-sm">
                                <!-- Search Input -->
                                <input class="form-control form-control-navbar" name="key" type="search"
                                    placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <!-- Search Button -->
                                    <button class="btn btn-navbar" type="submit"
                                        style="background-color: #e0f8f1; border-color: silver;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="pt-5">
                    <div class="col">
                        <!-- Table -->
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
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                    <!-- Thuốc Header Columns -->
                                    <th>Tên thuốc</th>
                                    <th>Số lượng <i>(viên)</i></th>
                                    <th>Đơn giá <i>(vnđ)</i></th>
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
                                        <!-- Hóa đơn Main Row -->
                                        <td rowspan="{{ $rowCount + 1 }}">{{ $item->HDID }}</td>
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
                                        <td rowspan="{{ $rowCount + 1 }}"><a
                                                href="{{ route('bills.edit', ['HDID' => $item->HDID]) }}">
                                                <i class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                        <td rowspan="{{ $rowCount + 1 }}">
                                            <form action="{{ route('bills.destroy', ['HDID' => $item->HDID]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn-trash">
                                                    <i class="fa-solid fa-trash "></i>
                                                </button>
                                            </form>
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
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
