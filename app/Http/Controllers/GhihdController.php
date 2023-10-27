<?php

namespace App\Http\Controllers;

use App\Models\GhiHD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Warehouse;

class GhihdController extends Controller
{
    public function index(){
        $key = request()->key;
        $ghihds = DB::table('ghihds')
            ->select('medicine_id', 'bill_id', 'Soluong')
            ->where('medicine_id', 'like', '%' . $key . '%')
            ->orWhere('bill_id', 'like', '%' . $key . '%')
            ->get();
        $i = 1;
        return view('sales.ghihd', compact('ghihds','i'));
    }
    public function create(){
        $bills = DB::table('bills')->select('HDID')->get();
        $medicines = DB::table('medicines')->select('ThuocID', 'Tenthuoc')->get();
        return view('sales.createghihd', compact('bills', 'medicines'));
    }

    public function store(Request $request){
        DB::table('ghihds')->insert([
            'medicine_id' => $request->input('medicine_id'),
            'bill_id' => $request->input('bill_id'),
            'Soluong' => $request->input('Soluong')
        ]);
        return redirect()->route('ghihds');
    }
    public function edit($bill_id, $medicine_id){
        $ghihd = DB::table('ghihds')
            ->select('medicine_id', 'bill_id', 'Soluong')
            ->where('bill_id', $bill_id)
            ->where('medicine_id', $medicine_id)
            ->first();
        $getwarehouse_id = DB::table('tonkhos')
            ->join('warehouses', 'tonkhos.warehouse_id', '=', 'warehouses.KhoID')
            ->where('medicine_id', $medicine_id)
            ->select('KhoID', 'TenKho')
            ->get();

        return view('sales.editghihd', [
            'ghihd' => $ghihd,
            'getwarehouse_id' => $getwarehouse_id
        ]);
    }
    public function update(Request $request, $bill_id, $medicine_id) {
        $currentSoluongGhihds = DB::table('ghihds')
            ->where('bill_id', $bill_id)
            ->where('medicine_id', $medicine_id)
            ->value('Soluong');

        // Perform the update in ghihds
        $ghihd = DB::table('ghihds')
            ->where('bill_id', $bill_id)
            ->where('medicine_id', $medicine_id)
            ->update([
                'medicine_id' => $request->input('medicine_id'),
                'bill_id' => $request->input('bill_id'),
                'Soluong' => $request->input('Soluong')
            ]);

        $updateSoluong =  $currentSoluongGhihds - $request->input('Soluong');

        $tonkho = DB::table('tonkhos')
            ->where('warehouse_id', $request->input('warehouse_id'))
            ->where('medicine_id', $medicine_id)
            ->update([
                'Soluong' => DB::raw('Soluong + ' . $updateSoluong)
            ]);

        return redirect()->route('ghihds');
    }

    public function destroy($bill_id, $medicine_id)
    {
        DB::table('ghihds')
            ->where('bill_id', $bill_id)
            ->where('medicine_id', $medicine_id)
            ->delete();

        return redirect()->route('ghihds');
    }
}
