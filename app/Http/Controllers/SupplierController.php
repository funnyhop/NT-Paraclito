<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = DB::table('suppliers')->select('NCCID', 'TenNCC', 'Diachi')->get();
        return view('medicines.suppliers', [
            'suppliers' => $suppliers
        ]);
    }
    public function create(){
        return view('medicines.createsupplier');
    }
    public function store(Request $request){
        $suppliers = Supplier::create([
            'NCCID' => $request->input('id'),
            'TenNCC' => $request->input('name'),
            'Diachi' => $request->input('address')
        ]);

        $suppliers->save();
        return redirect('/suppliers');
    }
    public function edit($id){
        $supplier = DB::table('suppliers')->select('NCCID', 'TenNCC', 'Diachi')->where('NCCID', $id)->first();
        return view('medicines.editsupplier')->with('supplier', $supplier);
    }
    public function update(Request $request, $id){
        $supplier = DB::table('suppliers')->where('NCCID', $id)
        ->update([
            'NCCID' => $request->input('id'),
            'TenNCC' => $request->input('name'),
            'Diachi' => $request->input('address')
        ]);

        return redirect('/suppliers');
    }
    public function destroy($id){
        $supplier = DB::table('suppliers')->where('NCCID', $id);
        $supplier->delete();

        return redirect('/suppliers');
    }
}
