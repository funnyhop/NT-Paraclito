<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieunhap extends Model
{
    use HasFactory;
    protected $table = 'phieunhaps';
    protected $primaryKey = ['PNID'];
    protected $fillable = ['PNID', 'Lothuoc', 'staff_id','warehouse_id', 'created_at'];

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
