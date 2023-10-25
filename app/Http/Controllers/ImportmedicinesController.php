<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phieunhap;
use App\Models\GhiPN;
use App\Models\Medicine;
use Illuminate\Support\Facades\DB;
// use Illuminate\View\View;

class ImportmedicinesController extends Controller
{
    private $list;
    private $values;
    public function __construct(){
        $this->values = new GhiPN();
        $this->list = new Phieunhap();
    }
    public function index()
    {
        $listgpn = $this->values->listghipn();
        $listpn=$this->list->listphieunhap();
        $key = request()->key;
        $listpn = Phieunhap::search($key)->get();
        // dd($listpn);

        return view('warehouse.listimportmedicine', compact('listgpn', 'listpn'));
    }
    public function createpn()
    {
        $staffs = DB::table('staffs')->select('NVID', 'TenNV')->get();
        $whs = DB::table('warehouses')->select('KhoID', 'Tenkho')->get();
        $drs = DB::table('medicines')->select('ThuocID', 'Tenthuoc')->get();
        $pn = DB::table('phieunhaps')->select('PNID')->get();
        return view('warehouse.importmedicines', compact('pn','drs','whs','staffs'));
    }

    public function storepn(Request $request)
    {
        $pn = DB::table('phieunhaps')->insert([
            'PNID' => $request->input('id'),
            'warehouse_id' => $request->input('warehouse_id'),
            'Lothuoc' => $request->input('solo'),
            'staff_id' => $request->input('staff_id'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect(route('importmedicines.createpn'));
    }
    public function storeghipn(Request $request)
    {

        $gpn = DB::table('ghipns')->insert([
            'phieunhap_id' => $request->input('phieunhap_id'),
            'medicine_id' => $request->input('medicine_id'),
            'Soluong' => $request->input('sl'),
            'Gia' => $request->input('gia'),
            'created_at' => now(),
            'updated_at' => now()
        ]);


        $get_idwarehouse = DB::table('warehouses')
            ->join('phieunhaps', 'warehouses.KhoID', '=', 'phieunhaps.warehouse_id')
            ->where('phieunhaps.PNID', $request->input('phieunhap_id'))
            ->select('phieunhaps.warehouse_id')
            ->first();

        // Kiểm tra sự tồn tại của bản ghi trong tonkhos
        $tonkhoRecord = DB::table('tonkhos')
            ->where('medicine_id', $request->input('medicine_id'))
            ->where('warehouse_id', $get_idwarehouse->warehouse_id)
            // ->groupBy('medicine_id')
            ->first();
        // dd($gpn,$request,$get_idwarehouse,$tonkhoRecord);
        // dd($request,$tonkhoRecord);
        if ($tonkhoRecord) {
            // Bản ghi tồn tại, thực hiện cập nhật
            $currentSoluong = $tonkhoRecord->Soluong;
            // Debug
            // dd("Before Update", $request->input('sl'), $currentSoluong);
            $ud_soluong = DB::table('tonkhos')
                ->where('medicine_id', $request->input('medicine_id'))
                ->where('warehouse_id', $get_idwarehouse->warehouse_id)
                ->update([
                    'Soluong' => $currentSoluong + (int)$request->input('sl')
                ]);
            // Debug
            // dd("After Update", $ud_soluong);
        } else {
            // Bản ghi không tồn tại, thực hiện thêm mới
            // Debug
            // dd("Before Insert", $request->input('sl'));
            $add_warehouse = DB::table('tonkhos')
                ->insert([
                    'Soluong' => $request->input('sl'),
                    'medicine_id' => $request->input('medicine_id'),
                    'warehouse_id' => $get_idwarehouse->warehouse_id
                ]);
            // Debug
            // dd("After Insert", $add_warehouse);
        }

        // return redirect(route('importmedicines.createpn'));
    }

    public function createAndStore(Request $request)
    {
        // Bắt đầu một giao dịch
        DB::beginTransaction();

        try {
            // Thực hiện insert cho form đầu tiên
            // Nếu không có lỗi, thực hiện insert cho form thứ hai
            if (!empty($request->input('id'))) {
                // Có ID, lưu thông tin liên quan đến ID
                $this->storepn($request);
            }

            if (!empty($request->input('phieunhap_id')) && !empty($request->input('medicine_id'))) {
                // Có thông tin về phiếu nhập và thuốc, lưu thông tin liên quan

                $this->storeghipn($request);
            }

            // Nếu mọi thứ đều ổn, commit giao dịch
            DB::commit();

            // Chuyển hướng về trang tạo mới
            return redirect()->route('importmedicines.createpn');
        } catch (\Exception $e) {
            // Nếu có lỗi, rollback giao dịch
            DB::rollBack();

            // Xử lý lỗi nếu cần
            return redirect()->back()->with('error', 'Có lỗi xảy ra.');
        }
    }

}
