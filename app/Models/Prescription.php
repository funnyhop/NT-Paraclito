<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Prescription extends Model
{
    use HasFactory;
    protected $table = 'prescriptions';
    protected $primaryKey = 'ToaID';
    protected $fillable = ['ToaID', 'TenBS', 'TenBV', 'Ngaytao'];

    public function displayprescription() {
        $prescription = DB::table('prescriptions')->select('ToaID', 'TenBS', 'TenBV', 'Ngaytao')->get();
        return $prescription;
    }
    public function createprescription($request) {
        $prescription = Prescription::create([
            'ToaID' => $request->input('id'),
            'TenBS' => $request->input('bs'),
            'TenBV' => $request->input('bv'),
            'Ngaytao' => $request->input('nt')
        ]);
        return $prescription;
    }
    public function editprescription($id) {
        $prescription = DB::table('prescriptions')->select('ToaID', 'TenBS', 'TenBV', 'Ngaytao')->where('ToaID',$id)->first();
        return $prescription;
    }
    public function updateprescription($request, $id) {
        $prescription = DB::table('prescriptions')->where('ToaID',$id)
        ->update([
            'ToaID' => $request->input('id'),
            'TenBS' => $request->input('bs'),
            'TenBV' => $request->input('bv'),
            'Ngaytao' => $request->input('nt')
        ]);
        return $prescription;
    }
    public function destroyprescription($id) {
        $prescription = DB::table('prescriptions')->where('ToaID',$id);
        return $prescription;
    }

    //one prescription belongs to bill
    public function bill() {
        return $this->belongsTo(Bill::class, 'bill_id', 'HDID');
    }
}
