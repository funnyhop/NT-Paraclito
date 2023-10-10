<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Staff;
use App\Models\Phieunhap;

class GhiPN extends Model
{
    use HasFactory;
    protected $table = 'ghipns';
    protected $primaryKey = ['medicine_id','phieunhap_id'];
    protected $keyType = 'array';
    protected $fillable = ['medicine_id','phieunhap_id', 'Soluong', 'Gia'];

    public function listghipn(){
        $values = DB::table('ghipns')
        ->join('medicines', 'ghipns.medicine_id', '=', 'medicines.ThuocID')
        ->join('phieunhaps', 'ghipns.phieunhap_id', '=', 'phieunhaps.PNID')
        ->select('ghipns.phieunhap_id','medicines.Tenthuoc', 'Soluong', 'Gia')
       ->get();
        return $values;
    }

    //one GhiPN belongs to Medicine
    public function medicine() {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'ThuocID');
    }
    //one GhiPN belongs to phieunhap
    public function phieunhap() {
        return $this->belongsTo(Phieunhap::class, 'phieunhap_id', 'PNID');
    }

}

