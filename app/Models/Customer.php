<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'KHID';
    protected $fillable = ['KHID', 'TenKH', 'Diachi', 'SDT'];
    //one customer has many bill
    public function bills() {
        return $this->hasMany(Bill::class,'customer_id', 'KHID');
    }
}
