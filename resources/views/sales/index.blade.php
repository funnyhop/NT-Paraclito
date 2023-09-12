@extends('layouts.admin')
@section('title')
    <title>Bán thuốc</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bán thuốc</h1>
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
        <div class="row pl-5 pt-2 border-right">
            <div class="col-4">
                <b>Thêm khách hàng:</b>
            </div>
            <div class="col-4 pl-2 pr-2">
                <b>Thêm hóa đơn:</b>
            </div>
            <div class="col-4">
                <b>Ghi đơn thuốc:</b>
            </div>
        </div>
        <div class="row pt-1 pl-5">
            <div class="col-4">
                <form action="">
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput1">Tên khách hàng:</label>
                        <input type="text" class="input-form" id="exampleInput1" placeholder="Nguyen Van A">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput1">Số điện thoại:</label>
                        <input type="text" class="input-form" id="exampleInput1" placeholder="039287593">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput1">Địa chỉ:</label>
                        <input type="text" class="input-form" id="exampleInput1" placeholder="Ninh Kieu-CT">
                    </div>
                    <div class="float-right pt-2">
                        <button type="button" class="btn btn-secondary">Hủy</button>
                        <button type="button" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
                <form action="">
                    <div class="pt-5 pb-1"><b>Thêm toa thuốc:</b></div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput1">Mã toa thuốc:</label>
                        <input type="text" class="input-form" id="exampleInput1" placeholder="T0001">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput1">Tên bác sĩ:</label>
                        <input type="text" class="input-form" id="exampleInput1" placeholder="Nguyen Van A">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput1">Tên bệnh viện</label>
                        <input type="text" class="input-form" id="exampleInput1" placeholder="Bệnh viện Hoàn Mỹ Cần Thơ">
                    </div>
                    <div class="float-right pt-2 pb-5">
                        <button type="button" class="btn btn-secondary">Hủy</button>
                        <button type="button" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
            <div class="col-4 pl-2 pr-2">
                <form action="">
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput1">Mã hóa đơn:</label>
                        <input type="text" class="input-form" id="exampleInput1" placeholder="HD001">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput1">Ngày lập:</label>
                        <input type="text" class="input-form" id="exampleInput1" placeholder="12/09/2023">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput1">Toa thuốc:</label>
                        <input type="text" class="input-form" id="exampleInput1" placeholder="T0000/không có toa">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput1">Mã nhân viên lập hóa đơn:</label>
                        <input type="text" class="input-form" id="exampleInput1" placeholder="BT001">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput1">SDT khách hàng:</label>
                        <input type="text" class="input-form" id="exampleInput1" placeholder="039287593">
                    </div>
                    <div class="input-group d-flex pb-2">
                        <label for="exampleInput1">Mã đối tượng sử dụng:</label>
                        <input type="text" class="input-form" id="exampleInput1" placeholder="TE001">
                    </div>
                    <div class="float-right pt-2 pb-5">
                        <button type="button" class="btn btn-secondary">Hủy</button>
                        <button type="button" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
            <div class="col-4 pr-5 pb-5">
                <form action="" class="pb-1">
                    <div class="row ghihd">
                        <div class="col-6">
                            <label for="exampleInput1">Mã hóa đơn:</label>
                            <input type="text" class="input-form-none" id="exampleInput1" placeholder="HD001">
                            <label for="exampleInput1">Số lượng:</label>
                            <input type="text" class="input-form-none" id="exampleInput1" placeholder="1">
                        </div>
                        <div class="col-6 ">
                            <label for="exampleInput1">Mã thuốc:</label>
                            <input type="text" class="input-form-none" id="exampleInput1" placeholder="KV001">
                            <label for="exampleInput1">Đơn vị tính:</label>
                            <input type="text" class="input-form-none" id="exampleInput1" placeholder="Viên/hộp">
                        </div>
                    </div>
                    <div class="row d-block ghihd">
                        <div class="col-6">
                            <label for="exampleInput1">Đơn giá:</label>
                            <input type="text" class="input-form-none" id="exampleInput1" placeholder="200/viên .../hộp">
                        </div>
                        <div class="col-6">
                            <label for="exampleInput1">Tổng tiền:</label>
                            <input type="text" class="input-form-none" id="exampleInput1" placeholder="vnđ">
                        </div>
                        <div class="pt-1 pl-2"><button type="button" class="btn btn-primary">Ghi</button></div>
                    </div>
                </form>
                <div style="border: 1px solid #bfdfd5">
                    <form action="">
                        <div class="d-block text-lg-center pt-3 mb-3">
                            <b>NHÀ THUỐC PARACLITO</b>
                            <p class="m-0">CT262/01/07, 304/D2-CTU</p>
                            <b>Hotline: 0909056789</b>
                        </div>
                        <div class="d-block text-lg-center mb-2">
                            <b class="">HOÁ ĐƠN</b>
                            <p class="m-0">Ngày: 12/02/2023</p>
                            <p class="m-0">Mã hóa đơn: HD001</p>
                            <p class="m-0">Nhân viên: Nguyễn Văn B</p>
                            <p class="m-0">Khách hàng: Nguyễn Văn A</p>
                            <p class="m-0">ĐT: 0927354758</p>
                        </div>
                        <div class="pl-1 pr-1">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>SL</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Amoxicillin</td>
                                        <td>30 viên</td>
                                        <td>1000</td>
                                        <td>30000</td>
                                    </tr>
                                </tbody>
                            </table>
                            <i style="font-size: 15px;">(*)Cảm ơn quý khách đã sử dụng dịch vụ Nhà thuốc Paralito</i>
                        </div>
                        <div class="float-right pt-1">
                            <button type="button" class="btn btn-primary">In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

