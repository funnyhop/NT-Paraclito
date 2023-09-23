@extends('layouts.admin')
@section('title')
    <title>Nhóm thuốc</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0 text-dark">Cập nhật thông tin nhóm thuốc</h3>
                    </div> <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row pt-5 pl-4 d-flex">
                    <div class="col-3"></div>
                    <div class="col-7">
                        <form action="/druggr/{{ $drs->NhomthuocID }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput1" class="pr-2">Mã nhóm thuốc:</label>
                                <input type="text" class="input-form pl-2" name="ma" value="{{ $drs->NhomthuocID }}"
                                    id="exampleInput1" placeholder="KS001">
                            </div>
                            <div class="input-group d-flex pb-2">
                                <label for="exampleInput2" class="pr-2">Tên nhóm thuốc:</label>
                                <input type="text" class="input-form pl-2" name="ten" value="{{ $drs->Tennhom }}"
                                    id="exampleInput2" placeholder="Kháng sinh">
                            </div>
                            <div class="float-right pr-1 pt-2">
                                <a href="/druggr" class="btn btn-secondary" >Hủy</a>
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
