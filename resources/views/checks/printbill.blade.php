@extends('layouts.admin')
@section('title')
    <title>Thanh toán</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0 text-dark">Thanh toán</h3>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="pt-2 pb-5">
                    <div style="border: 1px solid #bfdfd5" class="col-4 mx-auto">
                        <form action="{{ route('updatehd', ['HDID' => $bill->HDID]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="d-block pt-3 mb-2 text-lg-center">
                                <b>NHÀ THUỐC PARACLITO</b>
                                <p class="m-0">CT262/01/07, 304/D2-CTU</p>
                                <b>Hotline: 0909056789</b>
                            </div>
                            <div class="d-block mb-2 text-lg-center">
                                <b class="">HOÁ ĐƠN</b>
                                <p class="m-0">Ngày: {{ $bill->created_at }}
                                </p>
                                <p class="m-0">Mã hóa đơn: {{ $bill->HDID }}</p>
                                <p class="m-0">Nhân viên: {{ $bill->TenNV }}</p>
                                <p class="m-0">Khách hàng: {{ $bill->TenKH }}</p>
                                <p class="m-0">ĐT: {{ $bill->SDT }}</p>
                            </div>
                            <div class="pl-1 pr-1">
                                <table class="table table-bordered" style="max-width: 500px;">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>SL</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sum = 0; ?>
                                        @foreach ($ghd as $ghi)
                                            <tr>
                                                <td>{{ $ghi->Tenthuoc }}</td>
                                                <td>{{ $ghi->Soluong }} <i>(viên)</i></td>
                                                @foreach ($prices as $price)
                                                    @if ($ghi->medicine_id == $price->medicine_id)
                                                    <?php
                                                        $gia = $ghi->Soluong * $price->Gia;
                                                        $sum+=$gia;
                                                    ?>
                                                        <td>{{ number_format($price->Gia, 2) }}</td>
                                                        <td>{{number_format($gia, 2)}}</td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        <td colspan="4"><b>Tổng giá: </b><i>{{ number_format($sum, 2) }}vnđ</i></td>
                                        <input type="hidden" name="sum" value="{{ $sum }}">
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <p><i style="font-size: 15px;">(*)Cảm ơn quý khách đã sử dụng dịch vụ Nhà thuốc
                                        Paralito</i></p>
                            </div>
                            <div class="float-right pt-1 row">
                                <button type="submit" class="btn btn-primary">In</button>
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
