<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Price;

class PriceController extends Controller
{
    public function index(){
        $prs = DB::table('prices')->select('medicine_id',
            'ngay_id', 'Gia')->get();
        $i = 1;
        return view('medicines.prices', compact('prs','i'));
    }
    public function create(){
        DB::statement('CALL InsertYearlyDate()');
        return view('medicines.createprice');
    }

    public function store(Request $request){
        $request->validate([
            'medicine_id' => 'required',
            'ngay_id' => 'required|date',
            'gia' => 'required|numeric',
        ]);
        //dung cach nay thi phai co cot created_at và updated_at trong csdl
        // $pr = Price::create([
        //     'medicine_id' => $request->input('medicine_id'),
        //     'ngay_id' => $request->input('ngay_id'),
        //     'DVT' => $request->input('dvt'),
        //     'Gia' => $request->input('gia')
        // ]);

        // $pr->save();
        //return redirect('/prices');

        // DB::enableQueryLog();
        //ghi truc tiep luon
        DB::table('prices')->insert([
            'medicine_id' => $request->input('medicine_id'),
            'ngay_id' => $request->input('ngay_id'),
            'Gia' => $request->input('gia')
        ]);

        //Lấy danh sách các truy vấn SQL đã thực hiện
        // $queries = DB::getQueryLog();
        // dd($queries);
        return redirect('/prices');
    }
    public function edit($id){
        //
    }
    public function destroy($ngay_id, $medicine_id)
    {
       //
    }
    public function priceDestroy($ngay_id, $medicine_id)
    {
        // Xử lý việc xóa dữ liệu ứng với $ngay_id và $medicine_id
        DB::table('prices')
            ->where('ngay_id', $ngay_id)
            ->where('medicine_id', $medicine_id)
            ->delete();

        return redirect('/prices')->with('success', 'Xóa bản ghi thành công.');
    }
    public function priceEdit($ngay_id, $medicine_id)
    {
        $pr = DB::table('prices')
            ->select('medicine_id', 'ngay_id', 'Gia')
            ->where('ngay_id', $ngay_id)
            ->where('medicine_id', $medicine_id)
            ->first();

        return view('medicines.editprice', [
            'pr' => $pr
        ]);
    }
    public function priceUpdate(Request $request, $ngay_id, $medicine_id){
            $pr = DB::table('prices')
                ->where('ngay_id', $ngay_id)
                ->where('medicine_id', $medicine_id)
                ->update([
                    'medicine_id' => $request->input('medicine_id'),
                    'ngay_id' => $request->input('ngay_id'),
                    'Gia' => $request->input('gia')
                ]);
            return redirect('/prices');
    }
}
