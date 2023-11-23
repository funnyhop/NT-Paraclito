<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producer;

class ProducerController extends Controller
{
    public function index() {
        $key = request()->key;
        $producers = Producer::search($key)->get();
        // $producers = DB::table('producers')->select('NSXID', 'TenNSX', 'Quocgia')->get();
        return view('medicines.producers', [
            'producers' => $producers
        ]);
    }
    public function create() {
        $maxNSXID = DB::table('producers')->max(DB::raw('CAST(SUBSTRING(NSXID, 4, 2) AS SIGNED)'));
        $newNSXID = 'NSX' . str_pad($maxNSXID + 1, 2, '0', STR_PAD_LEFT);
        return view('medicines.createproducer', compact('newNSXID'));
    }
    public function store(Request $request) {
        $producers = Producer::create([
            'NSXID' => $request->input('id'),
            'TenNSX' => $request->input('name'),
            'Quocgia' => $request->input('national')
        ]);
        $producers->save();
        return redirect('/producers');
    }
    public function edit($id) {
        $producer = DB::table('producers')->select('NSXID', 'TenNSX', 'Quocgia')
            ->where('NSXID', $id)->first();
        return view('medicines.editproducer',[
            'producer' => $producer
        ]);
    }
    public function update(Request $request, $id) {
        $producer = DB::table('producers')->where('NSXID', $id)
        ->update([
            'NSXID' => $request->input('id'),
            'TenNSX' => $request->input('name'),
            'Quocgia' => $request->input('national')
        ]);

        return redirect('/producers');
    }
    public function destroy($id) {
        $producer = DB::table('producers')->where('NSXID', $id);
        $producer->delete();

        return redirect('/producers');

    }
}
