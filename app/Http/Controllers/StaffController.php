<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index(){
        // $staffs = DB::table('staffs')->select('NVID', 'TenNV', 'SDT', 'Diachi', 'Chucvu', 'role_id')->get();
        $key = request()->key;
        $staffs = Staff::search($key)->get();
        return view('staffs.staffs', compact('staffs'));
    }
    public function create(){
        $maxNVID = DB::table('staffs')->max(DB::raw('CAST(SUBSTRING(NVID, 3, 3) AS SIGNED)'));
        $newNVID = 'BT' . str_pad($maxNVID + 1, 3, '0', STR_PAD_LEFT);
        return view('staffs.createstaff', compact('newNVID'));
    }
    public function store(Request $request){
        $staff = Staff::create([
            'NVID' => $request->input('id'),
            'TenNV' => $request->input('name'),
            'SDT' => $request->input('sdt'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'Diachi' => $request->input('address'),
            'Chucvu' => $request->input('cv'),
            'role_id' => $request->input('role_id')
        ]);
        $staff->save();
        return redirect('/staffs');
    }
    public function edit($id){
        $staff = DB::table('staffs')->select('NVID', 'TenNV', 'SDT', 'Diachi', 'Chucvu', 'email', 'password','role_id')->where('NVID', $id)->first();
        return view('staffs.editstaff')->with('staff', $staff);
    }
    public function update(Request $request, $id){
        $staff = DB::table('staffs')->where('NVID', $id)
            ->update([
                'NVID' => $request->input('id'),
                'TenNV' => $request->input('name'),
                'SDT' => $request->input('sdt'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'Diachi' => $request->input('address'),
                'Chucvu' => $request->input('cv'),
                'role_id' => $request->input('role_id')
            ]);
        return redirect('/staffs');
    }
    public function destroy($id){
        $staff = DB::table('staffs')->where('NVID', $id);
        $staff->delete();
        return redirect('/staffs');
    }
}
