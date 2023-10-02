@extends('layouts.admin')
@section('title')
    <title>Thêm thuốc</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Cập nhật giá bán thuốc</h1>
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
            <div class="container-fluid pb-5 pr-5">
                <div class="row pt-5 pl-5">
                    <form action="{{ route('prices.priceUpdate', ['ngay_id' => $pr->ngay_id, 'medicine_id' => $pr->medicine_id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row pr-2">
                            <div class="col-4">
                                <div class="input-group pb-1">
                                    <label for="exampleInput1">Mã thuốc:</label>
                                    <input type="text" class="input-form pl-2" name="medicine_id" id="exampleInput1"
                                        value="{{ $pr->medicine_id }}" placeholder="KV001">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group pb-1">
                                    <label for="exampleInput1">Ngày:</label>
                                    <input type="text" class="input-form pl-2" name="ngay_id" id="exampleInput1"
                                        value="{{ $pr->ngay_id }}" placeholder="2023-01-10">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group pb-1">
                                    <label for="exampleInput1">Giá:</label>
                                    <input type="text" class="input-form pl-2" name="gia" id="exampleInput1"
                                        value="{{ $pr->Gia }}" placeholder="1000|100000">
                                </div>
                            </div>
                        </div>
                        <div class="row pl-5  d-flex">
                            <div class="col">
                                <div class="pt-2 float-right pr-2">
                                    <a href="/prices" class="btn btn-secondary">Hủy</a>
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
