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
        // DB::statement('CALL InsertYearlyDate()');
        return view('medicines.createprice');
    }
    public function store(Request $request){
        $request->validate([
            'medicine_id' => 'required',
            'ngay_id' => 'required|date',
            'dvt' => 'required',
            'gia' => 'required|numeric',
        ]);
//dd($request);

        try {
            $pr = new Price(); // Tạo một đối tượng Price mới
            $pr->medicine_id = $request->input('medicine_id');
            $pr->ngay_id = $request->input('ngay_id');
            $pr->DVT = $request->input('dvt');
            $pr->Gia = $request->input('gia');

            $pr->save(); // Lưu đối tượng vào cơ sở dữ liệu
            return redirect('/prices');
        } catch (\Exception $e) {
            // In ra thông tin lỗi để xem lỗi là gì
            dd($e->getMessage());
        }


        // $price = Price::create([
        //     'medicine_id' => $request->input('medicine_id'),
        //     'ngay_id' => $request->input('ngay_id'),
        //     'DVT' => $request->input('dvt'),
        //     'Gia' => $request->input('gia')
        // ]);
        // dd($price);
        //$price->save();
        //return redirect('/prices');
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
    // public function destroy($id){
    //     $price = DB::table('prices')->where('id', $id);
    //     $price->delete();
    //     return redirect('/prices');
    // }
}
