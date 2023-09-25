<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Price;

class PriceController extends Controller
{
    public function index(){
        $prs = DB::table('prices')->select('id', 'medicine_id',
            'ngay_id', 'DVT', 'Gia')->get();

        return view('medicines.prices', compact('prs'));
    }
    public function create(){
        DB::statement('CALL InsertYearlyDate()');
        return view('medicines.createprice');
    }

    public function store(Request $request){
        $request->validate([
            'medicine_id' => 'required',
            'ngay_id' => 'required|date',
            'dvt' => 'required',
            'gia' => 'required|numeric',
        ]);
        //dung cach nay thi phai co cot created_at và updated_at trong csdl
        $pr = Price::create([
            'medicine_id' => $request->input('medicine_id'),
            'ngay_id' => $request->input('ngay_id'),
            'DVT' => $request->input('dvt'),
            'Gia' => $request->input('gia')
        ]);

        $pr->save();
        return redirect('/prices');
        // DB::enableQueryLog();
        // ghi truc tiep luon
        // DB::table('prices')->insert([
        //     'medicine_id' => $request->input('medicine_id'),
        //     'ngay_id' => $request->input('ngay_id'),
        //     'DVT' => $request->input('dvt'),
        //     'Gia' => $request->input('gia')
        // ]);

        // Lấy danh sách các truy vấn SQL đã thực hiện
        //$queries = DB::getQueryLog();
        // dd($queries);
    }
    // public function edit($id){
    //     $price = DB::table('prices')->select('medicine_id', 'ngay_id', 'DVT', 'Gia')->where('id', $id);
    //     return view('medicines.editprice', [
    //         'price' => $price
    //     ]);
    // }
    // public function update(Request $request, $id){
    //     $price = DB::table('prices')->where('id', $id)
    //         ->update([
    //             'medicine_id' => $request->input('medicine_id'),
    //             'ngay_id' => $request->input('ngay_id'),
    //             'DVT' => $request->input('dvt'),
    //             'gia' => $request->input('gia')
    //         ]);
    //     return redirect('/prices');
    // }
    public function destroy($id){
        $pr = DB::table('prices')->where('id', $id);
        $pr->delete();
        return redirect('/prices');
    }
}
