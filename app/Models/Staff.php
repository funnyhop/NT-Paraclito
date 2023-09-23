<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staffs';
    protected $primaryKey = 'NVID';
    protected $fillable = ['NVID', 'TenNV', 'Diachi', 'SDT', 'Chucvu'];
    //one staff has many bill
    public function bills() {
        return $this->hasMany(Bill::class,'staff_id', 'NVID');
    }
}
