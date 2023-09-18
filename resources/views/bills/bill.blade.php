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
                              <th>Mã nhân viên</th>
                              <th>Mã khách hàng</th>
                              <th>Mã toa</th>
                              <th>Mã thuốc</th>
                              <th>Số lượng</th>
                              <th>Đơn vị tính</th>
                              <th>Đơn giá</th>
                              <th>Tổng tiền</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>HD001</td>
                              <td>21/01/2023</td>
                              <td>BT001</td>
                              <td>0927384673</td>
                              <td>T0001</td>
                              <td>KV001</td>
                              <td>2</td>
                              <td>Hộp</td>
                              <td>100000</td>
                              <td class="text-left">200000</td>
                          </tr>
                          <tr>
                            <td>HD001</td>
                              <td>21/01/2023</td>
                              <td>BT001</td>
                              <td>0927384673</td>
                              <td>T0001</td>
                              <td>KV002</td>
                              <td>1</td>
                              <td>Hộp</td>
                              <td>100000</td>
                              <td class="text-left">100000</td>
                          </tr>
                          <tr>
                            <td>HD001</td>
                              <td>21/01/2023</td>
                              <td>BT001</td>
                              <td>0927384673</td>
                              <td>T0001</td>
                              <td>KVS01</td>
                              <td>1</td>
                              <td>Hộp</td>
                              <td>100000</td>
                              <td class="text-left">100000</td>
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

