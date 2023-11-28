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
    public function edit($PNID)
    {
        $importmedicine = DB::table('phieunhaps')
        ->select('PNID','created_at','Lothuoc','warehouse_id','staff_id')
        ->where('PNID', $PNID)
        ->first();
        return view('warehouse.editimportmedicine', compact('importmedicine'));
    }
    public function update(Request $request, $PNID)
    {
        $importmedicine = DB::table('phieunhaps')->where('PNID', $PNID)
            ->update([
                'PNID' => $request->input('PNID'),
                'created_at' => $request->input('created_at'),
                'Lothuoc' => $request->input('Lothuoc'),
                'warehouse_id' => $request->input('warehouse_id'),
                'staff_id' => $request->input('staff_id'),
            ]);

        return redirect()->route('importmedicines');
    }
    public function destroy($PNID)
    {
        $importmedicine = DB::table('phieunhaps')->where('PNID', $PNID)->delete();

        return redirect()->route('importmedicines');
    }
    public function createpn()
    {
        $maxPNID = DB::table('phieunhaps')->max(DB::raw('CAST(SUBSTRING(PNID, 3, 3) AS SIGNED)'));
        $newPNID = 'PN' . str_pad($maxPNID + 1, 3, '0', STR_PAD_LEFT);
        $newID = 'PN' . str_pad($maxPNID, 3, '0', STR_PAD_LEFT);

        $staffs = DB::table('staffs')->select('NVID', 'TenNV')->get();
        $whs = DB::table('warehouses')->select('KhoID', 'Tenkho')->get();
        $drs = DB::table('medicines')->select('ThuocID', 'Tenthuoc')->get();
        $pn = DB::table('phieunhaps')->select('PNID')->get();

        $listgpn = $this->values->listghipn();
        $listpn=$this->list->listphieunhap();
        $key = request()->key;
        $listpn = Phieunhap::search($key)->get();
        return view('warehouse.importmedicines', compact('newID','listgpn', 'listpn','pn','drs','whs','staffs','newPNID'));
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


    public function chitietpn(Request $request, $id)
    {
        // dd($request);
        $ghipns = DB::table('ghipns')
            ->select('medicine_id', 'phieunhap_id', 'Soluong', 'Gia')
            ->where('phieunhap_id', $id)
            ->get();
        $i = 1;
        return view('warehouse.chitiet', compact('ghipns', 'i'));
    }
    public function edit_ct($phieunhap_id, $medicine_id){
        $ghipn = DB::table('ghipns')
            ->select('medicine_id', 'phieunhap_id', 'Soluong', 'Gia')
            ->where('phieunhap_id', $phieunhap_id)
            ->where('medicine_id', $medicine_id)
            ->first();
        $getwarehouse_id = DB::table('tonkhos')
            ->join('warehouses', 'tonkhos.warehouse_id', '=', 'warehouses.KhoID')
            ->where('medicine_id', $medicine_id)
            ->select('KhoID', 'TenKho')
            ->get();

        return view('warehouse.editchitiet', [
            'ghipn' => $ghipn,
            'getwarehouse_id' => $getwarehouse_id
        ]);
    }
    public function update_ct(Request $request, $phieunhap_id, $medicine_id){
        $currentSoluongGhipns = DB::table('ghipns')
            ->where('phieunhap_id', $phieunhap_id)
            ->where('medicine_id', $medicine_id)
            ->value('Soluong');

        $ghipn = DB::table('ghipns')
        ->where('phieunhap_id', $phieunhap_id)
        ->where('medicine_id', $medicine_id)
        ->update([
            'medicine_id' => $request->input('medicine_id'),
            'phieunhap_id' => $request->input('phieunhap_id'),
            'Soluong' => $request->input('Soluong'),
            'Gia' => $request->input('gia'),
        ]);

        $updateSoluong = $request->input('Soluong') - $currentSoluongGhipns ;
        $tonkho = DB::table('tonkhos')
            ->where('warehouse_id', $request->input('warehouse_id'))
            ->where('medicine_id', $medicine_id)
            ->update([
                'Soluong' => DB::raw('Soluong + ' . $updateSoluong)
            ]);

        return redirect()->route('importmedicines.createpn');
    }
    public function destroy_ct($phieunhap_id, $medicine_id)
    {
        $currentSoluongGhipns = DB::table('ghipns')
            ->where('phieunhap_id', $phieunhap_id)
            ->where('medicine_id', $medicine_id)
            ->value('Soluong');

        $getwarehouse_id = DB::table('tonkhos')
            ->where('medicine_id', $medicine_id)
            ->where('warehouse_id', 'K0001')
            ->first();

        $tonkho = DB::table('tonkhos')
                ->where('warehouse_id', 'K0001')
                ->where('medicine_id', $medicine_id)
                ->update([
                    'Soluong' => DB::raw('Soluong - ' . $currentSoluongGhipns)
                ]);
        DB::table('ghipns')
            ->where('phieunhap_id', $phieunhap_id)
            ->where('medicine_id', $medicine_id)
            ->delete();

        return redirect()->route('importmedicines.createpn');
    }
}
