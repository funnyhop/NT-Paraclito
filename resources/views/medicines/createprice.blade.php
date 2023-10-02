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
                        <h3 class="m-0 text-dark">Thêm giá cho thuốc</h3>
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
            <div class="container-fluid pb-5">
                <div class="float-right d-inline-flex pr-2">
                    <li class="pr-1"><a href="/prices">Danh sách</a></li>
                    <a href="#">/</a>
                    <li class="pl-1"><a href="#">Thêm</a></li>
                </div>
                <div class="row pt-5 pl-5">
                    <form action="/prices" method="post">
                        @csrf
                        <div class="row pr-2">
                            <div class="col-4">
                                <div class="input-group pb-1">
                                    <label for="exampleInput1">Mã thuốc:</label>
                                    <input type="text" class="input-form pl-2" name="medicine_id" id="exampleInput1"
                                        placeholder="KV001">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group pb-1">
                                    <label for="exampleInput1">Ngày:</label>
                                    <input type="text" class="input-form pl-2" name="ngay_id" id="exampleInput1"
                                        placeholder="2023-01-10">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group pb-1">
                                    <label for="exampleInput1">Giá:</label>
                                    <input type="text" class="input-form pl-2" name="gia" id="exampleInput1"
                                        placeholder="1000|100000">
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
