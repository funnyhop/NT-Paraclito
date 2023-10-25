<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staffs';
    protected $primaryKey = 'NVID';
    protected $fillable = ['NVID', 'TenNV', 'Diachi', 'SDT', 'Chucvu', 'password', 'email', 'role_id'];
    protected $keyType = 'string';
    //one staff has many bill
    public function bills() {
        return $this->hasMany(Bill::class,'staff_id', 'NVID');
    }
    public function scopeSearch($query, $key) {
        // $key = request()->key; // Retrieve the key from the request;
        if ($key = request()->key) {
            return $query->where('NVID', 'like', '%' . $key . '%')
                ->orWhere('TenNV', 'like', '%' . $key . '%')
                ->orWhere('Diachi', 'like', '%' . $key . '%')
                ->orWhere('SDT', 'like', '%' . $key . '%')
                ->orWhere('Chucvu', 'like', '%' . $key . '%')
                ->orWhere('email', 'like', '%' . $key . '%')
                ->orWhere('role_id', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
