<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Staff;
use App\Models\Bill;

class GhiHD extends Model
{
    use HasFactory;
    protected $table = 'ghihds';
    protected $primaryKey = ['medicine_id','bill_id'];
    protected $fillable = ['medicine_id', 'bill_id', 'Soluong'];
    public function listghihd(){
        $values = DB::table('ghihds')
        ->join('medicines', 'ghihds.medicine_id', '=', 'medicines.ThuocID')
        ->join('bills', 'ghihds.bill_id', '=', 'bills.HDID')
        ->select('ghihds.bill_id', 'ghihds.medicine_id','medicines.Tenthuoc', 'Soluong')
       ->get();
        return $values;
    }
    //one GhiHD belongs to medicine
    public function medicine() {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'ThuocID');
    }
    //one GhiHD belongs to bill
    public function bill() {
        return $this->belongsTo(Bill::class, 'bill_id', 'HDID');
    }
}
