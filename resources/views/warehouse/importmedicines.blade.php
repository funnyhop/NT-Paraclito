@extends('layouts.admin')
@section('title')
    <title>Nhập thuốc từ phiếu</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Nhập thuốc</h1>
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
                <div class="row pl-2">
                    <b class="col-6 pl-5 pt-4 pb-1">Thêm phiếu nhập:</b>
                    <b class="col-6 pl-4 pt-4 pb-1">Ghi phiếu nhập:</b>
                </div>
                <div class="row pl-5 d-flex pr-3">
                    {{-- <formthem> --}}
                    <div class="col-6">
                        <form action="{{ route('importmedicines.createAndStore') }}" method="POST">
                            @csrf
                            <div class="d-block">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Mã phiếu nhập:</label>
                                            <input type="text" class="input-form pl-2" name="id" value="{{ $newPNID }}" id="exampleInput1"
                                                placeholder="PN001">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="makho">Mã kho:</label>
                                            {{-- <input type="text" class="input-form pl-2" name="makho"
                                                id="exampleInput1" placeholder="K0001"> --}}
                                            <select class="input-select pl-2" name="warehouse_id" id="makho">
                                                {{-- <option selected disabled>Chọn kho</option> --}}
                                                @foreach ($whs as $wh)
                                                    <option value="{{ $wh->KhoID }}">{{ $wh->Tenkho }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Số lô sản xuất:</label>
                                            <input type="text" class="input-form pl-2" name="solo" id="exampleInput1"
                                                placeholder="210319">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="manv">Mã nhân viên:</label>
                                            {{-- <input type="text" class="input-form pl-2" name="staff_id" id="exampleInput1"
                                                placeholder="210319"> --}}
                                            <select class="input-select pl-2" name="staff_id" id="manv">
                                                <option value="{{ Auth::check() && Auth::user()->NVID ? Auth::user()->NVID : '' }}">{{ Auth::user()->TenNV }}</option>
                                                {{-- <option selected disabled>Chọn nhân viên</option>
                                                @foreach ($staffs as $staff)
                                                    <option value="{{ $staff->NVID }}">{{ $staff->TenNV }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <div class="pt-2 pb-1 float-right ">
                                        <button type="reset" class="btn btn-secondary">Hủy</button>
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- </formthem> --}}
                    {{-- <formghi> --}}
                    <div class="col-6 pb-5">
                        <form action="{{ route('importmedicines.createAndStore') }}" method="POST">
                            @csrf
                            <div class="d-block">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="mapn">Mã phiếu nhập:</label>
                                            {{-- <input type="text" class="input-form pl-2" name="phieunhap_id" id="mapn"
                                                placeholder="PN001"> --}}
                                            <select class="input-select pl-2" name="phieunhap_id" id="mapn">
                                                <option selected value="{{ $newID }}">{{ $newID }}</option>
                                                @foreach ($pn as $item)
                                                    <option value="{{ $item->PNID }}">{{ $item->PNID }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="mat">Mã thuốc:</label>
                                            {{-- <input type="text" class="input-form pl-2" name="medicine_id"
                                                id="mat" placeholder="KV001"> --}}
                                            <select class="input-select pl-2" name="medicine_id" id="mat">
                                                <option selected disabled>Chọn thuốc</option>
                                                @foreach ($drs as $dr)
                                                    <option value="{{ $dr->ThuocID }}">{{ $dr->Tenthuoc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Số lượng:&nbsp;&nbsp;<i>(tính theo viên)</i></label>
                                            <input type="text" class="input-form pl-2" name="sl" id="exampleInput1"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group pb-1">
                                            <label for="exampleInput1">Giá:&nbsp;&nbsp;<i>(vd: 30viênx3vỉx1hộp)</i></label>
                                            <input type="text" class="input-form pl-2" name="gia" id="exampleInput1"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 float-right ">
                                <button type="reset" class="btn btn-secondary">Hủy</button>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                    {{-- </formghi> --}}
                    <table class="table table-bordered text-center">
                        <thead>
                            <th>IDPN</th>
                            <th>Mã kho</th>
                            <th>Ngày nhập</th>
                            <th>Số lô sản xuất</th>
                            <th>Mã nhân viên</th>
                            <th>Tên thuốc</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </thead>
                        <tbody>
                            @php
                                $previousPNID = null;
                                $row = 0;
                            @endphp

                            @foreach ($listpn as $item)
                                @if ($item->PNID == $newID)
                                    <tr>
                                        @if ($item->PNID != $previousPNID)
                                            <td rowspan="{{ count($listgpn->where('phieunhap_id', $item->PNID)) + 1 }}">
                                                <a href="{{ route('chitietpn', ['PNID' => $item->PNID]) }}">{{ $item->PNID }}</a>
                                            </td>
                                            <td rowspan="{{ count($listgpn->where('phieunhap_id', $item->PNID)) + 1 }}">
                                                {{ $item->warehouse_id }}
                                            </td>
                                            <td rowspan="{{ count($listgpn->where('phieunhap_id', $item->PNID)) + 1 }}">
                                                {{ $item->created_at }}
                                            </td>
                                            <td rowspan="{{ count($listgpn->where('phieunhap_id', $item->PNID)) + 1 }}">
                                                {{ $item->Lothuoc }}
                                            </td>
                                            <td rowspan="{{ count($listgpn->where('phieunhap_id', $item->PNID)) + 1 }}">
                                                {{ $item->staff_id }}
                                            </td>
                                            @php
                                                $previousPNID = $item->PNID;
                                            @endphp
                                        @endif

                                        @foreach ($listgpn->where('phieunhap_id', $item->PNID) as $value)
                                            <tr>
                                                <td>{{ $value->Tenthuoc }}</td>
                                                <td>{{ $value->Soluong }}</td>
                                                <td>{{ $value->Gia }} vnđ</td>
                                                <td>
                                                    <a
                                                    href="{{ route('createpn.edit', ['phieunhap_id' => $value->phieunhap_id, 'medicine_id' => $value->medicine_id]) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('createpn.destroy', ['phieunhap_id' => $value->phieunhap_id, 'medicine_id' => $value->medicine_id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-trash">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
