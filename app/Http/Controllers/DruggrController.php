<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Druggr;
use Illuminate\Support\Facades\DB;

class DruggrController extends Controller
{
    public function index(){
        // $drs = Druggr::all(); //select * from druggrs
        // $drs    = DB::table('druggrs')->select('NhomthuocID', 'Tennhom')->get();
        //search
        // if ($key = request()->key) {
        //     $drs = DB::table('druggrs')->select('NhomthuocID', 'Tennhom')->where('Tennhom', 'like', '%' . $key . '%')->get();
        // }

        $key = request()->key;
        $drs = Druggr::search($key)->get();
        return view('medicines.druggr', compact('drs'));
    }

    public function create(){
        $maxNhomthuocID = DB::table('druggrs')->max(DB::raw('CAST(SUBSTRING(NhomthuocID, 3, 3) AS SIGNED)'));
        $newNhomthuocID = 'NT' . str_pad($maxNhomthuocID + 1, 3, '0', STR_PAD_LEFT);
        return view('medicines.createdruggr', compact('newNhomthuocID'));
    }

    public function store(Request $request){
        // $drs = new Druggr();
        // $drs->NhomthuocID = $request->input('ma');
        // $drs->Tennhom = $request->input('ten');
        $drs = Druggr::create([
            'NhomthuocID' => $request->input('ma'),
            'Tennhom' => $request->input('ten')
        ]);

        $drs->save();
        return redirect('/druggr');
    }
    public function edit($id){
        // $drs = Druggr::find($id)->first();
        $drs = DB::table('druggrs')->select('NhomthuocID', 'Tennhom')->where('NhomthuocID','=', $id)->first();
        return view('medicines.editdruggr')->with('drs', $drs);
    }
    public function update(Request $request, $id){
        $drs = DB::table('druggrs')->where('NhomthuocID','=',$id)
        ->update([
            'NhomthuocID' => $request->input('ma'),
            'Tennhom' => $request->input('ten')
        ]);
        return redirect('/druggr');
    }
    public function destroy($id){
        $drs = DB::table('druggrs')->where('NhomthuocID','=',$id);
        $drs->delete();
        return redirect('/druggr');
    }
}
