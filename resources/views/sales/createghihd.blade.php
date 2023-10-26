@extends('layouts.admin')
@section('title')
    <title>Thêm đơn thuốc (HD)</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0 text-dark">Thêm đơn thuốc (HD)</h3>
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
                <div class="row pt-5 pl-5 ml-5">
                    <form action="{{ route('ghihds.store') }}" method="post">
                        @csrf
                        <div class="row pr-2">
                            <div class="col-4">
                                <div class="input-group pb-1">
                                    <label for="exampleInput1">Mã thuốc:</label>
                                    {{-- <input type="text" class="input-form pl-2" name="medicine_id" id="exampleInput1"
                                        placeholder="KV001"> --}}
                                    <select class="input-select pl-2" name="medicine_id" id="mat">
                                        <option selected disabled>Chọn thuốc</option>
                                        @foreach ($medicines as $medicine)
                                            <option value="{{ $medicine->ThuocID }}">{{ $medicine->Tenthuoc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group pb-1">
                                    <label for="exampleInput1">Mã hóa đơn:</label>
                                    <select class="input-select pl-2" name="bill_id" id="mat">
                                        <option selected disabled>Chọn HD</option>
                                        @foreach ($bills as $bill)
                                            <option value="{{ $bill->HDID }}">{{ $bill->HDID }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group pb-1">
                                    <label for="exampleInput1">Số lượng: &nbsp;<i>(viên)</i></label>
                                    <input type="text" class="input-form pl-2" name="Soluong" id="exampleInput1"
                                        placeholder="1000">
                                </div>
                            </div>
                        </div>
                        <div class="row pl-5  d-flex">
                            <div class="col">
                                <div class="pt-2 float-right pr-2">
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
