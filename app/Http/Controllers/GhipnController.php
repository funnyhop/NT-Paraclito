<?php

namespace App\Http\Controllers;

use App\Models\GhiPN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GhipnController extends Controller
{
    public function index(){
        $key = request()->key;
        $ghipns = DB::table('ghipns')
            ->select('medicine_id', 'phieunhap_id', 'Soluong', 'Gia')
            ->where('medicine_id', 'like', '%' . $key . '%')
            ->orWhere('phieunhap_id', 'like', '%' . $key . '%')
            ->get();
        $i = 1;
        return view('warehouse.ghipn', compact('ghipns','i'));
    }
    public function create(){
        $phieunhaps = DB::table('phieunhaps')->select('PNID')->get();
        $medicines = DB::table('medicines')->select('ThuocID', 'Tenthuoc')->get();
        return view('warehouse.createghipn', compact('phieunhaps', 'medicines'));
    }

    public function store(Request $request){
        DB::table('ghipns')->insert([
            'medicine_id' => $request->input('medicine_id'),
            'phieunhap_id' => $request->input('phieunhap_id'),
            'Soluong' => $request->input('Soluong'),
            'Gia' => $request->input('gia'),
        ]);
        return redirect()->route('ghipns');
    }
    public function edit($phieunhap_id, $medicine_id){
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

        return view('warehouse.editghipn', [
            'ghipn' => $ghipn,
            'getwarehouse_id' => $getwarehouse_id
        ]);
    }
    public function update(Request $request, $phieunhap_id, $medicine_id){
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

        $updateSoluong =  $currentSoluongGhipns - $request->input('Soluong');
        $tonkho = DB::table('tonkhos')
            ->where('warehouse_id', $request->input('warehouse_id'))
            ->where('medicine_id', $medicine_id)
            ->update([
                'Soluong' => DB::raw('Soluong + ' . $updateSoluong)
            ]);

        return redirect()->route('ghipns');
    }
    public function destroy($phieunhap_id, $medicine_id)
    {
        DB::table('ghipns')
            ->where('phieunhap_id', $phieunhap_id)
            ->where('medicine_id', $medicine_id)
            ->delete();

        return redirect()->route('ghipns');
    }
}
