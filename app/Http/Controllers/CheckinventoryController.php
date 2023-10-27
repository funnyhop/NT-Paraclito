<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Phieunhap;
use App\Models\Medicine;

class CheckinventoryController extends Controller
{
    private $medicine;
    // private $phieunhap;
    public function __construct(){
        $this->medicine = new Medicine();
        // $this->phieunhap = new Phieunhap();

    }
    public function index(){
        // $medicines = $this->medicine->checkinventory();
        // $phieunhaps = $this->phieunhap->listphieunhap();
        $key = request()->key;
        $medicines = Medicine::search($key)->get();
        $tonkho = DB::table('tonkhos')
            ->select('medicine_id', 'warehouse_id', 'Soluong')
            ->get();
        return view('warehouse.checkinventory', compact('medicines', 'tonkho'));
    }

    public function edit($warehouse_id, $medicine_id){
        $inventory = DB::table('tonkhos')
        ->select('medicine_id', 'warehouse_id', 'Soluong')
        ->where('warehouse_id', $warehouse_id)
        ->where('medicine_id', $medicine_id)
        ->first();

        return view('warehouse.editinventory', [
            'inventory' => $inventory
        ]);
    }
    public function update(Request $request, $warehouse_id, $medicine_id){
        $inventory = DB::table('tonkhos')
        ->where('warehouse_id', $warehouse_id)
        ->where('medicine_id', $medicine_id)
        ->update([
            'medicine_id' => $request->input('medicine_id'),
            'warehouse_id' => $request->input('warehouse_id'),
            'Soluong' => $request->input('Soluong'),
        ]);
        return redirect()->route('checkinventory');
    }
    public function destroy($warehouse_id, $medicine_id)
    {
        DB::table('tonkhos')
            ->where('warehouse_id', $warehouse_id)
            ->where('medicine_id', $medicine_id)
            ->delete();

        return redirect()->route('checkinventory');
    }
}
