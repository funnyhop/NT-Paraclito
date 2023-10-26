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

        return view('warehouse.editghipn', [
            'ghipn' => $ghipn
        ]);
    }
    public function update(Request $request, $phieunhap_id, $medicine_id){
        $ghipn = DB::table('ghipns')
        ->where('phieunhap_id', $phieunhap_id)
        ->where('medicine_id', $medicine_id)
        ->update([
            'medicine_id' => $request->input('medicine_id'),
            'phieunhap_id' => $request->input('phieunhap_id'),
            'Soluong' => $request->input('Soluong'),
            'Gia' => $request->input('gia'),
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
