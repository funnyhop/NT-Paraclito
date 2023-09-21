<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Druggr;
use Illuminate\Support\Facades\DB;
class DruggrController extends Controller
{
    public function index(){
        // $drs = Druggr::all(); //select * from druggrs
        $drs = DB::table('druggrs')->select('id', 'Tennhom')->get();
        return view('medicines.druggr', compact('drs'));
    }

    public function create(){
        return view('medicines.createdruggr');
    }

    public function store(Request $request){
        // $drs = new Druggr();
        // $drs->id = $request->input('ma');
        // $drs->Tennhom = $request->input('ten');
        $drs = Druggr::create([
            'id' => $request->input('ma'),
            'Tennhom' => $request->input('ten')
        ]);

        $drs->save();
        return redirect('/druggr/create');
    }
    public function edit($id){
        // $drs = Druggr::find($id)->first();
        $drs = DB::table('druggrs')->select('id', 'Tennhom')->where('id','=', $id)->first();
        return view('medicines.editdruggr')->with('drs', $drs);
    }
    public function update(Request $request, $id){
        $drs = DB::table('druggrs')->where('id','=',$id)
        ->update([
            'id' => $request->input('ma'),
            'Tennhom' => $request->input('ten')
        ]);
        return redirect('/druggr');
    }
    public function destroy($id){
        $drs = DB::table('druggrs')->where('id','=',$id);
        $drs->delete();
        return redirect('/druggr');
    }
}
