@extends('layouts.admin')
@section('title')
    <title>Nhà sản xuất</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Nhà sản xuất</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
                <!-- SEARCH FORM -->
            <form class="form-inline ml-3 float-right">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
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
          <div class="float-right d-inline-flex pr-2">
              <li class="pr-1"><a href="/producers">Danh sách</a></li>
              <a href="#">/</a>
              <li class="pl-1"><a href="#">Thêm</a></li>
          </div>
          <div class="row pt-5 pl-4 d-flex">
            <div class="col-3"></div>
            <div class="col-7">
                <form action="/producers/{{ $producer->NSXID }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="input-group d-flex pb-2">
                      <label for="exampleInput1" class="pr-2">Mã nhà sản xuất:</label>
                      <input type="text" class="input-form pl-2" name="id" id="exampleInput1" value="{{ $producer->NSXID }}" placeholder="NSX01">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput2" class="pr-2">Tên nhà sản xuất:</label>
                        <input type="text" class="input-form pl-2" name="name" id="exampleInput2" value="{{ $producer->TenNSX }}" placeholder="Eli Lilly and Company">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput2" class="pr-2">Quốc gia:</label>
                        <input type="text" class="input-form pl-2" name="national" id="exampleInput2" value="{{ $producer->Quocgia }}" placeholder="United States">
                    </div>
                    <div class="float-right pr-1 pt-2">
                        <a href="/producers" class="btn btn-secondary">Hủy</a>
                        <button type="submit" class="btn btn-primary">Thêm</button>
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

