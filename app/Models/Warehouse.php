<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'warehouses';
    protected $primaryKey = 'KhoID';
    protected $fillable = ['KhoID', 'Tenkho', 'Diachi'];
    //one warehouse has many phieunhap
    public function phieunhaps() {
        return $this->hasMany(Phieunhap::class, 'warehouse_id', 'KhoID');
    }
}
