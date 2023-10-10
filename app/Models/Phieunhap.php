<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class Phieunhap extends Model
{
    use HasFactory;
    protected $table = 'phieunhaps';
    protected $primaryKey = ['PNID'];
    protected $fillable = ['PNID', 'Lothuoc', 'staff_id','warehouse_id', 'created_at'];

    public function listphieunhap(){
        $list = DB::table('phieunhaps')
                ->join('warehouses', 'phieunhaps.warehouse_id', '=', 'warehouses.KhoID')
                ->join('staffs', 'phieunhaps.staff_id', '=', 'staffs.NVID')
                ->select('PNID', 'phieunhaps.Lothuoc', 'staffs.TenNV', 'warehouses.Tenkho', 'phieunhaps.created_at')
                ->get();
            return $list;
            // dd($list);
    }
    //many phieunhap has many medicine
    public function medicineghipns() {
        return $this->belongsToMany(Medicine::class, 'ghipns', 'medicine_id', 'phieunhap_id')
                    ->withPivot('Gia','Soluong');
    }
    //one phieu nhap belongs to staff
    public function staff() {
        return $this->belongsTo(Staff::class, 'staff_id', 'NVID');
    }
    //one phieu nhap belongs to warehouse
    public function warehouse() {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'KhoID');
    }
}
