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
            <h1 class="m-0 text-dark">Thuốc tây</h1>
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
              <li class="pr-1"><a href="/medicines">Danh sách</a></li>
              <a href="#">/</a>
              <li class="pl-1"><a href="medicines/create">Thêm</a></li>
          </div>
          <div class="pt-5">
              <div class="col">
                  <table class="table table-bordered text-center">
                      <thead>
                          <tr>
                              <th>Mã thuốc</th>
                              <th>Tên thuốc</th>
                              <th>NSX</th>
                              <th>HSD</th>
                              <th>Thành phần hoạt chất</th>
                              <th>Điều trị</th>
                              <th>Mã nhóm thuốc</th>
                              <th>Mã nhà cung cấp</th>
                              <th>Cập nhật</th>
                              <th>Xóa</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td class="text-left">Amoxicillin</td>
                              <td>01/01/2019</td>
                              <td>01/01/2025</td>
                              <td class="text-left">Amoxicillin</td>
                              <td class="text-left">Nhiễm trùng hô hấp (viêm phổi, viêm xoang, viêm họng)</td>
                              <td class="text-left">KV001</td>
                              <td class="text-left">LC207</td>
                              <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
                              <td><a href="#"><i class="fa-solid fa-trash"></i></a></td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td class="text-left">Aspirin</td>
                              <td>01/01/2019</td>
                              <td>01/01/2025</td>
                              <td class="text-left">Acetylsalicylic acid</td>
                              <td class="text-left">Điều trị đau và viêm, giảm sốt, và ngăn ngừa các vấn đề tim mạch</td>
                              <td class="text-left">KV001</td>
                              <td class="text-left">PC212</td>
                              <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
                              <td><a href="#"><i class="fa-solid fa-trash"></i></a></td>
                          </tr>
                          <tr>
                              <td>3</td>
                              <td class="text-left">Paracetamol</td>
                              <td>01/01/2019</td>
                              <td>01/01/2025</td>
                              <td class="text-left">Paracetamol</td>
                              <td class="text-left">Giảm đau và hạ sốt</td>
                              <td class="text-left">KVHS1</td>
                              <td class="text-left">OPV950</td>
                              <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
                              <td><a href="#"><i class="fa-solid fa-trash"></i></a></td>
                          </tr>
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





