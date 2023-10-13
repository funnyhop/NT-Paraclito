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
                        <h1 class="m-0 text-dark">Hóa đơn bán</h1>
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
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="pt-5">
                    <div class="col">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Mã hóa đơn</th>
                                    <th>Ngày lập</th>
                                    <th>Nhân viên</th>
                                    <th>Khách hàng</th>
                                    <th>Mã toa</th>
                                    <th>Đối tượng SD</th>
                                    <th>Thanh toán</th>
                                    <th>Tên thuốc</th>
                                    <th>Số lượng <i>(viên)</i></th>
                                    <th>Đơn giá <i>(vnđ)</i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listhd as $item)
                                    @php $rowCount = count($listghd->where('bill_id', $item->HDID)) @endphp
                                    <tr>
                                        <td rowspan="{{ $listhd ? $rowCount + 1 : 0 }}">{{ $item->HDID }}</td>
                                        <td rowspan="{{ $listhd ? $rowCount + 1 : 0 }}">{{ $item->created_at }}</td>
                                        <td rowspan="{{ $listhd ? $rowCount + 1 : 0 }}">{{ $item->TenNV }}</td>
                                        <td rowspan="{{ $listhd ? $rowCount + 1 : 0 }}">{{ $item->TenKH }}</td>
                                        <td rowspan="{{ $listhd ? $rowCount + 1 : 0 }}">{{ $item->prescription_id }}</td>
                                        <td rowspan="{{ $listhd ? $rowCount + 1 : 0 }}">{{ $item->DoituongSD }}</td>
                                        <td rowspan="{{ $listhd ? $rowCount + 1 : 0 }}">
                                            <a href=""><i class="fa-solid fa-money-bill-1-wave"></i></a>
                                        </td>
                                        @foreach ($listghd as $value)
                                            @if ($value->bill_id == $item->HDID)
                                            <tr>
                                                <td>{{ $value->Tenthuoc }}</td>
                                                <td>{{ $value->Soluong }}</td>
                                                @foreach ($prices as $price)
                                                    @if ($value->medicine_id == $price->medicine_id)
                                                        <td>{{ $price->Gia }}</td>
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
