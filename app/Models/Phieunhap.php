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

    //one phieunhap has many GhiPN
    public function ghipns() {
        return $this->hasMany(GhiPN::class, 'phieunhap_id', 'PNID');
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
