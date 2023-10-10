<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phieunhap;
use App\Models\GhiPN;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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

        return view('warehouse.listimportmedicine', compact('listgpn', 'listpn'));
    }
    public function createpn()
    {
        return view('warehouse.importmedicines');
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

        return redirect(route('importmedicines.createpn'));
    }
    public function createAndStore(Request $request)
    {
        // Bắt đầu một giao dịch
        DB::beginTransaction();

        try {
            // Thực hiện insert cho form đầu tiên
            $this->createpn($request);

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
