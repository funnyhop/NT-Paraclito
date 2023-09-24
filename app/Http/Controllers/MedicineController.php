<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function index(){
        $medicines = DB::table('medicines')->select('ThuocID', 'Tenthuoc', 'NSX', 'HSD', 'TPhoatchat',
            'Dieutri', 'HDSD', 'Chongchidinh', 'druggr_id', 'supplier_id', 'producer_id')->get();
        $medicine_price = DB::table('prices')->select('medicine_id', 'ngay_id', 'DVT', 'gia')->get();
        return view('medicines.medicines', compact('medicines','medicine_price'));
    }
    public function create(){
        DB::statement('CALL InsertYearlyDate()');
        return view('medicines.createmedicine');
    }
    public function store(Request $request){
        $medicine = Medicine::create([
            'ThuocID' =>$request->input('id'),
            'Tenthuoc' =>$request->input('name'),
            'NSX' =>$request->input('mfg'),
            'HSD' =>$request->input('exp'),
            'TPhoatchat' =>$request->input('tp'),
            'Dieutri' =>$request->input('dt'),
            'HDSD' =>$request->input('hdsd'),
            'Chongchidinh' =>$request->input('ccd'),
            'druggr_id' =>$request->input('dr_id'),
            'supplier_id' =>$request->input('sl_id'),
            'producer_id' =>$request->input('pd_id')
        ]);

        $medicine->save();
        return redirect('/medicines');
    }
    public function edit($id){
        $medicine = DB::table('medicines')->select('ThuocID', 'Tenthuoc', 'NSX', 'HSD', 'TPhoatchat',
            'Dieutri', 'HDSD', 'Chongchidinh', 'druggr_id', 'supplier_id', 'producer_id')
            ->where('ThuocID',$id)->first();

        return view('medicines.editmedicine')->with('medicine', $medicine);
    }
    public function update(Request $request, $id){
        $medicine = DB::table('medicines')->where('ThuocID',$id)
            ->update([
                'ThuocID' =>$request->input('id'),
                'Tenthuoc' =>$request->input('name'),
                'NSX' =>$request->input('mfg'),
                'HSD' =>$request->input('exp'),
                'TPhoatchat' =>$request->input('tp'),
                'Dieutri' =>$request->input('dt'),
                'HDSD' =>$request->input('hdsd'),
                'Chongchidinh' =>$request->input('ccd'),
                'druggr_id' =>$request->input('dr_id'),
                'supplier_id' =>$request->input('sl_id'),
                'producer_id' =>$request->input('pd_id')
            ]);

        return redirect('/medicines');
    }
    public function destroy($id){
        $medicine = DB::table('medicines')->where('ThuocID',$id);
        $medicine->delete();

        return redirect('/medicines');
    }
}
